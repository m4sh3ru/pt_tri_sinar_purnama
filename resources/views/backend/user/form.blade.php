
	@if(isset($q))
		{!! Form::model($q, ['files' => true, 'method' => 'PUT', 'route' => ['admin.user.update', $q->id]]) !!}
	@else
		{!! Form::open(['route'=>'admin.user.store', 'class'=>'form-horizontal']) !!}
	@endif
		<p>
			<label>Username</label>
			{!! Form::text('username','', ['class'=>'form-control input-sm', 'placeholder'=>'Username or NIK'],'required') !!}
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
			<input type="password" name="password2" id="password2" onclick="check(this);" class="form-control input-sm" placeholder="*****" required>
		</p>
		<p>
			<label>Level</label>
			{!! Form::select('level_user',[''=>"Level Pengguna", 1=>'Administrator', 2 => "Manager IT"], '', ['class'=>'form-control input-sm'], 'required') !!}
		</p>
		<hr>
		<p>
			<button class="btn btn-info btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
		</p>
		
	{!! Form::close() !!}

<script>
  function check(input) {
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('Password Tidak Sama.');
    } else {
        input.setCustomValidity('');
   }
}
</script>