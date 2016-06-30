
	@if(isset($q))
		{!! Form::model($q, ['files' => true, 'method' => 'PUT', 'route' => ['admin.divisi.update', $q->id]]) !!}
	@else
		{!! Form::open(['route'=>'admin.divisi.store', 'class'=>'form-horizontal']) !!}
	@endif
		<p>
			<label>Nama Satuan Kerja / Divisi</label>
			{!! Form::text('nama',null, ['class'=>'form-control input-sm', 'placeholder'=>'Nama Satuan Kerja/DivisiController'],'required') !!}
			<span id="helpBlock" class="help-block"><em>Pastikan nama divisi/satuan kerja ingin ditambahkan sama dengan yang sudah terekam di sistem.</em></span>
		</p>
		<hr>
		<p>
			<button class="btn btn-info btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
		</p>
		
	{!! Form::close() !!}