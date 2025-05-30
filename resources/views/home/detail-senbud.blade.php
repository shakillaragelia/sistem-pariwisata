
@extends('layouts.app')

@section('content')
<main class="main">
  <section class="hero section dark-background">
    <img src="{{ asset('storage/' . $senbud->gambar) }}" alt="{{ $senbud->nama }}" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">{{ strtoupper($senbud->nama) }}</h2>
    </div>
  </section>

  <section class="section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>WISATA SENI BUDAYA</h2>
      <p>{{ $senbud->nama }}</p>
    </div>

    <div class="container">
      <div class="row gy-5">
        <div class="col-lg-7" data-aos="fade-up">
          <div class="card shadow-sm border-0">
            <img src="{{ asset('storage/' . $senbud->gambar) }}" class="card-img-top w-100" style="object-fit: cover; height: 350px;" alt="{{ $senbud->nama }}">
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
          <div class="info">
            <h4 class="fw-bold mb-3">Informasi</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><strong>Nama:</strong> {{ $senbud->nama }}</li>
            </ul>
            <h5 class="fw-bold mt-4">Deskripsi</h5>
            <p>{{ $senbud->deskripsi }}</p>
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
          <input type="hidden" name="id" value="{{ $senbud->id_senbud }}">
          <input type="hidden" name="type" value="{{ get_class($senbud) }}">

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
