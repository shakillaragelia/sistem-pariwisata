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

  
  <!-- Font Awesome 6 (Free) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- ✅ Lucide Icons -->
  <!-- <script src="https://unpkg.com/lucide@latest"></script> -->

  <!-- Tambahkan di <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Tambahkan sebelum </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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

  {{-- Script tambahan (misal: SweetAlert dari halaman lain) --}}
  @stack('scripts')

  <script>
    window.GOOGLE_API_KEY = "{{ env('GOOGLE_MAPS_API_KEY') }}";
    lucide.createIcons(); // ✅ Init Lucide Icons
  </script>

</body>
</html>
