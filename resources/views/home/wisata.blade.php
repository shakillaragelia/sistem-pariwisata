@extends('layouts.app')

@section('content')

<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">
  <img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">
  <div class="container d-flex flex-column align-items-center">
    <h2 data-aos="fade-up" data-aos-delay="100">WISATA</h2>
    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300"></div>
  </div>
</section>

<!-- Wisata Section -->
<section id="wisata" class="wisata section">

  <!-- Portfolio Section -->
  <section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>WISATA</h2>
      <p>WISATA KOTA Bukittinggi</p>
    </div>

    <div class="container">

      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">SEMUA</li>
          <li data-filter=".filter-sejarah">SEJARAH</li>
          <li data-filter=".filter-alam">ALAM</li>
          <li data-filter=".filter-kuliner">KULINER</li>
          <li data-filter=".filter-senbud">SENI BUDAYA</li>
        </ul>

        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">
          @if ($data->isEmpty())
            <div class="col-12 text-center">
              <p class="text-muted">Belum ada data wisata yang tersedia.</p>
            </div>
          @else
            @foreach ($data as $item)
              <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->kategori->slug ?? 'lainnya' }}">
                <div class="portfolio-content h-100">
                  <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/500x300?text=No+Image' }}" class="img-fluid" alt="{{ $item->nama }}">
                  <div class="portfolio-info">
                    <h4>{{ $item->nama }}</h4>
                    <p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</p>
                    <a href="#" title="Lihat Detail"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </section>
</section>
</main>
@endsection
