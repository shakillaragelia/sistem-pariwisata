@extends('layouts.app')

@section('content')

<main class="main">
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">EVENT</h2>
    </div>
  </section>

  <!-- Event Section -->
  <section id="blog" class="blog section">
    <div class="container section-title" data-aos="fade-up">
      <h2>EVENT</h2>
      <p>EVENT KOTA BUKITTINGGI</p>
    </div>

    <div class="container">
      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        @forelse ($events as $item)
          <div class="col-lg-4 col-md-6 blog-item isotope-item filter-app">
            <div class="blog-content h-100">
              <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->judul }}">
              <div class="blog-info">
                <h4>{{ $item->judul }}</h4>
                <p>Tekan Gambar Untuk Tampilan Yang Lebih Besar</p>
                <a href="{{ asset('storage/' . $item->gambar) }}" title="{{ $item->judul }}" data-gallery="blog-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center">
            <p>Belum ada event tersedia.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>
</main>

@endsection
