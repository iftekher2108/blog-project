<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    @vite([
     'public/assets/src/theme/vendor/css/core.css',
     'public/assets/src/theme/vendor/css/theme-default.css',
     'public/assets/src/js/main.js',
     ])

</head>
<body>
    <div id="app">

    <div class="container">
        <div class="row justify-content-center justify-content-center p-5">
            <div class="col-lg-6  col-md-8 col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="" class="app-brand-link flex-column p-1 gap-2">
                                <span class="app-brand-logo demo">
                                        logo here
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Company Name</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                    </div>
                    <div class="card-body">


                        <form action="{{ route('login') }}" id="formAuthentication" method="POST" class="mb-3">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" value="{{ old('email') }}" name="email" placeholder="Email" autofocus
                                    autocomplete="email" required />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                {{-- <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label" >Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="remember" type="checkbox"
                                        {{ old('remember') ? 'checked' : '' }} id="remember" />
                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }} </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-primary m-auto w-75" type="submit">{{ __('Login') }}</button>
                            </div>
{{--
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}

                        </form>

                        {{-- <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p> --}}
                    </div>
                </div>



            </div>
        </div>
    </div>


</div>


{{-- js liberies --}}

@yield('script')

</body>
</html>


