@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><span class="fa fa-home"></span><a href="/admin"> Home</a></li>
  <li><a href="/admin/inventory">Inventory</a></li>
  <li class="active">View item</li>
<hr>
</ol>

<div class="row">
	<div class="col-xs-3">
		<!-- Username -->
		<div>
			<label>Id:</label>
			{{ $item->id }}
		</div>
		<div>
			<label>Name:</label>
			{{ $item->name }}
		</div>
		<div>
			<label>User's id loaned to:</label>
			{{ $item->user_id }}
		</div>
		<div>
			<label>Quantity:</label>
			{{ $item->quantity }}
		</div>
		<div>
			<label>Statuts:</label>
			{{ $item->status }}
		</div>
		<div>
			<label>Category:</label>
			{{ $item->category }}
		</div>
		<div>
			<label>Date Added:</label>
			{{ $item->date_added }}
		</div>
		<div>
			<label>Available at:</label>
			{{ $item->becomes_available }}
		</div>
			<label>Preview:</label>
			<p> <img src="/items/{{$item->image}}" style="width:300px;" /> </p>
		</div>
	</div>
</div>
@stop