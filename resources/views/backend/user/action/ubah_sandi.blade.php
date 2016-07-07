@extends('layouts.template')

@section('info')
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p><span class="fa fa-exclamation-triangle"></span> <strong>Perhatian!</strong> Perubahan Kata sandi akan mulai berlaku setelah anda logout dari akun anda!</p>
			</div>
		</div>
	</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-6">
		{!! Form::model($q, ['files' => true, 'method' => 'PUT', 'route' => ['AuthUbahSandi']]) !!}
			<p>
				<label>Username</label>
				{!! Form::text('username',null, ['class'=>'form-control input-sm', 'placeholder'=>'Username or NIK', 'disabled'],'required') !!}
				<em class="text-danger">{!! $errors->first('username') !!}</em>
				<span id="helpBlock" class="help-block"><em>Pastikan username sesuai dengan nomor induk karyawan (NIK).</em></span>
			</p>
			<p>
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control input-sm" placeholder="******" required>
				<em class="text-danger">{!! $errors->first('password') !!}</em>
				<span id="helpBlock" class="help-block"><em>Panjang Password minimal 5 karakter.</em></span>
			</p>
			<p>
				<label>Re-Type Password</label>
				<input type="password" name="password2" id="password2" onclick="check(this);" class="form-control input-sm" placeholder="******" required>
			</p>
			<hr>
			<p>
				<button class="btn btn-info btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
			</p>
			
		{!! Form::close() !!}
	</div>
</div>

<script>
  function check(input) {
	if (input.value != document.getElementById('password').value) {
		input.setCustomValidity('Password Tidak Sama.');
	} else {
		input.setCustomValidity('');
   }
}
</script>

@endsection