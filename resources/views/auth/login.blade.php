<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    {{-- stylesheet --}}
    <link rel="stylesheet" href="{{ asset('back_assets/css/custom-boot.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('back_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/main.min.css') }}">


</head>

<body>
    <div id="app">

        <div class="container">
            <div class="row justify-content-center p-5">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <!-- Logo -->
                            <div class="app-brand d-flex justify-content-center">
                                <a href="" class="nav-link d-flex align-items-center flex-column p-1 gap-2">
                                    <span class="app-brand-logo demo">
                                        <img src="{{ asset( $store->where('data_name','info')->value('picture') ) }}" class="img-fluid" width="100" alt="">
                                    </span>
                                    <span class="app-brand-text demo fs-5 text-white-50 text-body fw-bolder">{{ $store->where('data_name','info')->value('title') }}</span>
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
                                        id="email" value="{{ old('email') }}" name="email" placeholder="Email"
                                        autofocus autocomplete="email" required />
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
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                required />
                                            <span class="input-group-text toggle-eye cursor-pointer">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </span>
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
                                    <button class="btn btn-primary m-auto w-75"
                                        type="submit">{{ __('Login') }}</button>
                                </div>

                                <div class="d-flex mb-3">
                                    <a href="{{ route('auth.google') }}" class="btn btn-danger fw-bold m-auto w-100"
                                        type="submit">google Logins</a>
                                </div>


                                {{--
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


    {{-- js liberies --}}
    <script src="{{ asset('back_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/main.js') }}"></script>

    <script>

        $('.toggle-eye').click(function() {
            $(this).children().toggleClass('fa-eye-slash')
            $(this).children().toggleClass( 'fa-eye');

           $(this).siblings('input#password').attr('type',$(this).siblings('input#password').attr('type') == 'password' ? 'text' : 'password')
        })

    </script>

</body>

</html>
