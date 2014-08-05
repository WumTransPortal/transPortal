@extends('layouts.admin')

@section('head')

<script type="text/javascript">

function delete_item(id, name) {
    bootbox.confirm("Are you sure you want to delete " + name + "?", function(result) {

        if(result==true) {
           window.location = "/admin/inventory/delete/" + id + "/" + encodeURIComponent(name);
        }

    }); 
}

function return_lentitem(item_id, due_at) {
    bootbox.confirm("Are you sure you want to return " + item_id + "?", function(result) {

        if(result==true) {
           window.location = "/admin/inventory/return/" + item_id + "/" + encodeURIComponent(due_at);
        }

    }); 
}

function edit_item(id) {
    window.location = "/admin/inventory/edit/" + id;
}

function edit_lentitem(item_id) {
    window.location = "/admin/inventory/lentitem/edit/" + item_id;
}

function view_item(id) {
    window.location = "/admin/inventory/view/" + id;
}

function viewlent_item(id) {
    window.location = "/admin/inventory/viewlent/" + id;
}

</script>

@stop

@section('content')

<ol class="breadcrumb">
  <li><span class="fa fa-home home-btn"></span><a href="/admin"> Home</a></li>
  <li class="active">Inventory</li>
<hr>
</ol>

<!-- Error msg start -->
@if($errors->any())
{{ ($errors->first()) ? '<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Item cannot be deleted because it is already loaned to someone.</p>': ''}}
@endif
<!-- Error msg end -->

<div class="adminpage-label">      
    <h4><span class="fa fa-gavel"></span> Item List</h4>       
</div>
<div class="adminpage-sorter">  
       
            <div style="float: left;"><a href="/admin/inventory/add"><button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-circle"></i> add item</button></a></div>
            <div>
                <form method="GET" name="pagination" id="pagination" title="number of items shown">
                    <select name="itmsperpage" id="itmsperpage" class="form-control" style="margin-right: 5px;">
                      <option value="5" @if($itmsperpage == 5) selected @endif>5</option>
                      <option value="10" @if($itmsperpage == 10) selected @endif>10</option>
                      <option value="15" @if($itmsperpage == 15) selected @endif>15</option>
                      <option value="25" @if($itmsperpage == 25) selected @endif>25</option>
                      <option value="35" @if($itmsperpage == 35) selected @endif>35</option>
                    </select> 
            </div>
            <div style="float: right;">           
                    <select name="sortby" id="sortby" class="form-control">
                      <option value="id" @if($sortby == 'id') selected @endif>Id</option>
                      <option value="name" @if($sortby == 'name') selected @endif>Name</option>
                      <option value="quantity" @if($sortby == 'quantity') selected @endif>Quantity</option>
                      <option value="category" @if($sortby == 'category') selected @endif>Category</option>
                      <option value="status" @if($sortby == 'status') selected @endif>Status</option>
                    </select>
                </form>
            </div>
    </div>


<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>
                {{ $item->id }}
            </td>
            <td>
                {{ $item->name }}
            </td>
            <td>
                {{ $item->quantity }}
            </td>
            <td>
                @if($item->category == 1)
                lab only
                @else
                loanable
                @endif
            </td>
            <td>
                @if($item->status == 0)
                active
                @else
                loaned
                @endif
            </td>
            <td>
                <button onClick="view_item({{ $item->id }});" type="button" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-eye-open"></span> View</button>
                <button onClick="edit_item({{ $item->id }});" type="button" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-wrench"></span> Edit</button>
                <button onclick="delete_item({{ $item->id }}, '{{ $item->name }}');" type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </td>
        </tr>
    @endforeach     
    </tbody>
</table>
<table align="right">
    <tr>
        <td>
{{ $items->appends(Request::except('page'))->links(); }}
        </td>
    </tr>
</table>
</br>

<!-- Loaned items -->
</br>

        <div  class="adminpage-label">
            <h4><span class="fa fa-credit-card"></span> Loaned Items</h4>
        </div>

<table>
    <tr>
        <td align="center">
            <a href="/admin/inventory/lend"><button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-asterisk"></span> lend item</button></a>
        </td>
    </tr>
</table>
<p>
</p>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Item Id</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>User Id</th>
            <th>Username</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    @foreach($itemsusers as $itemsuser)
        <tr>
            <td>
                {{ $itemsuser->item_id }}
            </td>
            <td>
                @foreach($items as $item)
                    @if($itemsuser->item_id == $item->id) 
                    {{ $item->name }}
                    @endif
                @endforeach
            </td>
            <td>
                {{ $itemsuser->quantity }}
            </td>
            <td>
                {{ $itemsuser->user_id }}
            </td>
            <td>
                @foreach($users as $user)
                    @if($itemsuser->user_id == $user->id) 
                    {{ $user->username }}
                    @endif
                @endforeach
            </td>
            <td>
                {{ $itemsuser->due_at }}
            </td>
            <td>
                <button onClick="viewlent_item({{ $itemsuser->id }});" type="button" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-eye-open"></span> View</button>
                <button onClick="edit_lentitem({{ $itemsuser->item_id }});" type="button" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-wrench"></span> Edit</button>
                <button onClick="return_lentitem({{ $itemsuser->item_id }}, '{{ $itemsuser->due_at }}');" type="button" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-saved"></span> Return</button>
            </td>
        </tr>
    @endforeach     
    </tbody>
</table>
<table align="right">
    <tr>
        <td>
<!-- { $itemsusers->links(); }} -->
        </td>
    </tr>
</table>

<script type="text/javascript">

$('#itmsperpage').change(
    function() {
        $('#pagination').trigger('submit');
});

$('#sortby').change(
    function() {
        $('#pagination').trigger('submit');
});

</script>

@stop