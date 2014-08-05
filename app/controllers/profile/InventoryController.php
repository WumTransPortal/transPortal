<?php
namespace Profile;
use View;

class InventoryController extends \BaseController {


	public function getIndex()	{

		$user = \Sentry::getUser();
		
		$items = \Item::all();
		
		$useritems = \ItemsUser::where('user_id', '=', $user->id)->get();
		
		$today = date("Y-m-d");

		$dueitemcount = 0;

		$username = $user->username;

		return View::make('site/profile/inventory/index')
			->with('user', $user)
			->with('items', $items)
			->with('today', $today)
			->with('dueitemcount', $dueitemcount)
			->with('useritems', $useritems)
			->with('username', $username);	    	
	}

}