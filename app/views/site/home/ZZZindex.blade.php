@extends('layouts.master')


@section('content')
	<!-- //////////////////////////////////
	<div class="row">

		<div class="span12">
		
			<div class="content">
				<h1>Welcome to the<br />Digital Experience Laboratory</h1>
				<p class="lead">The FabLab at University Bremen: A place to come for making, learning and sharing.</p>

				<hr />
				<h3 style="color: #d00;">Want to show what you have done?</h3>
				<p>Simply <a href="/account/register">register</a> for an account and got to the <a href="/projects">projects</a> section.</p>

				<h3 style="color: #d00;">Don't know how the machines work?</h3>
				<p><img src="/img/qrcode.png" class="thumbnail pull-left" style="margin-right: 10px;"/>Download any QR-Scanner App and scan our QR codes located on top of each machine, gadget or tool.<p>
				<p>For the iPhone and iPod Touch we recommend using the free app called <a href="https://itunes.apple.com/de/app/scan/id411206394?mt=8" target="_blank">Scan</a>.</p>
				<div class="clearfix"></div>
				<hr />
				<?php
				/*
				

				<br />The FabLab at University Bremen
				<div class="alert alert-error"><strong><i class="icon-warning-sign"></i> This site is under construction!</strong></div>
				
				<div class="hero-unit">
					<h1>Heading</h1>
					<p>Tagline</p>
					<p>
					<a class="btn btn-primary btn-large">Learn more</a>
					</p>
				</div>
				
				<hr />
				
				
				<div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item next left">
                    <img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg" alt="">
                    <div class="carousel-caption">
                      <h4><a>First Thumbnail label</a> by Sabine Schmidt</h4>
                    </div>
                  </div>
                  <div class="item">
                    <img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>Second Thumbnail label</h4>
                    </div>
                  </div>
                  <div class="item active left">
                    <img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>Third Thumbnail label</h4>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
              </div>
				*/
				?>
				<h3><i class="icon-download"></i> Downloads</h3>

				<p><strong><a href="/uploads/files/fablab Manual.pdf" target="_blank"><i class="icon-book"></i> The fablab Manual</a></strong></p>
				
				<p><strong><a href="/uploads/files/Studentische_Haftpflichtversicherung_Infoblatt.pdf" target="_blank">Liability insurance for students / Haftpflichtversicherung</a></strong></p>
				
				<p>&nbsp;</p>
				
				<p><strong>Laser Cutter</strong></p>
				<ul>
					<li><a href="/uploads/files/LaserDraw 9 - English (EngraveLab 9).pdf" target="_blank">LaserDraw 9 - English</a></li>
					<li><a href="/uploads/files/Laserdraw 9 - German.pdf" target="_blank">LaserDraw 9 - German</a></li>
					<li><a href="/uploads/files/Zing - English.pdf" target="_blank">Zing LaserCutter - English</a></li>
					<li><a href="/uploads/files/Zing - German.pdf" target="_blank">Zing LaserCutter - German</a></li>
				</ul>

				<p><strong>LaserCutter settings</strong></p>
				<ul>
					<li><a href="/uploads/files/Laserwertetabelle.pdf" target="_blank">Laserwertetabelle</a></li>
				</ul>

				<p>&nbsp;</p>
				
				<p><strong>3D Printers</strong></p>
				<ul>
					<li><a href="/uploads/files/Ultimaker.pdf" target="_blank">3D Printer Ultimaker - English</a></li>
					<li><a href="/uploads/files/Prusa.pdf" target="_blank">3D Printer Prusa - English</a></li>
				</ul>
				
				<p>&nbsp;</p>

				<p><strong>Vinyl Cutters</strong></p>
				<ul>
					<li><a href="http://www.youtube.com/watch?v=TRGZ3cuO3Nc" target="_blank">How to Cut Vinyl</a></li>
					<li><a href="http://www.youtube.com/watch?v=UyQE8bY1-Mw" target="_blank">Cutting ThermoFlex Plus</a></li>

					<li><a href="http://www.youtube.com/watch?v=gMcWKW8Ep70" target="_blank">How to Print and Cut</a></li>
					<li><a href="http://www.youtube.com/watch?v=bA7jgv8BA-w" target="_blank">Printable Heat Transfer Material</a></li>
					<li><a href="http://www.youtube.com/watch?v=Ipjvy_94Ke8" target="_blank">How to make a T-Shirt</a></li>
					<li><a href="http://www.youtube.com/watch?v=IBAh_fF38Ik" target="_blank">Cutting Fabric</a></li>
				</ul>

			</div>
		</div>
	
	</div>

	<div class="row">
			
		<div class="span12">

			<div class="content">
				<hr/>
				<p><a href="http://dimeb.de" target="_blank"><img src="/img/logo_dimeb.png"></a></p>

				<p>Universität Bremen<br />
				<strong>AG Digitale Medien in der Bildung</strong></p>
				<p>Bibliothekstraße 1<br />
				28359 Bremen
				</p>
				<p>
				Dr.-Ing. Dennis Krannich<br />
				krannich ( at ) tzi.de<br />
				+49 (0) 421 - 218 - 64384
				</p>
			
			</div>
		
		</div>
	
	</div>
