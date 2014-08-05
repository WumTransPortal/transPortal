@extends('layouts.master')


@section('content')


<div class="wrapper">    

    <div id="header-carousel"> 
          
                <div id="myCarousel" class="carousel slide">
                  <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item">
                          <a href="latestnews/news"><img src="/img/slideshow/01.jpg"> </a>

                        </div>
                         <div class="item active">
                         <a href="explore/tutorials"><img src="/img/slideshow/02.jpg"> </a>

                    </div>
                         <div class="item">
                        <a href="explore/tutorials"><img src="/img/slideshow/03.jpg"> </a>

                    </div>



                    </div>
                    <!--/carousel-inner-->
                <div class="controller">
                    <a class=" carousel-control left" href="#myCarousel" data-slide="prev">‹</a>

                    <a class=" carousel-control right" href="#myCarousel" data-slide="next">›</a>
                    </div>
                </div>
                <!--/myCarousel-->
    </div>
    <div id="content-body">
      <div id="left-col">
        <div class="left-box-contents">
          <div class="left-box-item" id="site-news">
            <div class="left-box-label"><p>LATEST NEWS</p></div>          
            <ul style="list-style: none; margin:0; padding:10px; padding-top: 5px; font-size: 12px;">
             
              <li><a href="/latestnews/news">Bremen Fablab: Workshop Day2 </a></li> <hr>
              <li><a href="/latestnews/news">Fablab International Meal</a></li> <hr>
              <li><a href="/latestnews/news">Welcome to the Bremen Fablab</a></li> <hr>
            </ul>
          </div>

          <div  class="left-box-item" id="open-hours">
            <div class="left-box-label"><p>OPENING HOURS</p></div>          
            <p style="padding-left: 10px; font-size: 12px;">
              Monday-Friday: 9:00 am - 6:00pm <br>
              Saturday: 10:00 - 12:00pm <br>
              Sunday: Closed <br>
            </p>
          </div>

          <div  class="left-box-item" id="contact-us">
            <div class="left-box-label"><p>CONTACT US</p></div>
              <p style="padding-left: 10px; font-size: 12px;">Tel/Fax: +49(0)421-218-XXXXXX<br>
                E-Mail: support@fablab-bremen.de</p>
              
          </div>
          <div class="left-box-item" id="whos-in-lab">
            <div class="left-box-label"><p>IN LAB RIGHT NOW</p></div>           
            <ul class="media-list " style="height: 150px; overflow: scroll; padding-left: 10px; font-size: 13px;">

              @if($usersinlab)
                @foreach($usersinlab as $userinlab)
                  @if($userinlab->incognito == 0) 
                  <li style="width: 100%; display: inline-block;">
                    <a  href="/profile/show/{{ $userinlab->username }}" title="Go to {{ $userinlab->username }} profile">
                      <img  alt="" style="width: 20px; height: 20px;" src="/profile-pics/{{$userinlab->profile_pic}}">
                      <div style="width: 100px; display: inline-block;">
                      <p>{{ $userinlab->username }}</p>   
                      </div>
                     </a>
                  </li>           
              @endif
                @endforeach
              @else
                    <p>{{ $userinlab->username }} The lab is empty. :(</p>
              
              @endif
              
            </ul>
     


          </div>
        </div>
      </div>
      <div id="right-col">
        <div class="big-quick-panel">
          <div id="container">
            <div class="panel-item" id="browse" title="browse public projects">
              <a href="/explore/publicprojects">
                <div><i class="fa fa-eye"></i> Be Inspired!</div>
                <div>Browse best collections of projects</div>
              </a>
            </div>
            <div class="panel-item" id="machine-info" title="read about fablab tools">
              <a href="/explore/tools">
                <div><i class="fa fa-book"></i> Learn It!</div>
                <div>Read how those fancy machines works</div>
              </a>
            </div>
            <div class="panel-item" id="insurance" title="Liability Insurance">
              <a href="/uploads/files/Studentische_Haftpflichtversicherung_Infoblatt.pdf" target="_blank">
                <div><i class="fa fa-exclamation-circle"></i> Be Insured!</div>
                <div>Some insurance requirement to use lab tools</div>
              </a>
            </div>
            <span class="stretch"></span>
          </div>
        </div>
      
        <div class="lab-info">
         <strong><p style="opacity: .80;">Recomended Projects </p></strong>
          <hr>
          <div class="all_projects row" style="margin:0;">

              @foreach($projects->slice(-6, 6) as $project)
                       
                <div class="thumbnail_shot col-xs-3 col-md-3" style="margin-right: 15px;">
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
          </div>          
         </div>
        </div>
    </div>
   
</div>

@stop