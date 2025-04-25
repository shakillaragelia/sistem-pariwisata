@extends('layouts.app')

@section('content')

  <main class="main">

 <!-- Hotel Section -->
 <section id="hotel" class="hotel section light-background">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Hotel</h2>
  <p>HOTEL DI BUKITTINGGI</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-5">

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
      <div class="member">
        <div class="pic"><img src="ragel/ragel/assets/img/hotel/hotel-1.jpg" class="img-fluid" alt=""></div>
        <div class="member-info">
          <h4>ROCKY HOTEL BUKITTINGGI</h4>
          <a href="detail-hotel" class="stretched-link"></a>
          <span></span>
          <div class="social">
            <a href=""><i class="bi bi-geo-alt"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Hotel Member -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
      <div class="member">
        <div class="pic"><img src="ragel/ragel/assets/img/hotel/hotel-2.jpg" class="img-fluid" alt=""></div>
        <div class="member-info">
        <a href="detail-hotel" class="stretched-link">
          <h4>MONOPOLI HOTEL BUKITTINGGI</h4>
          <span></span>
          <div class="social">
          <a href=""><i class="bi bi-geo-alt"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Hotel Member -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
      <div class="member">
        <div class="pic"><img src="ragel/ragel/assets/img/hotel/hotel-3.jpg" class="img-fluid" alt=""></div>
        <div class="member-info">
        <a href="detail-hotel" class="stretched-link">
          <h4>GRAND ROYAL DENAI HOTEL</h4>
          <span></span>
          <div class="social">
          <a href=""><i class="bi bi-geo-alt"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Hotel Member -->

  </div>

</div>

</section><!-- /Hotel Section -->
  </main>
@endsection