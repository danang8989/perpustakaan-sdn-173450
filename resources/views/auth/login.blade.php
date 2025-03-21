<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Perpustkaan Manajemen">
	<meta name="author" content="SDN 173850">
	<meta name="keywords" content="Perpustkaan SDN 173850">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://perpustakaan-sdn-173850.com" />

	<title>Perpustakaan SDN 173850</title>

	<link href="{{ asset('dashboard/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Selamat Datang</h1>
							<p class="lead">
								Masukkan akun kamu
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{ route('login') }}" method="POST">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" name="email" type="email" value="{{ old('email') }}" name="email" placeholder="Masukkan email kamu" />
                                            @if($errors->has('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" name="password" type="password" value="{{ old('password') }}" name="password" placeholder="Masukkan password kamu" />
                                            @if($errors->has('password'))
                                                <div class="error">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>

										<div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Masuk</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							{{-- Belum punya akun? <a href="{{ route('register') }}">Daftar disini</a> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>