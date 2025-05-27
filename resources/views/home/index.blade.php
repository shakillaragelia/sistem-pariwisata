
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
          <div class="wisata-item h-100">
            <div class="img position-relative">
              <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid" style="height:250px; object-fit:cover;" alt="">
              <div class="icon" style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); background: #ff4a17; color: white; border-radius: 50%; width: 50px; height: 50px; display: flex; justify-content: center; align-items: center;">
                <i class="bi bi-activity"></i>
              </div>
            </div>
            <div class="details position-relative text-center p-3 shadow-sm bg-white" style="margin-top: -30px; border-radius: 10px;">
              <h5 class="card-title">{{ $item->nama }}</h5>
              <p class="card-text">{{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</p>
            </div>
          </div>
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
