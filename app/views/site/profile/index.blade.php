@extends('layouts.master')

@section('head')

{{ HTML::script('js/listings.js'); }}
{{ HTML::style('css/listings.css'); }}
@include('site/partials/_tags-head')

@stop

@section('content')



	
		
		<div class="content_container container">
			@include('site.profile._user_profileheader')


			@if (Sentry::Check() && Sentry::getUser()->username == $username)
				@include('site.profile._user_navigation')
			@endif
            <div style="margin-top: 30px">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left"  @if (Sentry::check() && Sentry::getUser()->username == $username) style="line-height: 35px" @endif>
                            My Listings ({{ $listings->getTotal() }})
                        </div>
                        <div class="pull-right">
                            @if (Sentry::check() && Sentry::getUser()->username == $username)
                            <a href="{{ route('profile.listings.index') }}">
                                <div class="btn btn-success">
                                    Manage Listings
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body" style="padding-right: 0">
                        @if ($total > 0)
                        {{ Form::open(['role' => 'form', 'method' => 'get']) }}
                            <div class="form-group pull-left" style="margin-right: 20px">
                                {{ Form::label('listing-type', 'Listing-Type') }}
                                {{ Form::select('listing-type', ['all' => 'All', 'need' => 'Only Needs', 'offer' => 'Only Offers'], Input::old('listing-type'), ['class' => 'auto-submit form-control']) }}
                            </div>

                            <div class="form-group pull-left" style="margin-right: 20px">
                                {{ Form::label('type-of-service', 'Type of Service') }}
                                {{ Form::select('type-of-service', ['all' => 'All', 'material' => 'Only Material', 'service' => 'Only Service'], Input::old('type-of-service'), ['class' => 'auto-submit form-control']) }}
                            </div>

                            <div class="form-group pull-left" style="margin-right: 20px">
                                {{ Form::label('sorting', 'Sorting') }}
                                {{ Form::select('sorting', ['ending' => 'Ending soonest', 'new' => 'Newly listed'], Input::old('sorting'), ['class' => 'auto-submit form-control']) }}
                            </div>

                            <div class="form-group pull-left">
                                {{ Form::label('tags', 'Tags') }}<br>
                                @include('site/partials/_tags-element')
                            </div>
                            <div class="clearfix"></div>
                        {{ Form::close() }}

                        <hr>
                        @endif

                        @if ($listings->count())
                            <div style="margin-left: 50px">
                                @include('site/listings/partials/_grid-view', ['results' => $listings])
                            </div>

                            <div style="text-align: center; margin: -15px 0">
                                {{ $listings->appends(Input::except(array('page')))->links() }}
                            </div>

                        @else
                            <p style="font-weight: bold; text-align: center">No Listings</p>
                        @endif
                    </div>
                </div>
            </div>

			<!--This is the My Recent Projects of dashboad page-->
			<div>
				<div style="margin-top:10px; font-weight: bold">
				    <p> My Recent Projects</p>
				    <hr>
				</div>

				<!-- Project Thumbnails -->			
				
				<div class="low  row" style="margin:0;" >
				
				    <div class="all_projects" >
				      <!--single thumbnail-->
				        @foreach($projects->slice(-4, 4) as $project)
						<div class="thumbnail_shot col-xs-3 col-md-3">
						  <a href="/project/{{$project->id}}" >
						    <?php 
						    $files = explode(",", $project->files);
						    $file = $files[0];
						    ?>
						    @if(empty($file))
						    <img src="/img/images.jpg">
						    @else
						    <img src="{{$file}}">
						    @endif
						    <div id="img_ribbon"> {{ $project->title }} </div></a>
						    <div class="caption_wrapper">  
						      <ul class="caption">         
						        <li><i class="fa fa-eye"></i> {{ $project->views }} </li>
						        <li><a href="#"><i class="fa fa-comment"></i> {{ $project->comment_count }} </a></li>
						        <li><a href="#"><i class="fa fa-heart"></i> {{ $project->favorite }} </a></li>
						      </ul>
							</div>      
						  </div>
						  @endforeach
						
					   <!--/single thumbnail-->
						      
				</div>

  				</div> 
			</div>
		
			<!-- Newsfeed-->
			<!--
			
			    <a href="#">My Newsfeed</a>
			    <hr>
			    
			   
				<div class="btn-group">
			      <button type="button" class="btn btn-default">All Newsfeed</button>
			      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			        <span class="caret"></span>
			        <span class="sr-only">Toggle Dropdown</span>
			      </button>
			      <ul class="dropdown-menu" role="menu">
			        <li><a href="#">Comments</a></li>
			        
			        <li><a href="#">Following</a></li>
			         
			        <li><a href="#">Inventory</a></li>
			         
			        <li><a href="#">Appointment</a></li>      
			        
			      </ul>
		   		</div><!-- /btn-group -->

			 
			    <!-- Comments Section starts here -->
		    <!--
	      			<div>
				        <table>
				          <td>
				            <div  class="commentPic">
				              <a href="#">
				                <img src="/uploads/projects/46/images/1394562268531f54dc1047f.jpg"></a>
				            </div>
				          </td>
				          <td>
				            <div class="commentName">
				              <h5><strong>Sabirina</strong></h5>
				              <p>This project is so wow. Such beauty. So doge. Much like.</p>
				            </div>
				          </td>
                               </table>
                          <table>
				          
                         <td>
				            <div  class="commentPic">
				              <a href="#">
				                <img src="/profile-pics/139418594076.jpg"></a>
				            </div>
				          </td>
				          <td>
				            <div class="commentName">
				              <h5><strong>Dennis</strong></h5>
				              <p>Love your projects! The whole branding is great too :)</p>
				            </div>
				          </td>
				          
			        	</table>
			        	 <table>
				          
                         <td>
				            <div  class="commentPic">
				              <a href="#">
				                <img src="/uploads/projects/29/images/1394446524531d90bc5a37b.jpg"></a>
				            </div>
				          </td>
				          <td>
				            <div class="commentName">
				              <h5><strong>Bernd</strong></h5>
				              <p>Great work! Would like to see more of your projects! Spring is coming. Hooray!!! </p>
				            </div>
				          </td>
				          
			        	</table>
		      		</div>
	      			
				<div class="pull-right">
				  <a href="#"> More
				    <i class=" fa fa-chevron-right"></i>
				  </a>
				  <span class="hide">likes</span>
				</div>
				<!--COMMENTS END HERE-->

			</div>
		</div>
		

      	
   
			<!-- CONTENT ENDS HERE -->


<script>
    (function(){
        setAutoSubmit();
    })();
</script>

@stop