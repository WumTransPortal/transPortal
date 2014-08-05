<?php

namespace Admin;
use View;

class CalendarController extends \BaseController {

	public function getIndex()	{
	    return View::make('admin/calendar');
	}

}