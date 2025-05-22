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

  <section class="section">
    <div class="container">
      <h4>Komentar</h4>
      @auth
      <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="hidden" name="id" value="{{ $wisata->id }}">
        <input type="hidden" name="type" value="{{ get_class($wisata) }}">
        <div class="form-group">
          <textarea name="komentar" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Kirim Komentar</button>
      </form>
      @else
      <p><a href="{{ route('login') }}">Login</a> untuk memberikan komentar.</p>
      @endauth

      <div class="komentar-list mt-4">
        @forelse ($komentar as $komen)
          <div class="mb-3">
            <strong>{{ $komen->user->name }}</strong><br>
            <small>{{ $komen->created_at->format('d M Y') }}</small>
            <p>{{ $komen->komentar }}</p>
          </div>
        @empty
          <p>Belum ada komentar.</p>
        @endforelse
      </div>
    </div>
  </section>
</main>
@endsection
