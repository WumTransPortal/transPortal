<?php
namespace Explore;
use View;

class PublicProjectController extends \BaseController {


	public function get_index()	{

		$user = \Sentry::getUser();
		$projects = \Project::orderBy('created_at', 'desc')->paginate(15);

		return View::make('site/explore/publicprojects/index')
	   					->with('user', $user)
	   					->with('projects', $projects);
			   	    	
	}

}

	