@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xs-12"> 
		<div class="content_container container">
			<div class="profile_header">
				<div class= "brief_profile">
				  <a href="#"> <img src="profile-pics/{{$user->profile_pic}}" class="img-responsive img-thumbnail" alt="Responsive image" ></a>
				</div>
				<div class="bio">
					<h5><strong> {{$user->username}}</strong></h5>
			  		<small>I like creation, I like turrle! </small></br>
			  		<small>{{$user->zipcode}} {{$user->city}}</small> </div>
				<div class="basic_info">
				 	<div class="btn-group">
				  	<button type="button" class="btn btn-default">Project</br>26</button>
				  	<button type="button" class="btn btn-default">Collections</br>17</button>
				  	<button type="button" class="btn btn-default">Followings</br>22</button>
				  	<button type="button" class="btn btn-default">Followers</br>36</button>
					</div>
				</div>
			</div>
			<div class= "main_tabs container">
				<ul class="nav nav-pills">
				  <li {{( preg_match("#profile/show#i", Request::path()) ) ? 'class="active"' : ''}}>
				  	<!-- How to link to Dashboard/Projects/Appointments...etc with Laravel???
				  		does it work with preg_match( eg: {{( preg_match("#admin/users#i", Request::path()) ) ? 'active' : ''}}-->
				    <a href="/profile/show/{{$user->username}}">Dashboard</a>
				  </li>
				  <li>
				    <a href="/profile/projects/{{$user->username}}">Projects</a>
				  </li>
				  <li>
				    <a href="/profile/appointments/{{$user->username}}">Appointments</a>
				  </li>
				  <li>
				    <a href="/profile/inventory/{{$user->username}}">Inventory</a>
				  </li>
				  <li>
				    <a href="/profile/usagedata/{{$user->username}}">Usage Data</a>
				  </li>
				</ul>
			</div>

			<!--This is the My Recent Projects of dashboad page-->
			<div>
			    <h4>My Recent Projects</h4>
			    <hr>
			</div>

			<!-- Project Thumbnails -->
			<div class="row">
			    <div class="col-sm-6 col-md-3">
			      <a href="#" class="img-responsive img-thumbnail">
			        <img data-src="holder.js/100%x200" src="img/thumb1.jpg"></a>
			    </div>

			    <div class="col-sm-6 col-md-3">
			      <a href="#" class="img-responsive img-thumbnail">
			        <img data-src="holder.js/100%x180" src="img/thumb2.jpg"></a>
			    </div>

			    <div class="col-sm-6 col-md-3">
			      <a href="#" class="img-responsive img-thumbnail">
			        <img data-src="holder.js/100%x180" src="img/thumb3.jpg"></a>
			    </div>

			    <div class="col-sm-6 col-md-3">
			      <a href="#" class="img-responsive img-thumbnail">
			        <img data-src="holder.js/100%x180" src="img/thumb4.jpg"></a>
			    </div>
			</div>
			<!-- Newsfeed-->
			<div>
			    <h4>My Newsfeed</h4>
			    <hr>
			    <div>
			      <table>
			        <td>
			          <select class="form-control">
			            <option>all</option>
			            <option>comments</option>
			            <option>following</option>
			            <option>Inventory</option>
			            <option>Appointment</option>
			          </select>
			        </td>
			      </table>
			    </div>
			    <!-- Comments Section starts here -->
			    <div>
	      			<div>
				        <table>
				          <td>
				            <div  class="commentPic">
				              <a href="#">
				                <img src="img/doge.jpg"></a>
				            </div>
				          </td>
				          <td>
				            <div class="commentName">
				              <h5>Doge</h5>
				              <p>This project is so wow. Such beauty. So doge. Much like.</p>
				            </div>
				          </td>
			        	</table>
		      		</div>
	      		</div>	
				<div class="pull-right">
				  <a href="#"> More
				    <i class=" fa fa-chevron-right"></i>
				  </a>
				  <span class="hide">likes</span>
				</div>
				<!--COMMENTS END HERE-->					
			</div>
			<!-- CONTENT ENDS HERE -->
		</div>
	</div>
</div>
@stop