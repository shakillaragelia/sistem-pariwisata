@extends('layouts.app')

@section('content')

<main class="main">
 
 <!-- Hero Section -->
 <section id="hero" class="hero section dark-background">

<img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">

<div class="container d-flex flex-column align-items-center">
  <h2 data-aos="fade-up" data-aos-delay="100">SELAMAT DATANG!</h2>
  <p data-aos="fade-up" data-aos-delay="200">Jelajahi pesona alam, budaya, dan sejarah yang menakjubkan di jantung Sumatera Barat. Temukan destinasi menarik, kuliner khas, dan pengalaman tak terlupakan di Kota Bukittinggi.</p>
  <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
  </div>
</div>

</section><!-- /Hero Section -->
 <!-- Wisata Section -->
 <section id="wisata" class="wisata section">



 <!-- Portfolio Section -->
 <section id="portfolio" class="portfolio section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>WISATA</h2>
  <p>WISATA KOTA Bukittinggi</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="filter-active">SEMUA</li>
      <li data-filter=".filter-app">SEJARAH</li>
      <li data-filter=".filter-product">ALAM</li>
      <li data-filter=".filter-branding">KULINER</li>
      <li data-filter=".filter-books">SENI BUDAYA</li>
    </ul><!-- End Portfolio Filters -->

<!-- Hotel Section -->
<section id="hotel" class="hotel section light-background">

<div class="container">

  <div class="row gy-5">

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
      <div class="member">
        <div class="pic"><img src="ragel/ragel/assets/img/jam.jpg" class="img-fluid" alt=""></div>
        <div class="member-info">
          <h4>JAM GADANG</h4>
          <a href="senbud-detail" class="stretched-link"></a>
          <span>Menara jam pemberian Ratu Belanda Wilhemina pada tahun 1927</span>
          <div class="social">
            <a href=""><i class="bi bi-geo-alt"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Hotel Member -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
      <div class="member">
        <div class="pic"><img src="ragel/ragel/assets/img/sejarah.jpg" class="img-fluid" alt=""></div>
        <div class="member-info">
        <a href="detail-hotel" class="stretched-link">
          <h4>BENTENG FORT DE KOCK</h4>
          <span>Benteng peninggalan kolonial Belanda tahun 1852</span>
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
          <h4>NGARAI SIANOK</h4>
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