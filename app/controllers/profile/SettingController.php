<?php
namespace Profile;
use View;

class SettingController extends \BaseController {


	public function getIndex()	
	{
		if (!\Sentry::check()) return \Redirect::to('account/login') ;
	    return View::make('site/profile/setting/index')
			   	->with('user', \Sentry::getUser());	  
			   	    	
	}

	public function postUpdate() 
	{

		$id = \Input::get('_id');
		$user = \User::find($id);

		// Change profile photo
		if ( \Input::file('image') )
		{
			$file = \Input::file('image');
			$destinationPath = "profile-pics/";
			$extension = $file->getClientOriginalExtension();
			$filename = time() . $user->id . "." . $extension;
			\Input::file('image')->move($destinationPath, $filename);
			$user->profile_pic = $filename;

			$user->save();
		}


		$user->incognito = \Input::get('incognito');
		$user->save();

		return \Redirect::to('/profile/show/'. $user->username)->with('success', 'Account updated with success!');

	}
	
}