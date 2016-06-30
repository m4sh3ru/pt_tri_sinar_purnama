@extends('layouts.template')

@section('info')
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p></p>
			</div>
		</div>
	</div>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-6">
			{!! Form::model($q, ['files' => true, 'method' => 'PUT', 'route' => ['auth_report_perbaikan', $q->id],'class'=>'form-horizontal']) !!}
				<p>
					<label>Nomor Induk Karyawan</label>
					{!! Form::text('kerusakan_id', null,['class'=>'form-control input-sm', 'placeholder'=>'NIK','readonly'], 'required')!!}
					<em class="text-danger">{!! $errors->first('kerusakan_id') !!}</em>
				</p>
				<p>
					<label>Alamat</label>
					{!! Form::textarea('keterangan', null,['class'=>'form-control input-sm', 'placeholder'=>'Penyelesaian', 'rows'=>4])!!}		
					<em class="text-danger">{!! $errors->first('alamat') !!}</em>
				</p>
				<p>
					<button class="btn btn-info btn-sm" type="submit"><span class="fa fa-save"></span> Laporkan Perbaikan</button>
				</p>
				
			{!! Form::close() !!}
		</div>
	</div>
@endsection