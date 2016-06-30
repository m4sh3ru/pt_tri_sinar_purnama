@extends('layouts.template')

@section('content')
<div class="text-center">
<p class="alert alert-info"><strong>Anda Tidak mempunyai laporan kerusakan.</strong> Apabila anda menemukan kerusakan pada perangkat IT anda laporkan kerusakan dengan cara mengklik tombol dibawah ini <span class="fa fa-hand-o-down fa-lg"></span> :</p>
<a href="{!! route('admin.laporan.kerusakan.create') !!}" class="btn btn-primary btn-lg"><span class="fa fa-pencil fa-lg"></span> Buat Laporan Kerusakan</a>
</div>
@endsection