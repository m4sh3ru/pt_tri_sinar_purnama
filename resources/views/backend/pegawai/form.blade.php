<div class="row">
	<div class="col-md-6">

	@if(isset($q))
		{!! Form::model($q, ['files' => true, 'method' => 'PUT', 'route' => ['admin.pegawai.update', $q->id],'class'=>'form-horizontal']) !!}
	@else
		{!! Form::open(['route'=>'admin.pegawai.store', 'class'=>'form-horizontal']) !!}
	@endif
		<p>
			<label>Nomor Induk Karyawan</label>
			{!! Form::text('nik', null,['class'=>'form-control input-sm', 'placeholder'=>'NIK'], 'required')!!}
			<em class="text-danger">{!! $errors->first('nik') !!}</em>
		</p>
		<p>
			<label>Nama Lengkap</label>
			{!! Form::text('nama_lengkap', null,['class'=>'form-control input-sm', 'placeholder'=>'Nama Lengkap'], 'required')!!}
			<em class="text-danger">{!! $errors->first('nama_lengkap') !!}</em>
		</p>
		<p>
			<label>Tempat Lahir</label>
			{!! Form::text('tempat_lahir', null,['class'=>'form-control input-sm', 'placeholder'=>'Kota Kelahiran'], 'required')!!}
			<em class="text-danger">{!! $errors->first('tempat_lahir') !!}</em>
		</p>
		<p>
			<label>Tanggal Lahir</label>
			{!! Form::text('tanggal_lahir', null,['class'=>'form-control input-sm', 'placeholder'=>'0000-00-00', 'id'=>'datepicker'], 'required')!!}
			<em class="text-danger">{!! $errors->first('tanggal_lahir') !!}</em>
		</p>
		<p>
			<label>HP</label>
			{!! Form::text('hp', null,['class'=>'form-control input-sm', 'placeholder'=>'08xxxxx'], 'required')!!}
			<em class="text-danger">{!! $errors->first('hp') !!}</em>
		</p>
		<p>
			<label>Divisi</label>
			<select class="form-control input-sm" name="divisi_id">
				<option value="">Pilih Divisi :</option>
				@foreach($div as $r)
				<option value="{!! $r->id !!}"@if(isset($q)) @if($r->id == $q->divisi_id) {!! 'selected' !!} @endif @endif>{!! ucwords($r->nama) !!}</option>
				@endforeach
			</select>
		</p>
		<p>
			<label>Alamat</label>
			{!! Form::textarea('alamat', null,['class'=>'form-control input-sm', 'placeholder'=>'. . .', 'rows'=>4])!!}		
			<em class="text-danger">{!! $errors->first('alamat') !!}</em>
		</p>
		<p>
			<button class="btn btn-info btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
		</p>
		
	{!! Form::close() !!}
	</div>
</div>