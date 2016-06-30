<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PT. XYZ | IT SUPPORT</title>
		<meta name="description" content="Test PT. Gajah Tunggal">
		<meta name="author" content="Heru Setyiawan">
		<link href="{!! asset('css/style.css') !!}" rel="stylesheet">
		<script src="{!! asset('js/jquery-2.1.4.min.js') !!}"></script>
		<style type="text/css">
			.flat-input{
			    height: 40px !important;
			    border-radius: 0px !important;
			}
		</style>
	</head>

	<body class="animated fadeIn">

		<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-offset-4" style="margin-top:60px;">
					<div class="alert alert-info">
						<p><span class="fa fa-exclamation-triangle"></span> Pastikan anda memiliki akun untuk mengakses halaman <strong>Administrator</strong>.</p>
					</div>
					<div class="row">
						@if(session()->has('notif'))
							<div class="col-md-12" style="height:50px;">
								<div id="notif">
									{!! session()->get('notif') !!}
								</div>
							</div>
						@endif
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							{!!Form::open(['route'=>'auth_login'])!!}
								<p>
									<span>	Username :</span><br>
									<input type="text" name="username" class="form-control flat-input" placeholder="Username " required>
								</p>
								<p>
									<span>	Password :</span><br>
									<input type="password" name="password" class="form-control flat-input" placeholder="Password " required>
								</p>
								<p>	
									<input type="checkbox" name="remember"> Ingat Saya
								</p>
								<p>
									<button type="submit" name="login" class="btn btn-login btn-primary btn-sm"><span class="fa fa-sign-in"></span> Login</button>
								</p>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>