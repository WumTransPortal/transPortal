<?php

namespace Admin;
use View;

class AnalyticsController extends \BaseController 
{

	public function getIndex()	
	{ 
		return View::make('admin/analytics/index');
	}

}