

  @extends('layouts.app')

@section('content')

  <main class="main">
 
 <!-- Hero Section -->
 <section id="hero" class="hero section dark-background">

<img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">

<div class="container d-flex flex-column align-items-center">
  <h2 data-aos="fade-up" data-aos-delay="100">DETAIL</h2>
  <!-- <p data-aos="fade-up" data-aos-delay="200">Jelajahi pesona alam, budaya, dan sejarah yang menakjubkan di jantung Sumatera Barat. Temukan destinasi menarik, kuliner khas, dan pengalaman tak terlupakan di Kota Bukittinggi.</p> -->
  <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
  </div>
</div>
</section>

    <!-- hotel Details Section -->
    
    <section id="detail-hotel" class="detail-hotel section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="detail-hotel-slider swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="ragel/ragel/assets/img/jam.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="ragel/ragel/assets/img/jam.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="ragel/ragel/assets/img/jam.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="ragel/ragel/assets/img/jam.jpg" alt="">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="hotel-info" data-aos="fade-up" data-aos-delay="200">
              <h3>INFORMASI WISATA</h3>
              <ul>
                <li><strong>Hotel Bintang </strong>: Web design</li>
                <li><strong>Alamat</strong>: Jl. Yos Sudarso No.29, Kayu Kubu, Kec. Guguk Panjang, Kota Bukittinggi, Sumatera Barat 26115</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul>
            </div>
            <div class="hotel-description" data-aos="fade-up" data-aos-delay="300">
              <h2>JAM GADANG</h2>
              <p>
              Menara jam pemberian Ratu Belanda Wilhemina pada tahun 1927
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /hotel Details Section -->
  </main>
@endsection