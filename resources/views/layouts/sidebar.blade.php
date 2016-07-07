<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
		<li><a href="{!! route('dashboard') !!}"><span class="fa fa-dashboard"></span> Dashboard</a></li>
		<li class="divider"></li>
		@if(Auth::user()->level_user == 2 || Auth::user()->level_user == 1 )
			<li @if(isset($pegawai_)) {!! $pegawai_ !!} @endif><a href="{!! route('admin.pegawai.index') !!}"><span class="fa fa-th-list"></span> Karyawan</a></li>
			<li class="divider"></li>
		@endif
		@if(Auth::user()->level_user == 1 )
			<li @if(isset($div_)) {!! $div_ !!} @endif><a href="{!! route('admin.divisi.index') !!}"><span class="fa fa-dashboard"></span> Divisi</a></li>
			<li class="divider"></li>
		@endif
		<li class="parent">
			<a href="#">
				<span style="padding-right:100px" data-toggle="collapse" href="#sub-item-1">
					<i class="fa fa-building"></i> Laporan
					<i class="icon pull-right"><em class="fa fa-plus"></em></i>
				</span>
			</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a href="{!! route('admin.laporan.kerusakan.index') !!}">
							<span class="fa fa-bullhorn"></span> Kerusakan
						</a>
					</li>
					@if(Auth::user()->level_user != 3 )
					<li>
						<a href="{!! route('perbaikan') !!}">
							<span class="fa fa-check-square-o"></span> Perbaikan
						</a>
					</li>
					@endif
				</ul>
		</li>
		<li class="divider"></li>
		@if(Auth::user()->level_user == 1 )
			<li @if(isset($user_)) {!!$user_!!} @endif><a href="{!!route('admin.user.index')!!}"><span class="fa fa-users"></span> User Registered</a></li>
		@endif

	</ul>
</div><!--/.sidebar-->