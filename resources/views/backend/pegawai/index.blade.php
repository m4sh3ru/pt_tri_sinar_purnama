@extends('layouts.template')

@section('content')
	<div style="position:absolute;margin-top:15px;">
		<div class="btn-group">
			<a data-toggle="modal" href="{!! route('admin.pegawai.create') !!}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambahan Pegawai Baru</a>
		</div>
	</div>
	<table data-toggle="table" class="table table-bordered btn-hover" data-url=""  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
		<tr>
			<th class="text-center">No.</th>
			<th>NIK</th>
			<th>Nama Lengkap</th>
			<th class="text-center">Tempat lahir</th>
			<th>Tanggal Lahir</th>
			<th>HP</th>
			<th>Divisi</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
			@foreach($q as $rs)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $rs->nik !!}</td>
				<td>{!! strtoupper($rs->nama_lengkap) !!}</td>
				<td>{!! strtoupper($rs->tempat_lahir) !!}</td>
				<td>{!! Helper::format_tanggal($rs->tanggal_lahir) !!}</td>
				<td>{!! $rs->hp !!}</td>
				<td>{!! $rs->divisi->nama !!}</td>
				<td class="text-center">
					<a href="{!! route('admin.pegawai.edit', $rs->id) !!}"><span class="fa fa-edit"></span></a>
				</td>
			</tr>
			<?php $no++; ?>
			@endforeach
		</tbody>
	</table>

@endsection