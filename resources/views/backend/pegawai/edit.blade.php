@extends('layouts.template')

@section('info')
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p><span class="fa fa-exclamation-triangle"></span> <strong>Perhatian!</strong> Pastikan Perubahan data Pegawai yang anda lakukan benar-benar sesuai !</p>
			</div>
		</div>
	</div>
@endsection

@section('content')

	@include($base_view.'form')
	
@endsection