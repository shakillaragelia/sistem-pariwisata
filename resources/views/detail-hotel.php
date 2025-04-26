@extends('layouts.app')
@section('content')
 
  <main class="main">

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
                  <img src="ragel/ragel/assets/img/hotel/hotel-1.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="ragel/ragel/assets/img/hotel/hotel-1.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="ragel/ragel/assets/img/hotel/hotel-1.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="ragel/ragel/assets/img/hotel/hotel-1.jpg" alt="">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="hotel-info" data-aos="fade-up" data-aos-delay="200">
              <h3>INFORMASI HOTEL</h3>
              <ul>
                <li><strong>Category</strong>: Web design</li>
                <li><strong>Client</strong>: ASU Company</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul>
            </div>
            <div class="hotel-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Exercitationem repudiandae officiis neque suscipit</h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /hotel Details Section -->
  </main>
@endsection