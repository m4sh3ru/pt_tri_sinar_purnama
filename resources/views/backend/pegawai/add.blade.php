@extends('layouts.template')

@section('info')
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p>Pastikan Data Pegawai yang dimasukkan benar-benar sesuai dan dapat dipertangungjawabkan!</p>
			</div>
		</div>
	</div>
@endsection

@section('content')

	@include($base_view.'form')
@endsection