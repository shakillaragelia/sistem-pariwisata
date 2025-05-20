@extends('layouts.app')

@section('content')

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 class="white-text-shadow" data-aos="fade-up" data-aos-delay="100">SELAMAT DATANG!</h2>
      <p class="white-text-shadow" data-aos="fade-up" data-aos-delay="200">
        Jelajahi pesona alam, budaya, dan sejarah yang menakjubkan di jantung Sumatera Barat.
      </p>
    </div>
  </section>

  <!-- Wisata Section -->
  <section id="wisata" class="wisata section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Kategori Wisata</h2>
      <p>Kategori yang tersedia</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        @foreach ($kategori as $item)
          <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm h-100">
              <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="object-fit: cover; height: 200px;">
              <div class="card-body">
                <h5 class="card-title">{{ $item->nama }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->deskripsi ?? '-', 60) }}</p>
                <a href="#" class="btn btn-sm btn-primary">Lihat</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Hotel Section -->
  <section id="hotel" class="hotel section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Hotel</h2>
      <p>Hotel unggulan</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        @foreach ($hotel as $item)
          <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm h-100">
              <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="object-fit: cover; height: 200px;">
              <div class="card-body">
                <h5 class="card-title">{{ $item->nama }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->deskripsi ?? '-', 60) }}</p>
                <a href="#" class="btn btn-sm btn-primary">Lihat</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Event Section -->
  <section id="event" class="event section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Event</h2>
      <p>Event mendatang</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        @foreach ($event as $item)
          <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm h-100">
              <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="object-fit: cover; height: 200px;">
              <div class="card-body">
                <h5 class="card-title">{{ $item->nama }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->deskripsi ?? '-', 60) }}</p>
                <a href="#" class="btn btn-sm btn-primary">Lihat</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

</main>
@endsection
