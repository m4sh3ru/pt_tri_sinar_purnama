@extends('layouts.template')

@section('info')
	<div class="row">
		<div class="col-md-12">
			<p class="alert alert-info"><span class="fa fa-triangle-exclamation"></span> <strong>Perhatian!</strong> Menambahkan data pegawai akan otomatis meng-generate akun pegawai ybs. dengan asumsi username = <strong>nik</strong> dan password default = <strong>1234</strong></p>
		</div>
	</div>
@endsection

@section('content')

	@include($base_view.'form')
@endsection