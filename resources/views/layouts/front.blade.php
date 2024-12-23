<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>

    @yield('heading')

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('front_assets/plugins/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('front_assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front_assets/plugins/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front_assets/plugins/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('front_assets/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('front_assets/plugins/slick/slick-theme.css') }}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('front_assets/scss/theme.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('front_assets/scss/main.min.css') }}">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex sticky-top align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

    <a class="logo" href="{{ route('home.index') }}"> <img src="{{ asset($store->where('title','logo')->value('picture')) }}" class="img-fluid" height="50" width="70" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
            @foreach ( $menus as $menu )

               <li ><a class="nav-link {{ Request::routeIs($menu->slug)  ? 'active' : '' }}" href="{{ route($menu->slug) }}" ><span>{{ $menu->title }}</span> </a>
{{-- class="{{ (count($sub_menu)) ? 'dropdown' : '' }}  }}" --}}
{{-- {!! count($sub_menu) ? '<i class="bi bi-chevron-down"></i>' : '' !!} --}}
                {{-- <ul>

                @foreach ( $sub_menu as $sub_menus )

                    <li><a href="#">{{ $sub_menus->sub_title }}</a></li>

                @endforeach

                </ul> --}}

            </li>

            @endforeach

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">

    <div class="container-fluid">
            @yield('content')
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="bg-dark">

    {{-- <div class="footer-newsletter">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>BizLand<span>.</span></h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
            @foreach ( $menus as $menu )
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route($menu->slug) }}">{{ $menu->title }}</a></li>
            @endforeach

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">FAQ's</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Private Policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://iftekher2108.github.io/iftekher-portfolio">Iftekher Mahmud</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('front_assets/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('front_assets/plugins/aos/aos.js') }}"></script>
  <script src="{{ asset('front_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front_assets/plugins/slick/slick.js') }}"></script>
  {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{ asset('front_assets/js/theme.js') }}"></script>

</body>

</html>



























