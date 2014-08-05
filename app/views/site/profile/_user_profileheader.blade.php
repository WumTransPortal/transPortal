<div class="profile_header">
	<div class="row">
		<div class= "brief_profile">
			@if (Sentry::Check() && Sentry::getUser()->username == $user->username)
				<a href="/profile/setting"> <img src="/profile-pics/{{$user->profile_pic}}" height="89px" width="89px" class="img-responsive img-thumbnail" alt="Responsive image" ></a>
			@else
				<a href=#><img src="/profile-pics/{{$user->profile_pic}}" height="89px" width="89px" class="img-responsive img-thumbnail" alt="Responsive image" ></a>
			@endif
		</div>
		<div class="bio">

			<h5><strong>{{ strtoupper($user->username)}}</strong></h5>
	  		<small>{{$user->description}}</small><br>
	  		<small>{{$user->zipcode}} {{$user->city}}</small>
	  	</div>
		<div class="basic_info">
            <!--
		 	<div class="stats-group">
  			    <div class="left-caret" style="margin-top: 20px; "></div>
                <div  class="basic_info_group"><a href="#" style="color: #707070;">26<br>Projects</a></div>
                <div  class="basic_info_group"><a href="#" style="color: #707070;">17<br>Collections</a></div>
                <div  class="basic_info_group"><a href="#" style="color: #707070;">30<br>Followings</a></div>
                <div  class="basic_info_group"><a href="#" style="color: #707070;">21<br>Followers</a></div>
            </div>-->
		</div>
	</div>
</div>
