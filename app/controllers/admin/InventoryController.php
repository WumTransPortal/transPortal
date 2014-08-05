<?php

namespace Admin;
use View;

class InventoryController extends \BaseController 
{

	public function getIndex()	
	{ 
		
		$sortby = \Input::get('sortby');
		$itmsperpage = \Input::get('itmsperpage');
		$items = \Item::paginate($itmsperpage);
		$itemsusers = \ItemsUser::all();
		$users = \User::all();

		if(!$itmsperpage)
		{
			$itmsperpage = 10;
		} else {
			$items = \Item::paginate($itmsperpage);
		} 

		if($sortby) 
		{
			$items = \Item::orderBy($sortby, 'asc')->paginate($itmsperpage);
		}
	    
	    return View::make('admin/inventory/index')
	    				->with('itemsusers', $itemsusers)
	    				->with('users', $users)
	    				->with('itmsperpage', $itmsperpage)
	    				->with('sortby', $sortby)
	    				->with('items', $items);
	}

	public function getAdd() 
	{
		return View::make('admin/inventory/add');
	}

	public function getLend() 
	{
		$items = \Item::all();
		$itemsusers = \ItemsUser::all();
		$users = \User::all();

		$inputvalue = 0;

		return View::make('admin/inventory/lend')
						->with('itemsusers', $itemsusers)
						->with('inputvalue', $inputvalue)
	    				->with('users', $users)
	    				->with('items', $items);
	}

	public function postLend() 
	{
		// Declare the rules for the form validation
		$rules = array(
			'item_id'				=> 'required',
			'user_id'				=> 'required',
			'quantity'           	=> 'required',
			'due_at'				=> 'required'
		);

		// Validate the inputs
		$validator = \Validator::make(\Input::all(), $rules);

		
		// Check if the form validates with success
		if ($validator->passes())
		{
			$itemsuser = new \itemsuser;
			$itemsuser->user_id = \Input::get('user_id');
			$itemsuser->item_id = \Input::get('item_id');
			$itemsuser->quantity = \Input::get('quantity');
			$itemsuser->due_at = \Input::get('due_at');

			// Save record
			$itemsuser->save();

			// Update the quantity of the item on the items table
			$item = \Item::where('id', '=', $itemsuser->item_id)->first();
			$item->quantity = ($item->quantity-$itemsuser->quantity);

			$item->save();

			// Redirect to the inventory page
			return \Redirect::to('admin/inventory')->with('success', 'Item lent with success!');
		}

			// Something went wrong
			return \Redirect::to('admin/inventory/lend')->withInput()->withErrors($validator);
	}

	public function getDelete($id, $name) 
	{
		// find item
		$item = \Item::where('id', '=', $id)
						->where('name', '=', urldecode($name))
						->first();
		
		// find any entries on itemsusers data table 
		$itemsuser = \ItemsUser::where('item_id', '=', $item->id)->first();

		// Check first if the item is lent to someone
		if($itemsuser) {

			return \Redirect::to('/admin/inventory')->withErrors(['msg', 'The Message']);
		
		} else {
			
			// redirect - also delete potential image
			\File::delete(public_path(). '/items/' . $id . '.png');
			$result = $item->delete();
			if($result) {
				return \Redirect::to('/admin/inventory')->with('success', $name . ' successfully deleted');
			}	else {
				return \Redirect::to('/admin/inventory')->withErrors('error', $name . ' could not be deleted');
			}
		}
	}

	public function getReturn($item_id, $due_at) 
	{
		// delete
		$itemsuser = \ItemsUser::where('item_id', '=', $item_id)
						->where('due_at', '=', urldecode($due_at))
						->first();

		// update item quantity
		$item = \Item::where('id', '=', $itemsuser->item_id)->first();
		$item->quantity = ($item->quantity+$itemsuser->quantity);
		$item->save();

		// redirect
		$result = $itemsuser->delete();
		if($result) { 
			return \Redirect::to('/admin/inventory')->with('success', $item_id . ' successfully returned');
		}	else {
			return \Redirect::to('/admin/inventory')->with('error', $item_id . ' could not be returned');
		}
	}

	public function getEdit($id) {
		$item = \Item::find($id);
		//$item = \Sentry::findItemById($id);
		return View::make('admin/inventory/edit')->with('item', $item);
	}

	public function getView($id) {
		$item = \Item::find($id);
		//$item = \Sentry::findItemById($id);
		return View::make('admin/inventory/view')->with('item', $item);
	}

	public function getViewlent($id) {
		$itemsuser = \ItemsUser::find($id);
		$item = \Item::where('id', '=', $itemsuser->item_id)->first();
		$user = \User::where('id', '=', $itemsuser->user_id)->first();
		return View::make('admin/inventory/viewlent')
					->with('itemsuser', $itemsuser)
					->with('user', $user)
					->with('item', $item);
	}

	public function postUpdate() 
	{
		
		$id = \Input::get('_id');
		$item = \Item::find($id);

		// Declare the rules for the form validation (same id excepted)
		$rules = array(
			'name'					=> 'required|unique:items,name,'.$id,
			'quantity'              => 'required',
			'category'              => 'required',
			);

		// Validate the inputs
		$validator = \Validator::make(\Input::all(), $rules);

		// Check if the form validates with success
		if ($validator->passes())
		{
			
			$item->name = \Input::get('name');
			$item->quantity = \Input::get('quantity');
			$item->category = \Input::get('category');
			$item->save();

			// Redirect to the register page
			return \Redirect::to('admin/inventory')->with('success', 'User editted with success!');
		}

			// Something went wrong
			return \Redirect::to('admin/inventory/edit/' . $item->id)->withInput()->withErrors($validator);
	}	

	public function postCreate()
	{
		// Declare the rules for the form validation
		$rules = array(
			'name'					=> 'required|unique:items',
			'quantity'           	=> 'required'
		);

		// Validate the inputs
		$validator = \Validator::make(\Input::all(), $rules);

		
		// Check if the form validates with success
		if ($validator->passes())
		{
			$item = new \item;
			$item->name = \Input::get('name');
			$item->quantity = \Input::get('quantity');
			$item->category = \Input::get('category');
			$item->status = \Input::get('status');

			$item->save();

			if ( \Input::file('image') )
			{

				// Save image
				$file = \Input::file('image');
				$destinationPath = "items/";
				$extension = $file->getClientOriginalExtension();
				$filename = time() . $item->id . "." . $extension;
				\Input::file('image')->move($destinationPath, $filename);
				$item->image = $filename;

				$item->save();

			}

			// Redirect to the inventory page
			return \Redirect::to('admin/inventory')->with('success', 'Item added with success!');
		}

			// Something went wrong
			return \Redirect::to('admin/inventory/add')->withInput()->withErrors($validator);
	}

}