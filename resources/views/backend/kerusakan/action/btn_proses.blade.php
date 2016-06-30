@if($rs->progress == 1)
	{!! Form::open(['route'=>'doProses']) !!}
		<input type="hidden" name="id" value="{!! $rs->id !!}">
		<button type="submit" name="proses" class="btn btn-success btn-xs"> Proses <span class="fa fa-long-arrow-right"></span></button>
	{!! Form::close() !!}
@elseif($rs->progress == 2)
	<a href="{!! route('perbaikan') !!}" class="btn btn-danger btn-xs"><span class="fa fa-square-check-o"></span> Akhiri dan Laporkan  Perbaikan</button>
@else
	<button class="btn btn-xs btn-success" disabled>Perbaikan telah Selesai</button>
@endif