<?php

class HomeController extends BaseController {

	public function getIndex()	{
		$usersinlab = User::where('inlab', '=', 1)->get();
		$projects = Project::all();

	    return View::make('site/home/index')
	    			->with('projects', $projects)
	    			->with('usersinlab', $usersinlab);
	}

}

?>