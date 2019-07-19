<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>@yield('judul') - BMT At-Taqwa</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" />

		<link rel="stylesheet" href="{{asset('public/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

		<!-- page specific plugin styles -->
		@yield('spesifikasi')

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset('public/assets/css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset('public/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{asset('public/assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{asset('public/assets/css/ace-rtl.min.css')}}" />


		


		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{asset('public/assets/js/ace-extra.min.js')}}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							&nbsp;BMT AT-TAQWA
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
					 @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" width="36" height="36" src="
								@if(Auth::user()->foto != null)
					{{asset('public/storage/'.Auth::user()->foto)}}

					@else
					{{asset('public/assets/images/avatars/profile-pic.jpg')}}
					@endif
								" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									 {{ Auth::user()->name }}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								

								<li>
									<form id="logout-form" class="text-center" action="{{ route('logout') }}" method="POST">
                                        @csrf
										<button class="btn btn-danger btn-sm"><i class="ace-icon fa fa-power-off"></i>
										Logout</button>
										
                                    </form>
									
								</li>
								
							</ul>

						</li>
						@endguest
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				

				<ul class="nav nav-list">
					<li class="{{Request::path() == "home" ? "active" : ""}}">
						<a href="{{route('home')}}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					@if(Auth::user()->roles=="MASTER")
					<li class="{{Request::path() == "users" ? "active" : ""}}">
						<a href="{{route('users.index')}}">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Data Users</span>
						</a>

						<b class="arrow"></b>
					</li>
					@endif

					<li class="{{Request::path() == "muzaki" ? "active" : ""}}">
						<a href="{{route('muzaki.index')}}">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Data Muzaki </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="{{Request::path() == "mustahik" ? "active" : ""}}">
						<a href="{{route('mustahik.index')}}">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Data Mustahik </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="{{Request::path() == "pembayaran" ? "active open" : ""}}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-money"></i>

							<span class="menu-text">
								Pembayaran Zakat

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="{{Request::get('filter') == "ALL"? "active" : ""}}">
								<a href="{{route('pembayaran.index',['filter'=>"ALL"])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Semua
								</a>

								<b class="arrow"></b>
							</li>


							<li class="{{Request::get('filter')=="FITRAH" ? "active" : ""}}">
								<a href="{{route('pembayaran.index',['filter'=>"FITRAH"])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Zakat Fitrah
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{Request::get('filter')=="MAL" ? "active" : ""}}">
								<a href="{{route('pembayaran.index',['filter'=>"MAL"])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Zakat Mal
								</a>

								<b class="arrow"></b>
							</li>	
						</ul>
					</li>


					<li class="{{Request::path() == "pembagian" ? "active" : ""}}">
						<a href="{{route('pembagian.index')}}">
							<i class="menu-icon fa fa-leaf"></i>
							<span class="menu-text">Pembagian Zakat</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="{{Request::path() == "laporan" ? "active" : ""}}">
						<a href="{{route('laporan')}}">
							<i class="menu-icon fa fa-print"></i>
							<span class="menu-text">Cetak Laporan</span>
						</a>

						<b class="arrow"></b>
					</li>

					@if(Auth::user()->roles=="MASTER")
					<li class="{{Request::path() == "tipemustahik" ? "active" : ""}}">
						<a href="{{route('tipemustahik.index')}}">
							<i class="menu-icon fa fa-table"></i>
							<span class="menu-text">Tipe Mustahik</span>
						</a>

						<b class="arrow"></b>
					</li>
					@endif
		

					@if(Auth::user()->roles=="MASTER")
					<li class="{{Request::path() == "trash" ? "active open" : ""}}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-trash-o"></i>

							<span class="menu-text">
								Trash

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="{{Request::get('filter') == "mustahik"? "active" : ""}}">
								<a href="{{route('trash',['filter'=>"mustahik"])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Trash Mustahik
								</a>

								<b class="arrow"></b>
							</li>


							<li class="{{Request::get('filter')=="muzaki" ? "active" : ""}}">
								<a href="{{route('trash',['filter'=>"muzaki"])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Trash Muzaki
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{Request::get('filter')=="pembagian" ? "active" : ""}}">
								<a href="{{route('trash',['filter'=>"pembagian"])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Trash Pembagian Zakat
								</a>

								<b class="arrow"></b>
							</li>	

							<li class="{{Request::get('filter')=="pembayaran" ? "active" : ""}}">
								<a href="{{route('trash',['filter'=>"pembayaran"])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Trash Pembayaran Zakat
								</a>

								<b class="arrow"></b>
							</li>	
						</ul>
					</li>
					@endif
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">

							<li class="{{Request::path()=="home" ? 'active' : ''}}">
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#" class="{{Request::path() == "home" ? "active" : ""}}">Home</a>
							</li>

							<li class="active">@yield('activepage')</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="row">
							<div class="page-header">
								<h1>
									@yield('pg-header')
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
										@yield('pg-text')
									</small>
								</h1>
							</div><!-- /.page-header -->
								@yield('content')
								<!-- PAGE CONTENT ENDS -->
							
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">BMT AT-TAQWA</span>
							Application &copy; Muhammad Jabir
						</span>

						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{asset('public/assets/js/jquery-2.1.4.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	
		<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>

		<!-- page specific plugin scripts -->
		

		<!-- ace scripts -->
		<script src="{{asset('public/assets/js/ace-elements.min.js')}}"></script>
		<script src="{{asset('public/assets/js/ace.min.js')}}"></script>

		@yield('script')
		<script type="text/javascript">
	
		$('[data-rel=tooltip]').tooltip();
		</script>
		<!-- inline scripts related to this page -->
	</body>
</html>
