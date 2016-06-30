@extends('layouts.template')

@section('content')
	<div class="col-md-12" style="padding-right: 0px;">	
		<a data-toggle="modal" href="#user" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> Tambahan Pengguna Baru</a>
		@include($base_view.'add')
	</div>
	{!! Form::open(['route'=>'doAction']) !!}
	<div class="col-md-4" style="position:absolute;margin-top:45px;padding-left: 0;">
		@include($base_view.'action.do_action')
	</div>
		<table data-toggle="table" class="table table-bordered table-hover" data-url=""  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<tr>
					<th width="70">No</th>
					<th>Username</th>
					<th>Level</th>
					<th>Waktu Registrasi</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($query as $rs)
				<tr class="@if($rs->is_aktif == 0) {!! 'well' !!} @endif">
					<td class="text-center">
						<input type="checkbox" name="id[]" value="{!! $rs->id !!}">
					</td>
					<td>{!! ucwords($rs->username) !!}</td>
					<td class="text-center">
						@if($rs->level_user == 1)
							{!! 'Administrator' !!}
						@elseif($rs->level_user == 2)
							{!! 'Manager IT' !!}
						@else
							{!! 'Staf' !!}
						@endif
					</td>
					<td>{!! $rs->created_at !!}</td>
					<td class="text-center">
						@if($rs->is_aktif == 0)
							<p class="label label-danger">Non Aktif</p>
						@else
							<p class="label label-success">Aktif</p>
						@endif
					</td>
				</tr>
				<?php $no++; ?>
				@endforeach
			</tbody>
		</table>
	{!! Form::close() !!}
	</div>
		

@endsection