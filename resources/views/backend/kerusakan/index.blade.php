@if($qr < 1 && Auth::user()->level_user == 3)
	@include($base_view.'action.first_view')
@else
	@include($base_view.'action.list_kerusakan')
@endif