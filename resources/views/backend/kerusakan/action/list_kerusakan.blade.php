@extends('layouts.template')
@inject('karyawan','App\Models\Karyawan')

@section('info')
	<div class="panel panel-default">
		<div class="panel-body">
		{!! Form::open(['route'=>'admin.laporan.kerusakan.index', 'class'=>'form-horizontal', 'method'=>'get'])!!}
			<div class="col-md-10">	
				<div class="input-group">
				  	<input type="text" name="start_date" id="datepicker" class="form-control input-sm" placeholder="0000-00-00" aria-describedby="basic-addon2">
				  	<span class="input-group-addon input-sm" id="basic-addon2">-</span>
				  	<input type="text" name="end_date" id="datepicker2" class="form-control input-sm" placeholder="0000-00-00" aria-describedby="basic-addon2">
			
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn-info btn-sm"><span class="fa fa-search"></span> Filter</button>
			</div>
		{!! Form::close() !!}
		</div>

	</div>
@endsection

@section('content')
<div class="row">
	@if(Auth::user()->level_user == 3)
	<div style="margin-bottom:15px;">
		<div class="btn-group">
			<a data-toggle="modal" href="{!! route('admin.laporan.kerusakan.create') !!}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Buat Laporan Kerusakan</a>
		</div>
	</div>
	@endif
	<table data-toggle="table" class="table table-bordered table-hover">
		<thead>
		<tr>
			<th class="text-center">No.</th>
			<th>Divisi</th>
			<th>Jenis Perangkat</th>
			<th class="text-center">Keterangan</th>
			<th>dibuat oleh</th>
			<th class="text-center">Progress</th>
			<th>Waktu Pelaporan</th>
			@if(Auth::user()->level_user == 1)
				<th class="text-center">Action</th>
			@endif
		</tr>
		</thead>
		<tbody>
			@foreach($q as $rs)
			<tr @if($rs->progress == 1) {!! 'class=danger' !!} @elseif($rs->progress == 2){!! 'class=info' !!} @endif>
				<td>{!! $no !!}</td>
				<td>{!! ucwords($rs->divisi->nama) !!}</td>
				<td>{!! ucwords($rs->perangkat) !!}</td>
				<td>{!! $rs->keterangan !!}</td>
				<td>
					<?php $query = $karyawan->whereNik($rs->user->username)->first(); ?>
					@if(!is_null($query))
						{!! $query->nama_lengkap !!}</td>
					@endif
				</td>
				<td>
					@if($rs->progress == 1)
						<em class="text-danger">
					@elseif($rs->progress == 2)
						<em class="text-info">
					@else
						<em class="text-success">
					@endif
					{!! $rs->level_progress->progress !!}
					</em>
				</td>
				<td>{!! $rs->created_at !!}</td>
				@if(Auth::user()->level_user == 1)
					<td> @include($base_view.'action.btn_proses') </td>
				@endif
			</tr>
			<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
	<div class="pull-right">{!! $q->links() !!}</div>
</div>
@endsection
