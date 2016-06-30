@extends('layouts.template')

@section('info')
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p><strong>Info!</strong> Diharapkan bila mengalami kerusakan pada perangkat IT, dilaporkan secepatnya agar cepat untuk di tangani!</p>
			</div>
		</div>
	</div>
@endsection

@section('content')

	@include($base_view.'form')
@endsection