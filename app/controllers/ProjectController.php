<?php

class ProjectController extends BaseController {

    public function index()	{
        if(!Sentry::check())
        {
            return Redirect::to('/account/login');
        }
        else
        {
            $projects = Project::orderBy('updated_at', 'desc')
            ->with('user')
            -> where('user_id', '=', Sentry::getUser()->id)
            ->paginate(5);
        return View::make('site.project.index')->with('projects', $projects);
        }	

    }

	public function download($pid) {
		
		$project = Project::where('id', '=', $pid)->firstorfail();

		$docpaths = array();
		$docnames = array();
		$documents = array();
		foreach($project->projectsessions as $psession) {
            if(!empty($psession->docs)){
                array_push($docpaths, explode(',', $psession->docs));
                array_push($docnames, explode(',', $psession->docnames));
            }
		}

		$i = 0;
        foreach($docpaths as $docpath)  {
            $j = 0;
            foreach($docpath as $dp)  {      
                array_push($documents, [$docpaths[$i][$j], $docnames[$i][$j]]);
             	$j++;
            }
            $i++;
        }  

		
		$zip = new ZipArchive();

		$tmp_file = tempnam('.','');
		$zip->open($tmp_file, ZipArchive::CREATE);
		
		# loop through each file
		foreach($documents as $document) {
		   
		   	# add it to the zip
		    $zip->addFromString($document[1], file_get_contents('./'.$document[0]));

		}
		
		$zip->close();

		header('Content-disposition: attachment; filename=' . $project->title . '_files.zip');
		header('Content-type: application/zip');
		readfile($tmp_file);
		unlink($tmp_file);

	}

	public function create() {
		if(!Sentry::check())
        {
            return Redirect::to('/account/login');
        }
        else
        {
            return View::make('site.project.create');
        }		
	}

	public function store()	{
	
	$validator = Project::validate(Input::all());

		if ($validator->fails()) {
	        return Redirect::back()
	        		->withErrors($validator)
	        		->withInput();
		}
		
		$project = new project;			
	    $project->title = trim(Input::get('title'));
	    $project->content = self::_cleanRTEHTML(Input::get('content'));
	    $project->user_id = Sentry::getUser()->id;
	    $project->icon = trim(Input::get('icon'));
	    $project->color = trim(Input::get('color'));
	    $project->save();

	    $projectuser = new ProjectUser();
	    $projectuser->user_id = Sentry::getUser()->id;
	    $projectuser->manager = 1;
	    $projectuser->project()->associate($project);

		$projectuser->accept();	
		
		return Redirect::to('/project/' . $project->id)->with('success', 'Project successfully saved!');
	}
	
	
	public function update($id = null)	{

		$project = Project::find($id);
		
		$validator = Project::validate(Input::all());

		if ($validator->fails()) {
	        return Redirect::to('/project/'. $id.'/edit')->withErrors($validator);
		}

		$project->title = trim(Input::get('title'));
        $project->content = self::_cleanRTEHTML(Input::get('content'));
        $project->user_id = Sentry::getUser()->id;
        $project->icon = trim(Input::get('icon'));
        $project->color = trim(Input::get('color'));

		$project->save();
				
		return Redirect::to('/project/' . $project->id)->with('success', 'Project successfully updated!');

	}

	
	public function show($id)	{

		
		$project = Project::find($id);
		$user = User::where('id', '=', $project->user_id)->firstorfail();
		$project->content = self::_cleanRTEHTML($project->content);
		$usersprojects = Project::where('user_id', '=', $user->id)->get();

		// The user who is currently logged in
		$currentuser = Sentry::getUser();

		// Project stats - VIEWS
		if(!Sentry::getUser() || $currentuser->id != $user->id) {
			$project->views = $project->views + 1;
			$project->save();
		} 

		//Question data for partial
		$questions = Question::where('project_id', '=' , $id)->get();

        // Wanted data for partial
        $wanted['data'] = Wanted::where('project_id', '=', $id)->first();
        if($wanted['data'] !== NULL)
            $wanted['wanted_tags'] = WantedTag::where('wanted_id', '=', $wanted['data']->id)->get();
        $wanted['project'] = $project;

        $wanted['user'] = $currentuser;
        $tags = Tag::all();
        $tags_array = array();
        foreach($tags AS $tag){
            if($tag->parent !== NULL){
                $tags_array[$tag->parent]['tags'][$tag->id] = $tag->tag;
            }else{
                $tags_array[$tag->id]['parent'] = $tag->tag;
            }
        }
        $wanted['tags'] = $tags_array;

        // Project Users
        $projectUsers = $project->projectUsers;
        $accepted = '';
        $applied = 0;
        foreach($projectUsers AS $projectUser){
            $projectUser->user;
            if($projectUser->accepted_at !== '0000-00-00 00:00:00'){
                $accepted .= '<a href="/profile/show/'.$projectUser->user->username.'">'.$projectUser->user->username.'</a>, ';
            }else{
                $applied++;
            }
            $wanted['project_users'][] = $projectUser->user_id;
        }
        $accepted = rtrim($accepted, ', ');
        $projectUsersData['projectUsers'] = $projectUsers;
        $projectUsersData['projectUsersAccepted'] = $accepted;
        $projectUsersData['projectUsersApplied'] = $applied;
        $projectUsersData['project'] = $project;
        $projectUsersData['user'] = $currentuser;

        $wanted['projectUsersData'] = $projectUsersData;
		
	    return View::make('site.project.show')
	    	->with('project', $project)
	    	->with('usersprojects', $usersprojects)
	    	->with('user', $user)
	    	->nest('question', 'site.project.question', array('questions' => $questions, 'project_id' => $id, 'project' => $project))
            ->nest('projectUsers', 'site.project.projectUsers', $projectUsersData)
            ->nest('wanted', 'site.project.wanted', $wanted)
            ->with('wantedData', $wanted['data']);
	}
	
	public function edit($id)	{
		$project = Project::findOrFail($id);
		$project->content = self::_cleanRTEHTML($project->content);

	    return View::make('site/project/edit', compact('project'))
	    	->with('project', $project);
	}
		
		
	public function destroy($id){
		
		$project = Project::find($id);
		$project->projectSessions()->delete();
		$project->delete();


		
		File::deleteDirectory(public_path(). "/uploads/projects/" . $id);
		return Redirect::to('/project')->with('success', 'Project successfully deleted!');

	}

	

	
	private function _cleanRTEHTML($string) {
		$pattern = ':<[^/>]*>\s*</[^>]*>:';
		$string = preg_replace($pattern, '', $string);
		$string = preg_replace(':style="(.*)":', '', $string);
		$string = preg_replace(':id="(.*)":', '', $string);
		return trim($string);
	}
	

}