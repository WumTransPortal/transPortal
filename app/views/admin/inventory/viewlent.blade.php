@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><span class="fa fa-home"></span><a href="/admin"> Home</a></li>
  <li><a href="/admin/inventory">Inventory</a></li>
  <li class="active">View lent item</li>
<hr>
</ol>

<div class="row">
	<div class="col-xs-3">
		<!-- Username -->
		<div>
			<label>Transaction Id:</label>
			{{ $itemsuser->id }}
		</div>
		<div>
			<label>Date Created:</label>
			{{ $itemsuser->created_at }}
		</div>
		<div>
			<label>Username:</label>
			{{ $user->username }}
		</div>
		<div>
			<label>User's id:</label>
			{{ $itemsuser->user_id }}
		</div>
		<div>
			<label>Quantity Borrowed:</label>
			{{ $itemsuser->quantity }}
		</div>
		<div>
			<label>Due Date:</label>
			{{ $itemsuser->due_at }}
		</div>
			<label>Preview:</label>
			<p> <img src="/items/{{$item->image}}" style="width:300px;" /> </p>
		</div>
	</div>
</div>
@stop