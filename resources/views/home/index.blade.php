@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp


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

  <!-- Kategori Wisata -->
  <section id="wisata" class="wisata section">
    <div class="container section-title" data-aos="fade-up">
      <h2>WISATA</h2>
      <p>KATEGORI WISATA</p>
    </div>

    <div class="container">
      <div class="row gy-4">
        @foreach ($kategori as $item)
        <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
  @php
      $kategoriSlug = match(strtolower($item->nama)) {
          'wisata alam' => 'alam',
          'wisata sejarah' => 'sejarah',
          'wisata kuliner' => 'kuliner',
          'wisata seni budaya', 'seni budaya', 'wisata senbud' => 'senibudaya',
          default => ''
      };
  @endphp

  <a href="{{ url('/wisata?kategori=' . $kategoriSlug) }}" style="text-decoration: none; color: inherit;">
    <div class="wisata-item h-100">
      <div class="img" style="width: 100%; height: 250px; overflow: hidden; border-radius: 10px;">
        <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid w-100 h-100" style="object-fit: cover; object-position: center;" alt="">
      </div>
      <div class="details position-relative text-center p-4 shadow-sm bg-white" style="border-radius: 10px; margin-top: -30px;">
        @php
          $icon = match(strtolower($item->nama)) {
              'wisata alam' => 'tree',
              'wisata sejarah' => 'bank',
              'wisata kuliner' => 'cup-straw',
              'seni budaya', 'wisata seni budaya', 'wisata senbud' => 'brush',
              default => 'pin-map'
          };
        @endphp

        <div class="kategori-icon">
          <i class="bi bi-{{ $icon }}"></i>
        </div>

        <h5 class="card-title mb-2">{{ $item->nama }}</h5>
        <p class="card-text">{{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</p>
      </div>
    </div>
  </a>
</div>

        @endforeach
      </div>
    </div>
  </section>

  <!-- Ikon Kota -->
  <section id="ikon-kota" class="section mt-5">
    <div class="container section-title" data-aos="fade-up">
      <h2>IKON KOTA</h2>
      <p>IKON KOTA BUKITTINGGI</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        @foreach ($ikon as $item)
        <div class="col-lg-4 col-md-6">
          <div class="card shadow-sm h-100">
            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  

</main>
@endsection
