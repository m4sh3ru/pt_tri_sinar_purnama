<div class="row">
	<div class="col-md-6">

	@if(isset($q))
		{!! Form::model($q, ['files' => true, 'method' => 'PUT', 'route' => ['admin.laporan.kerusakan.update', $q->id],'class'=>'form-horizontal']) !!}
	@else
		{!! Form::open(['route'=>'admin.laporan.kerusakan.store', 'files'=>true, 'class'=>'form-horizontal']) !!}
	@endif
		<p>
			<label>Jenis Perangkat IT</label>
			{!! Form::text('perangkat',null,['class'=>'form-control input-sm', 'placeholder'=>'Perangkat IT'], 'required')!!}
			<span id="helpBlock" class="help-block"><em>Gunakan tanda koma(,) sebagai pemisah jika perangkat lebih dari satu.</em></span>
			<em class="text-danger">{!! $errors->first('perangkat') !!}</em>
		</p>
		<p>
			<label>Divisi</label>
			<div class="row">
				<div class="col-md-7">
					<select class="form-control input-sm" name="divisi_id" required>
						<option value="">Pilih Divisi</option>
						@foreach($divisi as $d)
						<option value="{!! $d->id !!}">{!! $d->nama !!}</option>
						@endforeach
					</select>
				</div>
			</div>
			<em class="text-danger">{!! $errors->first('divisi_id') !!}</em>
		</p>
		<p>
			<label>Keterangan</label>
			{!! Form::textarea('keterangan', null,['class'=>'form-control input-sm', 'placeholder'=>'Penjelasan tentang kerusakan', 'rows'=>4]) !!}
			<em class="text-danger">{!! $errors->first('keterangan') !!}</em>
		</p>
		<p>
			<label>Screenshot</label>
			{!! Form::file('image') !!}
			<em class="text-danger">{!! $errors->first('image') !!}</em>
		</p>
		<br>
		<p>
			<button class="btn btn-info btn-sm" type="submit"><span class="fa fa-save"></span> Laporkan Permasalahan</button>
		</p>
		
	{!! Form::close() !!}
	</div>
</div>