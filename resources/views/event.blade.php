@extends('layouts.app')

@section('content')

<main class="main">

<!-- blog Section -->
 <section id="blog" class="blog section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
        <h2>EVENT</h2>
        <p>EVENT KOTA BUKITTINGGI </p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 blog-item isotope-item filter-app">
              <div class="blog-content h-100">
                <img src="ragel/ragel/assets/img/ikon-1.jpg" class="img-fluid" alt="">
                <div class="blog-info">
                  <h4>PEDATI</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="ragel/ragel/assets/img/ikon-1.jpg" title="Pedati" data-gallery="blog-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div><!-- End blog Item -->

            <div class="col-lg-4 col-md-6 blog-item isotope-item filter-app">
              <div class="blog-content h-100">
                <img src="ragel/ragel/assets/img/ikon-2.jpg" class="img-fluid" alt="">
                <div class="blog-info">
                  <h4>Karupuak Sanjai</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="ragel/ragel/assets/img/ikon-2.jpg" title="Karupuak Sanjai" data-gallery="blog-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div><!-- End blog Item -->

            <div class="col-lg-4 col-md-6 blog-item isotope-item filter-app">
              <div class="blog-content h-100">
                <img src="ragel/ragel/assets/img/ikon-3.jpg" class="img-fluid" alt="">
                <div class="blog-info">
                  <h4>Ngarai Sianok</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="ragel/ragel/assets/img/ikon-3.jpg" title="Ngarai Sianok" data-gallery="blog-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div><!-- End blog Item -->
          </div><!-- End blog Container -->
        </div>
      </div>
    </section><!-- /blog Section -->
</main>
@endsection