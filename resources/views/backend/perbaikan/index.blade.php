@extends('layouts.template')

@section('info')
@inject('karyawan','App\Models\Karyawan')

	<div class="panel panel-default">
		<div class="panel-body">
			{!! Form::open(['route'=>'perbaikan', 'class'=>'form-horizontal', 'method'=>'get'])!!}
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
	<table data-toggle="table" class="table table-bordered table-hover">
		<thead>
		<tr>
			<th class="text-center">No.</th>
			<th>Nomor Permasalahan</th>
			<th>Penyelesainan</th>
			<th>Waktu Mulai</th>
			<th>Waktu Selesai</th>
			<th>IT Support</th>
			@if(Auth::user()->level_user == 1)
			<th class="text-center">Action</th>
			@endif
		</tr>
		</thead>
		<tbody>
			@foreach($q as $rs)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $rs->kerusakan_id !!}</td>
				<td>{!! $rs->keterangan !!}</td>
				<td>{!! $rs->created_at !!}</td>
				<td>{!! $rs->selesai !!}</td>
				<td>
				<?php $query = $karyawan->whereNik($rs->user->username)->first(); ?>
				@if(!is_null($query))
					{!! $query->nama_lengkap !!}</td>
				@endif

				@if(Auth::user()->level_user == 1)
					<td>
						@if($rs->kerusakan->progress != 3)
							<a href="{!! route('add_report_perbaikan',$rs->id) !!}" class="btn btn-xs btn-danger"><span class="fa fa-check-square-o"></span> Akhiri dan Laporkan Perbaikan</a>
						@else
							<button class="btn btn-xs btn-success" disabled>Perbaikan telah Selesai</button>
						@endif
					</td>
				@endif
			</tr>
			<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
	<div class="pull-right">{!! $q->links() !!}</div>
</div>
@endsection

