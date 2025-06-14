@extends('layouts.app')

@section('content')
<main class="main">
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('storage/' . $hotel->gambar) }}" alt="{{ $hotel->nama }}" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">{{ strtoupper($hotel->nama) }}</h2>
    </div>
  </section>

  <section id="detail-hotel" class="hotel section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>HOTEL</h2>
      <p>{{ $hotel->nama }}</p>
    </div>

    <div class="container">
      <div class="row align-items-stretch" data-aos="fade-up">
        <!-- Gambar kiri -->
        <div class="col-lg-6 d-flex">
          <img src="{{ asset('storage/' . $hotel->gambar) }}"
               class="img-fluid w-100 object-fit-cover rounded"
               style="object-fit: cover; width: 100%;"
               alt="{{ $hotel->nama }}">
        </div>

        <!-- Konten kanan -->
        <div class="col-lg-6 d-flex">
          <div class="hotel-info d-flex flex-column justify-content-between w-100">
            <h4 class="fw-bold mb-3">Informasi Hotel</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><strong>Nama:</strong> {{ $hotel->nama }}</li>
              <li class="mb-2"><strong>Alamat:</strong>
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($hotel->lokasi) }}" target="_blank">
                  {{ $hotel->lokasi ?? '-' }}
                </a>
              </li>
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
            <p style="text-align: justify">{{ $hotel->deskripsi }}</p>

            <h5 class="fw-bold mt-4">Rekomendasi Wisata Terdekat</h5>
            @forelse ($rekomendasiWisata as $wisata)
              <div class="mb-2">
              @php
    switch ($wisata->kategori) {
        case 'sejarah':
            $route = route('detail.sejarah', ['slug' => $wisata->slug]);
            break;
        case 'alam':
            $route = route('detail.alam', ['slug' => $wisata->slug]);
            break;
        default:
            $route = '#';
    }
@endphp

<a href="{{ $route }}">
    {{ $wisata->nama }} ({{ number_format($wisata->distance, 2) }} km)
</a>

              </div>
            @empty
              <p>Tidak ada wisata terdekat yang ditemukan.</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection