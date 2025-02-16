<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Perpustkaan Manajemen">
	<meta name="author" content="SDN 173450">
	<meta name="keywords" content="Perpustkaan SDN 173450">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://perpustakaan-sdn-173450.com" />

	<title>Perpustakaan SDN 173850</title>

	<link href="{{ asset('dashboard/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		@if (auth()->user()->user_level == 'Admin')
			@include('components.admin_sidebar')
		@else
			@include('components.user_sidebar')
		@endif

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
								</div>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                               <span class="text-dark">{{ auth()->user()->name }}</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="dropdown-item">Logout</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
										@csrf
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				@yield('content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="{{ route('admin./') }}" target="_blank"><strong>Manajemen Perpustakaan 173450</strong></a></a> &copy; 2025
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="{{ route('admin./') }}" target="_blank">Master Admin Support</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{ asset('dashboard/js/app.js') }}"></script>
    @yield('footer-scripts')

</body>

</html>