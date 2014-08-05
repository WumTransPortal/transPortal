<?php

class InventoryController extends BaseController {

	public function getIndex()	{
	    return View::make('site/inventory/index');
	}

}