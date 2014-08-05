<?php
namespace Profile;
use View;

class ProjectController extends \BaseController {


	public function getIndex()	{
		$user = \Sentry::getUser();
		$count = \Project::where('user_id', '=', $user->id)->count();
		$projects = \Project::where('user_id', '=', $user->id)->paginate(15);
		$username = $user->username;

	    return View::make('site/profile/projects/index')
	    		->with(array('projects' => $projects, 'user' => $user, 'count' => $count));	  	    	
	}

}