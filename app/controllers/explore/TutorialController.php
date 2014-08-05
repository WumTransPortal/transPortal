<?php
namespace Explore;
use View;

class TutorialController extends \BaseController {


	public function get_index()	{
	   return View::make('site/explore/tutorials/index')->with('user', \Sentry::getUser());
			   	    	
	}

}

	