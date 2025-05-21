@extends('layouts.app')

@section('content')

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('storage/' . $hotel->gambar) }}" alt="{{ $hotel->nama }}" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">DETAIL HOTEL</h2>
    </div>
  </section>

  <!-- Hotel Details Section -->
  <section id="detail-hotel" class="detail-hotel section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-8">
          <div class="swiper init-swiper shadow-sm rounded overflow-hidden">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": 1,
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script>

            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide">
                <img src="{{ asset('storage/' . $hotel->gambar) }}" alt="{{ $hotel->nama }}" class="img-fluid w-100" style="object-fit: cover; max-height: 420px;">
              </div>
            </div>
            <div class="swiper-pagination mt-3"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="hotel-info mb-4" data-aos="fade-up" data-aos-delay="200">
            <h3 class="fw-bold">INFORMASI HOTEL</h3>
            <ul class="list-unstyled">
              <li class="mb-2"><strong>Nama:</strong> {{ $hotel->nama }}</li>
              <li class="mb-2"><strong>Alamat:</strong> {{ $hotel->alamat ?? '-' }}</li>
            </ul>
          </div>

          <div class="hotel-description" data-aos="fade-up" data-aos-delay="300">
            <h4 class="fw-semibold">Deskripsi</h4>
            <p>{{ $hotel->deskripsi }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

@endsection
