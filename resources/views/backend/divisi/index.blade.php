@extends('layouts.template')

@section('content')
<div class="col-md-12">
	<a data-toggle="modal" href="#divisi" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambahan Divisi Baru</a>
	@include($base_view.'add')
	<hr>
</div>	

<div class="row">
	<div class="col-md-6">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="70">No</th>
					<th>Divisi/Satuan Kerja</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@if($query != NULL)
				@foreach($query as $rs)
				<tr>
					<td class="text-center">{!! $no !!}</td>
					<td>{!! $rs->nama !!}</td>
					<td class="text-center">
						<a href="{!! route('admin.divisi.edit', $rs->id ) !!}"><span class="fa fa-edit"></span></a>
					</td>
				</tr>
				<?php $no++; ?>
				@endforeach
			@else
				<tr>
					<td colspan="3" class="text-center"><em class="text-danger">Data Divisi/Satuan Kerja tidak ditemukan!</em></td>
				</tr>
			@endif
			</tbody>
		</table>
	</div>
</div>

@endsection