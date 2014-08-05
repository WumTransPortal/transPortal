<?php

namespace Admin;
use View;

class DashboardController extends \BaseController 
{

	public function getIndex()	
	{ 
		$items = \Item::all();
		$itemsusers = \ItemsUser::all();
		$users = \User::all();
		$totalarticles = 0;
		$totalarticlesloaned = 0;

		// Select the active users
		$activeusers = \User::where('activated', '=', "1")->get();
	    $inactiveusers = \User::where('activated', '=', "0")->get();

	    // Select the users in lab
	    $usersinlab = \User::where('inlab', '=', 1)->get();

	    return View::make('admin/dashboard/index')
	    				->with('itemsusers', $itemsusers)
	    				->with('users', $users)
	    				->with('items', $items)
	    				->with('totalarticles', $totalarticles)
	    				->with('totalarticlesloaned', $totalarticlesloaned)
	    				->with('inactiveusers', $inactiveusers)
	    				->with('activeusers', $activeusers)
	    				->with('usersinlab', $usersinlab);
	}
}