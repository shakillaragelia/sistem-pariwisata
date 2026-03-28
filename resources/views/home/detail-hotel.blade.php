@extends('layouts.app')

@section('content')
<main class="main">

  {{-- Hero --}}
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('storage/' . ($hotel->gambar[0] ?? '')) }}" alt="{{ $hotel->nama }}" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">{{ strtoupper($hotel->nama) }}</h2>
    </div>
  </section>

  {{-- Detail --}}
  <section id="detail-hotel" class="section light-background py-5">
    <div class="container" data-aos="fade-up">

      {{-- Breadcrumb --}}
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/hotel') }}">Hotel</a></li>
          <li class="breadcrumb-item active">{{ $hotel->nama }}</li>
        </ol>
      </nav>

      <div class="row g-5">
        {{-- Carousel kiri --}}
        <div class="col-lg-6">
          <div id="hotelCarousel" class="carousel slide rounded-4 overflow-hidden shadow" data-bs-ride="carousel">
            <div class="carousel-indicators">
              @foreach($hotel->gambar ?? [] as $index => $gambar)
                <button type="button" data-bs-target="#hotelCarousel"
                        data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}">
                </button>
              @endforeach
            </div>
            <div class="carousel-inner">
              @foreach($hotel->gambar ?? [] as $index => $gambar)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                  <img src="{{ asset('storage/' . $gambar) }}"
                       class="d-block w-100"
                       style="height: 420px; object-fit: cover;"
                       alt="{{ $hotel->nama }}">
                </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>

        {{-- Info kanan --}}
        <div class="col-lg-6">

          {{-- Bintang --}}
          @if($hotel->bintang)
          <div class="mb-2">
            @for($i = 0; $i < $hotel->bintang; $i++)
              <i class="bi bi-star-fill text-warning"></i>
            @endfor
            <span class="text-muted ms-1" style="font-size: 13px;">{{ $hotel->bintang }} Bintang</span>
          </div>
          @endif

          <h2 class="fw-bold mb-3">{{ $hotel->nama }}</h2>

          {{-- Info dasar --}}
          <div class="d-flex flex-column gap-2 mb-4">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-geo-alt-fill text-danger"></i>
              <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($hotel->lokasi) }}"
                 target="_blank" class="text-decoration-none text-muted">
                {{ $hotel->lokasi ?? '-' }}
              </a>
            </div>

            @if($hotel->harga_mulai || $hotel->harga_max)
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-cash-stack text-success"></i>
              <span>Rp{{ number_format($hotel->harga_mulai ?? 0) }} – Rp{{ number_format($hotel->harga_max ?? 0) }} / malam</span>
            </div>
            @endif

            @if($hotel->telepon)
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-telephone-fill text-primary"></i>
              <a href="tel:{{ $hotel->telepon }}" class="text-decoration-none text-muted">
                {{ $hotel->telepon }}
              </a>
            </div>
            @endif
          </div>

          {{-- Deskripsi --}}
          <h5 class="fw-bold mb-2">Deskripsi</h5>
          <p class="text-muted" style="text-align: justify; line-height: 1.8;">{{ $hotel->deskripsi }}</p>

          {{-- Tombol Booking --}}
          <div class="d-flex gap-2 mt-4 flex-wrap">
            <a href="https://www.traveloka.com/en-id/hotel/search?spec={{ urlencode($hotel->nama . ' Bukittinggi') }}"
               target="_blank"
               class="btn btn-primary px-4">
              <i class="bi bi-calendar-check me-2"></i>Pesan di Traveloka
            </a>
            <a href="https://www.booking.com/search.html?ss={{ urlencode($hotel->nama . ' Bukittinggi') }}"
               target="_blank"
               class="btn btn-outline-primary px-4">
              <i class="bi bi-calendar-check me-2"></i>Pesan di Booking.com
            </a>
          </div>

          {{-- Rekomendasi Wisata --}}
          @if(count($rekomendasiWisata) > 0)
          <h5 class="fw-bold mb-3 mt-4">Wisata Terdekat</h5>
          <div class="d-flex flex-column gap-2">
            @foreach($rekomendasiWisata as $wisata)
            <a href="{{ route('detail.wisata', ['slug' => $wisata->slug]) }}"
               class="d-flex align-items-center gap-3 bg-white rounded-3 p-3 shadow-sm border text-decoration-none text-dark">
              <i class="bi bi-map fs-5 text-success"></i>
              <div>
                <div class="fw-semibold" style="font-size: 14px;">{{ $wisata->nama }}</div>
                <small class="text-muted">{{ number_format($wisata->distance, 2) }} km dari sini</small>
              </div>
              <i class="bi bi-chevron-right ms-auto text-muted"></i>
            </a>
            @endforeach
          </div>
          @endif

        </div>
      </div>
    </div>
  </section>

</main>
@endsection