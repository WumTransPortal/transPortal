@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><span class="fa fa-home"></span><a href="/admin"> Home</a></li>
  <li><a href="/admin/inventory">Inventory</a></li>
  <li class="active">Lend item</li>
<hr>
</ol>

			<form method="post" action="/admin/inventory/lend" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">

					
						<!-- CSRF Token -->
						<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
				<div class="row">
					<div class="col-xs-3">
						
						<!-- User selection -->
						<div class="control-group {{ $errors->has('user_id') ? 'error' : '' }}">
						<label class="control-label" for="user_id">User</label>
							<div>
								<select name="user_id" id="user_id">
									@foreach($users as $user)
										<option value="{{$user->id}}">{{$user->username}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<!-- Item selection -->
						<div class="control-group {{ $errors->has('item_id') ? 'error' : '' }}">
						<label class="control-label" for="item_id">Item</label>
							<div>
								<select name="item_id" id="item_id">
									@foreach($items as $item)
										<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<!-- Quantity selection -->
						<div class="control-group {{ $errors->has('quantity') ? 'error' : '' }}">
						<label class="control-label" for="quantity">Quantity</label>
							<div class="controls">
								<input type="number" name="quantity" id="quantity" min="1" max="MaxAvailableQuantity" />
								{{ $errors->first('quantity', '<span class="help-inline">:message</span>') }}
							</div>
						</div>
						*Maximum value available displayed

						<!-- Due date selection -->
						<div class="control-group {{ $errors->has('due_at') ? 'error' : '' }}">
						<label class="control-label" for="due_at">Due date</label>
							<div class="controls">
								<input type="date" name="due_at" id="due_at" />
								{{ $errors->first('due_at', '<span class="help-inline">:message</span>') }}
							</div>
						</div>

					</div>

				

					</div>
					<div class="control-group">
							<label class="control-label" for=""></label>
							<div class="controls">
								* required fields
								<p>
								</p>
							</div>
						</div>
					<!-- Form actions -->
						<div class="control-group">
							<div class="controls">
								<a href="/admin/inventory"><button type="button" class="btn btn-default"> Cancel</button></a>
								<button type="submit" class="btn btn-primary"> Add</button>
							</div>
						</div>
					</form>

<!-- Change the quantity input according to maximum available quantity of selected item-->
@foreach($items as $item)
<script type="text/javascript">

		$("#item_id").change(function()
		{
			var inputvalue = $("#item_id").val();
			var quantityinput = document.getElementById("quantity")
			"{{$inputvalue}}" == inputvalue;
			if (inputvalue == "{{$item->id}}") {
				//alert ("{{$item->id}}");
				$("#quantity").val("{{$item->quantity}}");
				quantityinput.setAttribute("max","{{$item->quantity}}");
			}	
		});

		// No preselection on lists
		$('#item_id').prop('selectedIndex', -1)
		$('#user_id').prop('selectedIndex', -1)

</script>
@endforeach

@stop