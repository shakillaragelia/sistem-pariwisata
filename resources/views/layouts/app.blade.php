<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DISPAR</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="ragel/ragel/assets/img/icon.png" rel="icon">
  <link href="ragel/ragel/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="ragel/ragel/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="ragel/ragel/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="ragel/ragel/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="ragel/ragel/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="ragel/ragel/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="ragel/ragel/assets/css/main.css" rel="stylesheet">
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
  <script src="ragel/ragel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="ragel/ragel/assets/vendor/php-email-form/validate.js"></script>
  <script src="ragel/ragel/assets/vendor/aos/aos.js"></script>
  <script src="ragel/ragel/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="ragel/ragel/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="ragel/ragel/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="ragel/ragel/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="ragel/ragel/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="ragel/ragel/assets/js/main.js"></script>
</body>

</html>
