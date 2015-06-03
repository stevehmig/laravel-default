<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TITLE</title>
    <link href="{!! asset('bower_components/bootswatch/sandstone/bootstrap.min.css') !!}" rel="stylesheet">
    @yield('scripts')
    @yield('scripts_top')
    @yield('styles')
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!! URL::to('home') !!}">TITLE</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
          @if(!Auth::guest())
            @if(Auth::user()->isAnAdmin())
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="adminMenu">Admin <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="themes">
                  <li><a href="{!! url('users') !!}"><i class="glyphicon glyphicon-user"></i> Users</a></li>
                  <li class="divider"></li>
                  <li><a href="{!! URL::to('roles') !!}"><i class="glyphicon glyphicon-user"></i> Roles</a></li>
                  <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-home"></i>Page A</a></li>
                </ul>
              </li>
            @endif
          @endif
          @if(!Auth::guest())
            @if(Auth::user()->isAConsultant())
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="surveyMenu">ConsultantMenu <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="themes">
                  <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-tower"></i> Menu1a</a></li>
                  <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-tower"></i> Menu1b</a></li>
                  <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-tower"></i> Menu1c</a></li>
                  <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-th-list"></i> Menu1d</a></li>
                </ul>
              </li>
            @endif
          @endif
          @if(!Auth::guest())
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="surveyMenu">Menu2 <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-tower"></i> Menu2a</a></li>
                <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-tower"></i> Menu2b</a></li>
                <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-tower"></i> Menu2c</a></li>
                <li><a href="{!! URL::to('') !!}"><i class="glyphicon glyphicon-th-list"></i> Menu2d</a></li>
              </ul>
            </li>
          @endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{!! url('/auth/login') !!}">Login</a></li>
						<li><a href="{!! url('/auth/register') !!}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{!! Auth::user()->name !!} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{!! url('/auth/logout') !!}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')
  @yield('modals')
	<!-- Scripts -->

  <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
  <script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
  @yield('scripts_end')
</body>
</html>
