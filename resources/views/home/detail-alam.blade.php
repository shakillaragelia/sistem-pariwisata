@extends('layouts.app')

@section('content')
<main class="main">
  <section class="hero section dark-background">
    <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">{{ strtoupper($wisata->nama) }}</h2>
    </div>
  </section>

  <section class="section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>WISATA ALAM</h2>
      <p>{{ $wisata->nama }}</p>
    </div>

    <div class="container">
      <div class="row gy-5">
        <div class="col-lg-7" data-aos="fade-up">
          <div class="card shadow-sm border-0">
            <img src="{{ asset('storage/' . $wisata->gambar) }}" class="card-img-top w-100" style="object-fit: cover; height: 350px;" alt="{{ $wisata->nama }}">
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
          <div class="info">
            <h4 class="fw-bold mb-3">Informasi</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><strong>Nama:</strong> {{ $wisata->nama }}</li>
              <li class="mb-2"><strong>Lokasi:</strong> {{ $wisata->lokasi ?? '-' }}</li>
            </ul>
            <h5 class="fw-bold mt-4">Deskripsi</h5>
            <p>{{ $wisata->deskripsi }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  
{{-- Bagian Komentar --}}
<section class="section">
  <div class="container">
    <h4 class="mb-4">Komentar</h4>

    {{-- Form Komentar --}}
    @auth
      <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="hidden" name="id" value="{{ $wisata->id }}">
        <input type="hidden" name="type" value="{{ get_class($wisata) }}">

        <div class="mb-3">
          <label for="komentar" class="form-label">Tulis Komentar:</label>
          <textarea name="komentar" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim Komentar</button>
      </form>
    @else
      <div class="alert alert-info">
        <p class="mb-2">Silakan login terlebih dahulu untuk memberikan komentar.</p>
        <a href="{{ url('/admin/login?redirect=' . urlencode(request()->fullUrl())) }}" class="btn btn-primary">
    Login untuk Berkomentar
</a>

    Login untuk Berkomentar
</a>

      </div>
    @endauth

    {{-- Daftar Komentar --}}
    <div class="komentar-list mt-4">
      @forelse ($komentar as $komen)
        <div class="border rounded p-3 mb-3">
          <strong>{{ $komen->user->name }}</strong><br>
          <small class="text-muted">{{ $komen->created_at->format('d M Y') }}</small>
          <p class="mt-2 mb-0">{{ $komen->komentar }}</p>
        </div>
      @empty
        <p class="text-muted">Belum ada komentar.</p>
      @endforelse
    </div>
  </div>
</section>

@endsection