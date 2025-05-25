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
    <section id="portfolio" class="portfolio section">
      <div class="container section-title" data-aos="fade-up">
        <h2>WISATA</h2>
        <p>WISATA KOTA BUKITTINGGI</p>
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
            @forelse ($data as $item)
            @php
            $slugKategori = $item->kategori->slug ?? 'lainnya';
            $route = match ($slugKategori) {
            'sejarah' => route('detail.sejarah', $item->slug),
            'alam' => route('detail.alam', $item->slug),
            'kuliner' => route('detail.kuliner', $item->slug),
            'senbud' => route('detail.senbud', $item->slug),
            default => '#',
            };
            @endphp

            <div class="col-lg-4 col-md-6 mb-4 portfolio-item filter-{{ $slugKategori }}">
              <a href="{{ $route }}" class="text-decoration-none text-dark">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/500x300?text=No+Image' }}"
                    class="card-img-top w-100" style="object-fit: cover; height: 230px;" alt="{{ $item->nama }}">
                  <div class="card-body px-3 py-2">
                    <h5 class="card-title fw-bold mb-1 text-center">{{ $item->nama }}</h5>
                    <p class="card-text text-muted" style="font-size: 14px;">{{
                      \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</p>
                  </div>
                </div>
              </a>
            </div>
            @empty
            <div class="col-12 text-center">
              <p class="text-muted">Belum ada data wisata yang tersedia.</p>
            </div>
            @endforelse
          </div>

        </div>
      </div>
    </section>
  </section>

</main>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://unpkg.com/desandro-matches-selector@2.0.2/matches-selector.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var iso = new Isotope('.isotope-container', {
      itemSelector: '.portfolio-item',
      layoutMode: 'masonry'
    });

    document.querySelectorAll('.portfolio-filters li').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filterValue = btn.getAttribute('data-filter');
        iso.arrange({ filter: filterValue });
        document.querySelectorAll('.portfolio-filters li').forEach(li => li.classList.remove('filter-active'));
        btn.classList.add('filter-active');
      });
    });
  });
</script>

@endsection

@push('scripts')
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var elem = document.querySelector('.isotope-container');
    var iso = new Isotope(elem, {
      itemSelector: '.portfolio-item',
      layoutMode: 'masonry'
    });

    var filtersElem = document.querySelector('.portfolio-filters');
    filtersElem.addEventListener('click', function(event) {
      if (!event.target.matches('li')) return;
      var filterValue = event.target.getAttribute('data-filter');
      iso.arrange({ filter: filterValue });

      document.querySelectorAll('.portfolio-filters li').forEach(function(el) {
        el.classList.remove('filter-active');
      });
      event.target.classList.add('filter-active');
    });
  });
</script>
@endpush