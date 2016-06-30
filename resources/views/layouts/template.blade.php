<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PT. XYZ | IT Support Administration</title>
		<meta name="description" content="Test PT. Gajah Tunggal">
		<meta name="author" content="Heru Setyiawan">
		<link href="{!! asset('css/style.css') !!}" rel="stylesheet">
		<script src="{!! asset('js/jquery-2.1.4.min.js') !!}"></script>

	</head>

	<body class="animated fadeIn">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><span>PT. XYZ</span> | IT Support Administrator</a>
					@if(Auth::check())
					<ul class="user-menu">
						<li class="pull-right"><a href="{!! route('logout') !!}">Logout <span class="fa fa-sign-out"></span></a></li>
						<li class="dropdown pull-right">
							<ul class="dropdown-menu" role="menu">
								<li><a href=""><span class="glyphicon glyphicon-user"></span> Profile</a></li>
								<li class="divider"></li>
								<li><a href="">Logout <span class="fa fa-sign-out"></span></a></li>
							</ul>
						</li>

					</ul>
					@endif
				</div>
								
			</div><!-- /.container-fluid -->
		</nav>
			
		@include('layouts.sidebar')
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
			<div class="row">
				<ol class="breadcrumb">
					<li><a href=""><span class="fa fa-home fa-lg"></span></a></li>
					<li class="active">@if(isset($attr)) {!!$attr!!} @endif</li>
				</ol>
			</div><!--/.row-->
			<h3><span class="fa fa-indent"></span> @if(isset($attr)) {!!$attr!!} @endif</h3>
			<hr>
			<div class="row">
				@if(session()->has('notif'))
					<div class="col-md-12">
						<div id="notif">
							{!! session()->get('notif') !!}
						</div>
					</div>
				@endif
			</div>
			<div class="row">
				<div class="col-md-12">
				@yield('info')
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-md-12">
								@yield('content')
								
								<footer>
									<hr>
									<p class="pull-right"><a href="#">Back to top</a></p>
									<p>&copy; 2016 | &middot; Created By: <a href="#">Heru Setyiawan</a></p>
								</footer>
										
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>	<!--/.main-->
			  
		<script src="{!! asset('js/bootstrap.js') !!}"></script>
		<script src="{!! asset('js/bootstrap-table.js') !!}"></script>
		<script src="{!! asset('js/bootstrap-datepicker.js') !!}"></script>
		<script src="{!! asset('js/custom.js') !!}"></script>
	</body>

</html>
