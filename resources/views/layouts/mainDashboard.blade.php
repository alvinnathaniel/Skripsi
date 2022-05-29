<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laksana Global Teknik</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('vendors/core/core.css') }}">
	<!-- CSS only -->
	<!-- endinject -->
	<!-- plugin css for this page -->
	@stack('head-script')
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('fonts/feather-font/css/iconfont.css') }}">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="{{ asset('css/demo_1/style.css') }}">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="{{ asset('images/logo_new.png') }}" />
</head>

<body>
	<div class="main-wrapper">
		<nav class="sidebar">
			<div class="sidebar-header">
				<a href="#" class="sidebar-brand">
					LG<span>T</span>
				</a>
				<div class="sidebar-toggler not-active">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="sidebar-body">
				<ul class="nav">
					<li class="nav-item nav-category">Main</li>
					<li class="nav-item">
						<a href="/dashboard" class="nav-link">
							<i class="link-icon" data-feather="box"></i>
							<span class="link-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item nav-category">Pesanan</li>
					<li class="nav-item">
						<a href="/pelanggan" class="nav-link">
							<i class="link-icon" data-feather="user"></i>
							<span class="link-title">Pelanggan</span>
						</a>
					</li>
					<li class="nav-item nav-category">Produk</li>
					<li class="nav-item">
						<a href="/kategori" class="nav-link">
							<i class="link-icon" data-feather="grid"></i>
							<span class="link-title">Kategori Produk</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="/produk" class="nav-link">
							<i class="link-icon" data-feather="list"></i>
							<span class="link-title">Daftar Produk</span>
						</a>
					</li>
					<li class="nav-item nav-category">Pegawai</li>
					<li class="nav-item">
						<a href="/pegawai" class="nav-link">
							<i class="link-icon" data-feather="users"></i>
							<span class="link-title">Daftar Pegawai</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">
						<li class="nav-item dropdown nav-notifications">
							<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell"></i>
								<div class="indicator">
									<div class="circle"></div>
								</div>
							</a>
							<div class="dropdown-menu" aria-labelledby="notificationDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">6 New Notifications</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
								<div class="dropdown-body">
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="user-plus"></i>
										</div>
										<div class="content">
											<p>New customer registered</p>
											<p class="sub-text text-muted">2 sec ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="gift"></i>
										</div>
										<div class="content">
											<p>New Order Recieved</p>
											<p class="sub-text text-muted">30 min ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="alert-circle"></i>
										</div>
										<div class="content">
											<p>Server Limit Reached!</p>
											<p class="sub-text text-muted">1 hrs ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="layers"></i>
										</div>
										<div class="content">
											<p>Apps are ready for update</p>
											<p class="sub-text text-muted">5 hrs ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="download"></i>
										</div>
										<div class="content">
											<p>Download completed</p>
											<p class="sub-text text-muted">6 hrs ago</p>
										</div>
									</a>
								</div>
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div>
									{{ Auth::user()->name }}
									<i class="link-arrow" data-feather="chevron-down"></i>
								</div>
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="javascript:;" class="nav-link">
												<i data-feather="edit"></i>
												<span>Ubah Profile</span>
											</a>
										</li>
										<li class="nav-item">
											<form method="POST" action="{{ route('logout') }}">
												@csrf
												<a href="route('logout')" class="nav-link" onclick="event.preventDefault();
                            this.closest('form').submit();">
													<i data-feather="log-out"></i>
													{{ __('Keluar') }}
												</a>
											</form>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			@yield('container')
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('vendors/core/core.js') }}"></script>
	<!-- JavaScript Bundle with Popper -->
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="{{ asset('vendors/jquery.flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
	@stack('plugin-js')
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('js/template.js') }}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	@stack('custom-js')
	@include('sweetalert::alert')
	<!-- end custom js for this page -->
</body>

</html>