<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- css file bundle --}}

    {{-- stylesheet --}}
    <link rel="stylesheet" href="{{ asset('back_assets/css/custom-boot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/plugins/DataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/main.min.css') }}">




</head>

<body>

    <div id="preloader"></div>

    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top p-0 bg-primary shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ $store->where('data_name','logo')->value('picture') }}" class="img-fluid" width="80" alt="">
                </a>

                <div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto text-white">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown border-none">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <img src="" class="img-fluid rounded-circle border me-1" height="40" width="40" alt=""> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu p-3 shadow-lg  dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ url('profile') }}" class="dropdown-item py-2 p-1"><i class="fa-solid me-1 fa-user-pen"></i> Profile Settings</a>
                                    <a class="dropdown-item py-2 p-1" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa-solid me-2 fa-arrow-right-from-bracket"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">


            <div class="container-fluid">
                <div class="row w-100">
                @auth
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <x-admin_panel />
                    </div>
                @endauth
                    <div class="col-lg-9 col-md-8 mx-auto col-sm-12">
                        <div class="card bg-accent">
                            <div class="card-body">
                                @if (Session::get('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('status') }}
                                    </div>
                                @endif

                                <div class="content-body">

                                @if ($mas = Session::get('success'))
                                    <div class="alert alert-success rounded-1 alert-dismissible fade show" role="alert">
                                        {{ $mas }}
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if ($mas = Session::get('error'))
                                    <div class="alert alert-danger rounded-1 alert-dismissible fade show" role="alert">
                                        {{ $mas }}
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                    @yield('content')

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- js liberies --}}
    <script src="{{ asset('back_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back_assets/plugins/DataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('back_assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/main.js') }}"></script>

    @yield('script')

</body>

</html>
