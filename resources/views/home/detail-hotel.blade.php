
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

  <!-- Detail Hotel Section -->
  <section id="detail-hotel" class="hotel section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>HOTEL</h2>
      <p>{{ $hotel->nama }}</p>
    </div>

    <div class="container">
      <div class="row gy-5">
        <div class="col-lg-7" data-aos="fade-up">
          <div class="card shadow-sm border-0">
            <img src="{{ asset('storage/' . $hotel->gambar) }}" class="card-img-top w-100" style="object-fit: cover; height: 350px;" alt="{{ $hotel->nama }}">
          </div>
        </div>

        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
          <div class="hotel-info">
            <h4 class="fw-bold mb-3">Informasi Hotel</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><strong>Nama:</strong> {{ $hotel->nama }}</li>
              <li class="mb-2"><strong>Alamat:</strong> {{ $hotel->lokasi ?? '-' }}</li>
              @if($hotel->bintang)
              <li class="mb-2"><strong>Bintang:</strong>
                @for ($i = 0; $i < $hotel->bintang; $i++)
                  <i class="bi bi-star-fill text-warning"></i>
                @endfor
              </li>
              @endif
              <li class="mb-2"><strong>Harga:</strong> Rp{{ number_format($hotel->harga_mulai ?? 0) }} – Rp{{ number_format($hotel->harga_max ?? 0) }}</li>
              <li class="mb-2"><strong>Telepon:</strong> {{ $hotel->telepon ?? 'Belum tersedia' }}</li>
            </ul>

            <h5 class="fw-bold mt-4">Deskripsi</h5>
            <p>{{ $hotel->deskripsi }}</p>

            <h5 class="fw-bold mt-4">Rekomendasi Wisata Terdekat</h5>
            @foreach ($rekomendasiWisata as $wisata)
  <div class="mb-2">
    <a href="{{ url('/detail- ' . $wisata->slug) }}">
      {{ $wisata->nama }} ({{ number_format($wisata->distance, 2) }} km)
    </a>
  </div>
@endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

@endsection
