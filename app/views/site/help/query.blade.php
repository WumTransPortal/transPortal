@extends('layouts.master')
@section('content')
<div id="query-form">
	<h4>Fill out this form to send in question.</h4>
	<br>
	<form class="form-horizontal" role="form">
	  <div class="form-group">
	    <label for="inputName" class="col-sm-2 control-label">Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputName" placeholder="Name">
      	</div>
	  </div>
	  <div class="form-group">
	    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputQuestion" class="col-sm-2 control-label">Question</label>
	    <div class="col-sm-10">
	      <textarea class="form-control" id="inputQuestion" rows="3" placeholder="Your question"></textarea>
      	</div>
		  </div>
		  <div class="form-group" >
	    <div style="float:right; margin: 15px;">
	        <button type="submit" class="btn btn-success" style="border-radius: 0;">Submit</button>
	    </div>
	  </div>
	</form>


</div>

@stop