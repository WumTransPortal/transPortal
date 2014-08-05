@extends('layouts.master')


@section('content')
    
   
    <div class="left-wrapper">
        <div class= "profile-pic">
            
            <h3><strong>{{strtoupper($user->username)}}</strong></h3>
            <!--Modal for photo upload popup menu-->            
            <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div><h4>Upload a photo</h4></div> 
                  <hr>                 
                   <form method="post" action="/profile/setting/update" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
                      <input type="hidden" name="_id" value="{{ $user->id }}" />
                      <div class="form-group">
                        <input type="file" name="image" id="image">
                        <p class="help-block">Supported formats: .jpg, .png.<br> Maximum size: 1024x1024</p>
                      </div>
                      <a href="#" class="btn" data-dismiss="modal"><button type="button" class="btn btn-warning">Cancel</button></a>
                      <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
                   </form>          
                </div>
              </div>
            </div>
            <!--/ end Modal for photo upload popup menu-->
            <a href="#">                     
               <img src="/profile-pics/{{$user->profile_pic}}" data-toggle="modal" data-target=".bs-modal-lg" class="img-responsive img-thumbnail" title= "Click to change picture" alt="Responsive image" >
            </a>
        </div>
        <div class="bio">      
            <div><i class="fa fa-map-marker"></i> Bremen, Germany</div>           
        </div>
        <div id="change-label" data-toggle="modal" data-target=".bs-modal-lg"><a href="#">Change profile photo</a></div>
        <div id="change-label"><a href="/profile/passwordchange">Manage Account</a></div>
        <div style="background-color: #FDB363; width: 170px; color: #ffffff; padding-left: 5px;">
          <div class="checkbox" title="People won't see that you are in lab" >
            <label>
              <input {{($user->incognito == 1)? 'checked': ''}} type="checkbox" name="incognito" id="incognito" value="1" >
              Hide lab status
            </label>
          </div>
        </div>
    </div>
    <div class="right-wrapper">
        <div id="basic_info">
            <div class="section-label"><strong>Summary statistics</strong></div>          
            <div class="stats-group" style="padding-left: 10%; padding-right:10%;">
             
              <div  class="basic_info_group"><a href="#">26</br>Projects</a></div>
              <div  class="basic_info_group"><a href="#">17</br>Collections</a></div>
              <div  class="basic_info_group"><a href="#">30</br>Followings</a></div>
              <div  class="basic_info_group"><a href="#">21</br>Followers</a></div>
            </div>
        </div>
        <div id="manage-projects">
            <div class="section-label"><strong>Manage Projects</strong></div>
            <div id="public-projects">
              <div class="project-wrapper">
                  <div class="sub-label" title="Click to edit">
                      <div><strong>Public Projects </strong>
                      <a href="#"><i class="fa fa-edit" style="font-size: 20px; float: right"></i></a></div>
                 </div>
              </div>
              <div class="project-showcase-container">
                <div id="select-btn">
                    <label class="radio-inline"><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"> Select all</label>
                    <label class="radio-inline"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Deselect all</label>                             
                </div>
                <div class="row">
                  <div class="gallery">
                    <div class="thumbnail_shot">
                      <a href="display_project_index.html">
                        <div>                                   
                          <div class="checkbox">
                            <label id="check-box">
                            <input type="checkbox"  style="width:20px; height: 20px;">
                            </label>
                          </div> 
                          <div id="img_ribbon">
                            <div><strong>This is project's name</strong></div>
                          </div>
                          <img src="/img/images.jpg">
                        </div>                                
                      </a>
                    </div>
                    <div class="thumbnail_shot ">
                      <a href="display_project_index.html">
                        <div> 
                          <div class="checkbox">
                            <label id="check-box">
                            <input type="checkbox"  style="width:20px; height: 20px;">
                            </label>
                          </div>  
                          <div id="img_ribbon">
                            <div><strong>This is project's name</strong></div>
                          </div>                                
                          <img src="/img/thumb4.jpg"> 
                        </div>                                
                      </a>
                    </div>
                    <div class="thumbnail_shot">
                      <a href="display_project_index.html">
                        <div>                                   
                          <div class="checkbox">
                            <label id="check-box">
                            <input type="checkbox"  style="width:20px; height: 20px;">
                            </label>
                          </div> 
                          <div id="img_ribbon">
                            <div><strong>This is project's name</strong></div>
                          </div>
                          <img src="/img/thumb1.jpg">
                        </div>                                
                      </a>
                    </div>
                  </div>                          
                </div>

                <div id="action-btn">
                    <button type="button" class="btn btn-default ">Make private</button>
                    <button type="button" class="btn btn-danger " style="border-radius: 0;">Delete</button>
                </div>                 
              </div>
            </div>  
            <br>
            <div id="private-projects">
              <div class="project-wrapper">
                  <div class="sub-label" title="Click to edit">
                      <div><strong>Private Projects </strong>
                      <a href="#"><i class="fa fa-edit" style="font-size: 20px; float: right"></i></a></div>
                 </div>
              </div>
              <div class="project-showcase-container">
                <div id="select-btn" >
                    <label class="radio-inline"><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"> Select all</label>
                    <label class="radio-inline"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Deselect all</label>                             
                </div>
                <div class="row">
                  <div class="gallery">
                    <div class="thumbnail_shot">
                      <a href="display_project_index.html">
                        <div>                                   
                          <div class="checkbox">
                            <label id="check-box">
                            <input type="checkbox"  style="width:20px; height: 20px;">
                            </label>
                          </div> 
                          <div id="img_ribbon">
                            <div><strong>This is project's name</strong></div>
                          </div>
                          <img src="/img/thumb1.jpg">
                        </div>                                
                      </a>
                    </div>
                    <div class="thumbnail_shot ">
                      <a href="display_project_index.html">
                        <div> 
                          <div class="checkbox">
                            <label id="check-box">
                            <input type="checkbox"  style="width:20px; height: 20px;">
                            </label>
                          </div>
                          <div id="img_ribbon">
                            <div><strong>This is project's name</strong></div>
                          </div>                                  
                          <img src="/img/thumb4.jpg"> 
                        </div>                                
                      </a>
                    </div>
                    <div class="thumbnail_shot">
                      <a href="display_project_index.html">
                        <div>                                   
                          <div class="checkbox">
                            <label id="check-box">
                            <input type="checkbox"  style="width:20px; height: 20px;">
                            </label>
                          </div> 
                          <div id="img_ribbon">
                            <div><strong>This is project's name</strong></div>
                          </div>   
                          <img src="/img/thumb1.jpg">
                        </div>                                
                      </a>
                    </div>
                   </div>                          
                </div>

                <div id="action-btn">
                    <button type="button" class="btn btn-default">Make public</button>
                    <button type="button" class="btn btn-danger" style="border-radius: 0;">Delete</button>
                </div>                 
              </div>
            </div>
            <hr>
        </div>
        <div class="project_action">
            <div class="btn-group">    
              <button type="submit" class="btn btn-success">Save</button>                           
              <a href="/profile/show/{{$user->username}}"><button type="button" class="btn btn-warning">Cancel</button></a>
              
            </div>
        </div>
    </div>
  </form>
       

        
   
@stop