@extends('layouts.app')

@section('content')
<main class="main">

  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">{{ strtoupper($wisata->nama) }}</h2>
    </div>
  </section>

  <section id="detail-wisata" class="wisata section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>INFORMASI</h2>
      <p>{{ $wisata->nama }}</p>
    </div>

    <div class="container">
      <div class="row align-items-stretch" data-aos="fade-up">
        <!-- Gambar kiri -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="{{ asset('storage/' . $wisata->gambar) }}"
               class="img-fluid h-100 w-100 object-fit-cover rounded"
               alt="{{ $wisata->nama }}">
        </div>

        <!-- Konten kanan -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="info-wisata h-100 d-flex flex-column justify-content-between">
            <h4 class="fw-bold mb-3">Informasi</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><strong>Nama:</strong> {{ $wisata->nama }}</li>
              <li class="mb-2">
                <strong>Lokasi:</strong>
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($wisata->lokasi) }}" target="_blank">
                  {{ $wisata->lokasi ?? '-' }}
                </a>
              </li>
            </ul>

            <h5 class="fw-bold mt-4">Deskripsi</h5>
            <p>{{ $wisata->deskripsi }}</p>

            <h5 class="fw-bold mt-4">Fasilitas</h5>
            <ul class="list-unstyled">
              <li class="mb-1">
                <i class="fas fa-square-parking me-2"></i>
                {{ $wisata->parkir ? 'Tersedia' : 'Tidak tersedia' }}
              </li>
              <li class="mb-1">
                <i class="fas fa-toilet me-2"></i>
                {{ $wisata->toilet ? 'Tersedia' : 'Tidak tersedia' }}
              </li>
              <li class="mb-1">
                <i class="fas fa-mosque me-2"></i>
                {{ $wisata->tempat_ibadah ? 'Tersedia' : 'Tidak tersedia' }}
              </li>
              <li class="mb-1">
                <i class="fas fa-money-bill-wave me-2"></i>
                {{ $wisata->harga ? 'Rp' . number_format($wisata->harga, 0, ',', '.') : 'Gratis / Tidak tersedia' }}
              </li>
            </ul>

            <h5 class="fw-bold mt-4">Rekomendasi Hotel Terdekat</h5>
            @forelse ($rekomendasiHotel as $hotel)
              <div class="mb-2">
                <a href="{{ url('/detail-' . $hotel->slug) }}">
                  {{ $hotel->nama }} ({{ number_format($hotel->distance, 2) }} km)
                </a>
              </div>
            @empty
              <p>Tidak ada hotel terdekat yang ditemukan.</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Komentar --}}
  <section class="section">
    <div class="container">
      <h4 class="mb-4">Komentar</h4>
      @auth
        <p class="text-muted small">
          Login sebagai: <strong>{{ auth()->user()->email }}</strong> | Role: <strong>{{ auth()->user()->role }}</strong>
        </p>
      @endauth

      @if(auth()->check() && auth()->user()->role === 'user')
        <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
          @csrf
          <input type="hidden" name="id" value="{{ $wisata->id_wisata }}">
          <input type="hidden" name="type" value="App\Models\Wisata">
          <div class="mb-3">
            <label for="komentar" class="form-label">Tulis Komentar:</label>
            <textarea name="komentar" class="form-control" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-success">Kirim Komentar</button>
        </form>
      @else
        <div class="alert alert-info">
          Silakan login terlebih dahulu untuk memberikan komentar.
          <br>
          <a href="{{ route('login.user', ['redirect' => request()->fullUrl()]) }}" class="btn btn-primary mt-2">
            Login untuk Berkomentar
          </a>
        </div>
      @endif

      <div class="komentar-list mt-4">
        @forelse ($komentar as $komen)
          <div class="border rounded p-3 mb-3">
            <strong>{{ $komen->user->name }}</strong><br>
            <small class="text-muted">{{ $komen->created_at->format('d M Y') }}</small>
            <p class="mt-2">{{ $komen->komentar }}</p>
          </div>
        @empty
          <p>Belum ada komentar.</p>
        @endforelse
      </div>
    </div>
  </section>

</main>
@endsection
