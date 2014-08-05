	
<li {{( preg_match("/^home/i", Request::path()) ) ? 'class="active"' : ''}}><a href="/home" title="Welcome" style="color: white;">Home</a></li>

<li {{( preg_match("/^tutorials/i", Request::path()) ) ? 'class="active"' : ''}}><a href="/tutorials" title="Tutorials" style="color: white;">Tutorials</a></li>

    @if ( Sentry::check() ) 
<li {{( preg_match("/^inventory/i", Request::path()) ) ? 'class="active"' : ''}}><a href="/inventory" style="color: white;">Inventory</a></li>
@endif
	                    
<li {{( preg_match("/^projects/i", Request::path()) ) ? 'class="active"' : ''}}><a href="/projects" style="color: white;">Projects</a></li>

@if (Sentry::check()) 
<li class="dropdown pull-right {{( preg_match("/^profile/i", Request::path()) ) ? 'active' : ''}}" id="dropdown-menu" style="border-left: solid 1px #ccc; padding-left: 5px; margin-left: 3px;color: white;">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#dropdown-menu">{{ucfirst(Sentry::getUser()->username)}}<b class="caret"></b></a>
	<ul class="dropdown-menu" style="margin: 0px">
		<li><a href="/profile/show/{{Sentry::getUser()->username}}" title="Profile">Profile</a></li>
		@if (Sentry::getUser()->hasAccess('is_admin'))
		<li class="divider"></li>
		<li><a href="/admin" title="Logout">Admin</a></li>
		@endif
		<li><a href="/account/logout" title="Log out">Log out</a></li>
	</ul>
</li>

@else

<li class="dropdown pull-right" id="dropdown-menu">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#dropdown-menu">Login<b class="caret"></b></a>
	<div class="dropdown-menu">
		<form style="margin: 0px" accept-charset="UTF-8" action="/account/login" method="post">
			<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
			<fieldset class='textbox' style="padding:10px">
				<input style="margin-top: 8px" type="text" placeholder="Username" name="username"/>
				<input style="margin-top: 8px" type="password" placeholder="Passsword" name="password"/>
				<input class="btn btn-primary btn-block" name="commit" type="submit" value="Log In"/>
			</fieldset>
		</form>
	</div>
</li>

@endif
