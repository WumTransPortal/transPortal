@extends('layouts.master')

@section('content')
	<h3 style="color: #34a26a;">Tutorials: Everybody benefits from your participation</h3>
  <p> Here you will find some useful tutorials to guide you:
   <div id="tutorial-sorter">
    <div class="btn-group" style="display: inline">
      <button type="button" class="btn btn-default active">All</button>
      <button type="button" class="btn btn-default">Most popular</button>
      <button type="button" class="btn btn-default">Most recent</button>
    </div> 
    <div>
    <form class="navbar-form" role="search" style="display: inline;">
        <div class="form-group" >
           <input type="text" class="form-control" placeholder="Search" style="border-radius: 0; height: 32px;">
        </div>
          <button type="submit" class="btn btn-default">Submit</button>
    </form> 
    </div>       
  </div>

  <div class="tutorial-showcase">
    <div class="showcase-wrapper">
      <ul>
        <li id="tutorial-item"> 
          <ul class="caption">                
                <li style="color: #fff"><i class="fa fa-eye"></i> 23 </li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-comment"></i> 6 </a></li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-heart"></i> 20 </a></li>
              </ul>
          <a href="http://dk1.informatik.uni-bremen.de/uploads/files/Zing%20-%20English.pdf"><img src="/img/tutorial/LaserCutter.jpg"></a>
          <div style="position: relative">
            <h4>How to Use LaserCutter-Zing</h4>
            <p id="tutorial-byline">by <a href="#"> Supperman</a> , published <em>10 Oct 2013</em></p>  
            <p>Laser Cutter: Laser cutting is a technology that uses a laser to cut materials. It works by directing the output of a high-power laser, by computer, at the.....</p></div>
        </li>
        <li id="tutorial-item"> 
          <ul class="caption">                
                <li style="color: #fff"><i class="fa fa-eye"></i> 23 </li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-comment"></i> 6 </a></li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-heart"></i> 20 </a></li>
              </ul>
          <a href="http://dk1.informatik.uni-bremen.de/uploads/files/Ultimaker.pdf"><img src="/img/tutorial/3dPrinter.jpg"></a>
          <div style="position: relative">
            <h4>How to Use 3D Printer-Ultimaker</h4>
            <p id="tutorial-byline">by <a href="#"> Supperman</a> , published <em>10 Oct 2013</em></p>  
            <p>3D printing is a process of making a three-dimensional solid object of virtually any shape from a digital model. 3D printing is achieved using an additive......</p></div>
        </li>
        <li id="tutorial-item"> 
          <ul class="caption">                
                <li style="color: #fff"><i class="fa fa-eye"></i> 23 </li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-comment"></i> 6 </a></li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-heart"></i> 20 </a></li>
              </ul>
          <a href="http://www.youtube.com/watch?v=gMcWKW8Ep70"><img src="/img/tutorial/VinylCutters.jpg"></a>
          <div style="position: relative">
            <h4>How to Use VinylCutters</h4>
            <p id="tutorial-byline">by <a href="#"> Supperman</a> , published <em>10 Oct 2013</em></p>  
            <p>A vinyl cutter is a type of computer controlled machine. Small vinyl cutters look like computer printers. The computer controls the movement of a sharp.......</p></div>
        </li>
        <li id="tutorial-item"> 
          <ul class="caption">                
                <li style="color: #fff"><i class="fa fa-eye"></i> 23 </li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-comment"></i> 6 </a></li>
                <li><a href="#" style="color: #fff;"><i class="fa fa-heart"></i> 20 </a></li>
              </ul>
          <a href="http://arduino.cc/en/Main/arduinoBoardUno#.Ux921_ldX5V"><img src="/img/tutorial/ArduinoBoard.jpg"></a>
          <div style="position: relative">
            <h4>How to Use Arduino Board Uno</h4>
            <p id="tutorial-byline">by <a href="#"> Supperman</a> , published <em>10 Oct 2013</em></p>  
            <p>The Arduino Uno is a microcontroller board based on the ATmega328 (datasheet). It has 14 digital input/output pins (of which 6 can be used as PWM outputs)......</p></div>
        </li>
        
      
      </ul>
    </div>
  </div>

  <div class="page_number" style="float: right; margin-right:60px"> 
    <ul class="pagination">
      <li><a href="#">&laquo;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul>
  </div>
  
	
@stop