<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laksana Global Teknik Admin</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('vendors/core/core.css') }}">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('css/demo_1/style.css') }}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('images/LOGO_NEW.png') }}" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">
				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                                <!-- background -->
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper" style="background-image: url('images/login.jpg');">
                                    </div>
                                </div>
                                <!-- halaman login -->
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">Laksana Global<span> Teknik</span></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Selamat Datang! Silahkan Masuk ke Akun Anda</h5>
                                        
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <!-- Email Address -->
                                            <div>
                                                <x-label for="email" :value="__('Email')" />
                                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>
                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label for="password" :value="__('Password')" />
                                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="form-check form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                                </label>
                                            </div>
                                            <!-- <div class="form-check form-check-flat form-check-primary">
                                                <label for="remember_me" class="form-check-label">
                                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div> -->

                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif

                                                <x-button class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">
                                                    {{ __('Log in') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- core:js -->
	<script src="{{ asset ('/vendors/core/core.js') }}"></script>
	<!-- endinject -->
	<!-- inject:js -->
	<script src="{{ asset ('/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset ('/js/template.js') }}"></script>
	<!-- endinject -->
</body>
</html>
