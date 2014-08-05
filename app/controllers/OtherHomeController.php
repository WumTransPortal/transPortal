<?php

class OtherHomeController extends BaseController {

	public function getIndex()	{
	    return View::make('site/home/new');
	}
	
}

?>