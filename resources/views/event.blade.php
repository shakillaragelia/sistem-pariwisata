@extends('layouts.app')

@section('content')

<main class="main">

<!-- blog Section -->
 <section id="blog" class="blog section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>blog & event</h2>
  <p>BLOG & EVENT </p>
</div><!-- End Section Title -->

<div class="container">

  <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

    <ul class="blog-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="filter-active">All</li>
      <li data-filter=".filter-blog">BLOG</li>
      <li data-filter=".filter-event">EVENT</li>
    </ul><!-- End blog Filters -->

    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-4 col-md-6 blog-item isotope-item filter-blog">
        <div class="blog-content h-100">
          <img src="ragel/ragel/assets/img/blog/app-1.jpg" class="img-fluid" alt="">
          <div class="blog-info">
            <h4>Blog 1</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="ragel/ragel/assets/img/blog/app-1.jpg" title="Blog 1" data-gallery="blog-gallery-blog" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="detail-blog" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div><!-- End blog Item -->


      <div class="col-lg-4 col-md-6 blog-item isotope-item filter-blog">
        <div class="blog-content h-100">
          <img src="ragel/ragel/assets/img/blog/app-2.jpg" class="img-fluid" alt="">
          <div class="blog-info">
            <h4>Blog 2</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="ragel/ragel/assets/img/blog/app-2.jpg" title="Blog 2" data-gallery="blog-gallery-blog" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="detail-blog" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div><!-- End blog Item -->

      
      <div class="col-lg-4 col-md-6 blog-item isotope-item filter-blog">
        <div class="blog-content h-100">
          <img src="ragel/ragel/assets/img/blog/app-3.jpg" class="img-fluid" alt="">
          <div class="blog-info">
            <h4>Blog 3</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/blog/app-3.jpg" title="Blog 3" data-gallery="blog-gallery-blog" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="detail-blog" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div><!-- End blog Item -->

      <div class="col-lg-4 col-md-6 blog-item isotope-item filter-event">
        <div class="blog-content h-100">
          <img src="ragel/ragel/assets/img/blog/pedati.jpg" class="img-fluid" alt="">
          <div class="blog-info">
            <h4>Event 1</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="ragel/ragel/assets/img/blog/pedati.jpg" title="Event 1" data-gallery="blog-gallery-event" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="detail-blog" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div><!-- End blog Item -->


      <div class="col-lg-4 col-md-6 blog-item isotope-item filter-event">
        <div class="blog-content h-100">
          <img src="ragel/ragel/assets/img/blog/pacukuda.jpg" class="img-fluid" alt="">
          <div class="blog-info">
            <h4>Event 2</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="ragel/ragel/assets/img/blog/pacukuda.jpg" title="Event 2" data-gallery="blog-gallery-event" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="detail-blog" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div><!-- End blog Item -->


      <div class="col-lg-4 col-md-6 blog-item isotope-item filter-event">
        <div class="blog-content h-100">
          <img src="ragel/ragel/assets/img/blog/product-3.jpg" class="img-fluid" alt="">
          <div class="blog-info">
            <h4>Event 3</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/blog/product-3.jpg" title="Event 3" data-gallery="blog-gallery-event" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="detail-blog" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div><!-- End blog Item -->


    </div><!-- End blog Container -->

  </div>

</div>

</section> <!-- /blog Section -->
</main>
@endsection