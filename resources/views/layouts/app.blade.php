<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DISPAR</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('ragel/ragel/assets/img/icon.png') }}" rel="icon">
  <link href="{{ asset('ragel/ragel/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&family=Raleway:wght@300;500;700&family=Inter:wght@300;500;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('ragel/ragel/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ragel/ragel/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('ragel/ragel/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('ragel/ragel/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ragel/ragel/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('ragel/ragel/assets/css/main.css') }}" rel="stylesheet">
</head>
<body>

  <!-- Header -->
  @include('partials.header')

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  @include('partials.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('ragel/ragel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('ragel/ragel/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('ragel/ragel/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('ragel/ragel/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('ragel/ragel/assets/js/main.js') }}"></script>

</body>
</html>