/////////////////////////////////-->

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
                        <div class="item active">                        
                          <a href="#"><img src="img/robot.jpg"> </a>                       
                        </div>
                         <div class="item">                        
                         <a href="#"><img src="img/tile.jpg"> </a>                       
                        </div>
                         <div class="item">                        
                        <a href="#"><img src="img/night.jpg"> </a>                      
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
            <div class="left-box-label"><p><strong>LATEST NEWS</strong></p></div>          
            <ul style="list-style: none; margin:0; padding:10px; padding-top: 5px; font-size: 12px;">
              <li><a href="#">Welcome to the Bremen Fablab</a></li> <hr>
              <li><a href="#">Welcome to the Bremen Fablab</a></li> <hr>
              <li><a href="#">Welcome to the Bremen Fablab</a></li> <hr>
              <li><a href="#">Welcome to the Bremen Fablab</a></li> <hr>
            </ul>
          </div>

          <div  class="left-box-item" id="open-hours">
            <div class="left-box-label"><p><strong>OPENING HOURS</strong></p></div>          
            <p style="padding-left: 10px; font-size: 12px;">
              Monday-Friday: 9:00 am - 6:00pm <br>
              Saturday: 10:00 - 12:00pm <br>
              Sunday: Closed <br>
            </p>
          </div>

          <div  class="left-box-item" id="contact-us">
            <div class="left-box-label"><p><strong>CONTACT US</strong></p></div>
              <p style="padding-left: 10px; font-size: 12px;">Tel/Fax: +49(0)421-218-64384<br>
                E-Mail: krannich@tzi.de</p>          
              
          </div>
          <div class="left-box-item" id="whos-in-lab">
            <div class="left-box-label"><p><strong>IN LAB RIGHT NOW</strong></p></div>
           
            <ul class="media-list " style="height: 150px; overflow: scroll;">
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" alt="" style="width: 20px; height: 20px;" src="img/penny.jpg">
                </a>
                <div class="media-body">
                  <p class="media-heading">Penny</p>       
                </div>
              </li>
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" alt="4" style="width: 20px; height: 20px;" src="img/sheldon.jpg">
                </a>
                <div class="media-body">
                   <p class="media-heading">Sheldon</p>       
                </div>
              </li>
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" alt="" style="width: 20px; height: 20px;" src="img/penny.jpg">
                </a>
                <div class="media-body">
                  <p class="media-heading">Penny</p>       
                </div>
              </li>
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" alt="4" style="width: 20px; height: 20px;" src="img/sheldon.jpg">
                </a>
                <div class="media-body">
                   <p class="media-heading">Sheldon</p>       
                </div>
              </li>
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" alt="" style="width: 20px; height: 20px;" src="img/penny.jpg">
                </a>
                <div class="media-body">
                  <p class="media-heading">Penny</p>       
                </div>
              </li>
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" alt="4" style="width: 20px; height: 20px;" src="img/sheldon.jpg">
                </a>
                <div class="media-body">
                   <p class="media-heading">Sheldon</p>       
                </div>
              </li>

              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" alt="4" style="width: 20px; height: 20px;" src="img/sheldon.jpg">
                </a>
                <div class="media-body">
                   <p class="media-heading">Sheldon</p>       
                </div>
              </li>
            </ul>
     


          </div>
        </div>
      </div>
      <div id="right-col">
        <div class="big-quick-panel">
          <div id="container">
            <div class="panel-item" id="browse" title="browse public projects">
              <a href="http://dk1.informatik.uni-bremen.de/explore/publicprojects">
                <div><i class="fa fa-eye"></i> Be Inspired!</div>
                <div>Browse collections of projects</div>
              </a>
            </div>
            <div class="panel-item" id="machine-info" title="read about fablab tools">
              <a href="http://dk1.informatik.uni-bremen.de/explore/tools">
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
        <hr>
        <div class="lab-info">
         <h4 style="opacity: .80;"><strong>WHAT WE STRIVE TO ACHIEVE</strong></h4>
         <img src="img/fablab.jpg" style="width: 650px; height: auto;">
         <div style="padding-top: 10px;">
            We take care of the studio and the machines and offer it to you to realize you ideas, offer workshops or learn from other members.
            We will host at least one open lab day a week that is free of charge and open to everyone interested in digital fabrication and making. On top of that we offer several membership options. Our studio and machines can be reserved for personal events and projects at a modest rate and we offer support for realizing your dreams!
         </div>
        </div>
        <!--
        <hr style="margin-top:10px;"> 
        <div class="social-network">
          <h4 style="opacity: .80;"><strong>CONNECT WITH US</strong></h4>
          <div>
            We are all socially active creatures. Let's connect and share our ideas. 
          </div>          
        </div> 
        <div class="network-list">           
          <div><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></div>
          <div><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></div>
          <div><a href="#"><i class="fa fa-youtube-square"></i> Youtube</a></div>        
        </div>           
      </div>      
    </div> -->  

</div>

@stop