@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('content')
<main class="main">

  {{-- Hero --}}
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('ragel/ragel/assets/img/jam.jpg') }}" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 class="white-text-shadow" data-aos="fade-up" data-aos-delay="100">SELAMAT DATANG!</h2>
      <p class="white-text-shadow" data-aos="fade-up" data-aos-delay="200">
        Jelajahi pesona alam, budaya, dan sejarah yang menakjubkan di jantung Sumatera Barat.
      </p>
      <div class="d-flex gap-3 mt-3" data-aos="fade-up" data-aos-delay="300">
        <a href="{{ url('/wisata') }}" class="btn btn-primary px-4">Jelajahi Wisata</a>
        <a href="{{ url('/hotel') }}" class="btn btn-outline-light px-4">Cari Hotel</a>
      </div>
    </div>
  </section>

  {{-- Kategori Wisata --}}
  <section id="wisata" class="wisata section">
    <div class="container section-title" data-aos="fade-up">
      <h2>WISATA</h2>
      <p>KATEGORI WISATA</p>
    </div>

    <div class="container">
      <div class="row gy-4">
        @foreach($kategori as $item)
        @php
          $icon = match(true) {
            str_contains(strtolower($item->nama), 'alam')    => 'tree',
            str_contains(strtolower($item->nama), 'sejarah') => 'bank',
            str_contains(strtolower($item->nama), 'kuliner') => 'cup-straw',
            str_contains(strtolower($item->nama), 'budaya') || str_contains(strtolower($item->nama), 'senbud') => 'brush',
            default => 'pin-map'
          };
        @endphp
        <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <a href="{{ url('/wisata?kategori=' . $item->slug) }}" style="text-decoration: none; color: inherit;">
            <div class="wisata-item h-100">
              <div style="width: 100%; height: 250px; overflow: hidden; border-radius: 10px;">
                <img src="{{ asset('storage/' . $item->gambar) }}"
                     class="img-fluid w-100 h-100"
                     style="object-fit: cover; object-position: center;"
                     alt="{{ $item->nama }}">
              </div>
              <div class="details position-relative text-center p-4 shadow-sm bg-white d-flex flex-column align-items-center"
                   style="border-radius: 10px; margin-top: -30px; min-height: 170px;">
                <div class="kategori-icon">
                  <i class="bi bi-{{ $icon }}"></i>
                </div>
                <h5 class="card-title mb-2">{{ $item->nama }}</h5>
                <p class="card-text text-muted mb-0" style="font-size: 14px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; min-height: 63px;">{{ $item->deskripsi }}</p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Ikon Kota --}}
  <section id="ikon-kota" class="section py-5" style="background: #f8f9fa;">
    <div class="container section-title" data-aos="fade-up">
      <h2>IKON KOTA</h2>
      <p>IKON KOTA BUKITTINGGI</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div id="ikonCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
          @foreach($ikon as $index => $item)
            <button type="button" data-bs-target="#ikonCarousel"
                    data-bs-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}">
            </button>
          @endforeach
        </div>

        <div class="carousel-inner">
          @foreach($ikon->chunk(3) as $chunkIndex => $chunk)
          <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
            <div class="row g-3 px-2">
              @foreach($chunk as $item)
              <div class="col-lg-4 col-md-6">
                <a href="{{ route('detail.wisata', $item->slug) }}" class="text-decoration-none">
                  <div class="position-relative overflow-hidden rounded-4 shadow">
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                         style="height: 260px; width: 100%; object-fit: cover; border-radius: 16px; transition: transform 0.3s;"
                         onmouseover="this.style.transform='scale(1.05)'"
                         onmouseout="this.style.transform='scale(1)'"
                         alt="{{ $item->nama }}">
                    <div class="position-absolute bottom-0 start-0 end-0 p-3"
                         style="background: linear-gradient(transparent, rgba(0,0,0,0.6)); border-radius: 0 0 16px 16px;">
                      <h6 class="text-white fw-bold mb-0">{{ $item->nama }}</h6>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>

        @if($ikon->count() > 3)
        <button class="carousel-control-prev" type="button" data-bs-target="#ikonCarousel" data-bs-slide="prev"
                style="width: 40px; height: 40px; background: rgba(0,0,0,0.3); border-radius: 50%; top: 50%; transform: translateY(-50%); left: -20px;">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#ikonCarousel" data-bs-slide="next"
                style="width: 40px; height: 40px; background: rgba(0,0,0,0.3); border-radius: 50%; top: 50%; transform: translateY(-50%); right: -20px;">
          <span class="carousel-control-next-icon"></span>
        </button>
        @endif

      </div>
    </div>
  </section>

</main>
@endsection