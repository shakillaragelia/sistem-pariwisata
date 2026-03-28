@extends('layouts.app')

@section('content')
<main class="main">

  {{-- Hero --}}
  <section class="hero section dark-background" id="hero">
    <img src="{{ asset('ragel/ragel/assets/img/jam.jpg') }}" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center text-center">
      <h2 class="white-text-shadow" data-aos="fade-up" data-aos-delay="100">TENTANG KOTA BUKITTINGGI</h2>
    </div>
  </section>

  {{-- Tentang Section --}}
  <section id="about" class="about section light-background py-5">
    <div class="container">

      <div class="section-title text-center mb-5" data-aos="fade-up">
        <h2>TENTANG</h2>
        <p>TENTANG KOTA BUKITTINGGI</p>
      </div>

      <div class="row gy-5 align-items-center mb-5">
        {{-- Gambar --}}
        <div class="col-lg-6" data-aos="fade-right">
          <img src="{{ asset('ragel/ragel/assets/img/about.jpg') }}"
               alt="Tentang Bukittinggi"
               class="img-fluid rounded-4 shadow w-100"
               style="object-fit: cover; max-height: 420px;">
        </div>

        {{-- Konten --}}
        <div class="col-lg-6" data-aos="fade-left">
          <span class="badge rounded-pill mb-3 px-3 py-2" style="background-color: #e8531d; font-size: 13px;">
            Kota Bersejarah
          </span>
          <h3 class="fw-bold mb-4">Kota Wisata dengan Pesona Alam</h3>
          <p class="text-muted mb-3" style="line-height: 1.8; text-align: justify;">
            Kota Bukittinggi pada zaman kolonial Belanda disebut dengan Fort de Kock dan juga
            pernah dijuluki sebagai Parijs van Sumatra. Kota yang hari jadinya diperingati setiap
            tanggal 22 Desember ini pernah menjadi ibu kota Provinsi Sumatera Barat sampai tahun
            1978 (de jure), serta pernah juga ditunjuk menjadi ibu kota negara Republik Indonesia
            ketika Yogyakarta diduduki oleh Belanda pada tanggal 19 Desember 1948.
          </p>
          <p class="text-muted" style="line-height: 1.8; text-align: justify;">
            Pemindahan ibu kota negara dari Yogyakarta ke Bukittinggi tersebut dikenal dengan
            masa Pemerintahan Darurat Republik Indonesia, yang kemudian pada tahun 2006
            ditetapkan oleh pemerintah sebagai Hari Bela Negara.
          </p>

          {{-- Stats --}}
          <div class="row g-3 mt-3">
            <div class="col-4">
              <div class="text-center p-3 bg-white rounded-3 shadow-sm border">
                <h4 class="fw-bold mb-0" style="color: #e8531d;">25 km²</h4>
                <small class="text-muted">Luas Kota</small>
              </div>
            </div>
            <div class="col-4">
              <div class="text-center p-3 bg-white rounded-3 shadow-sm border">
                <h4 class="fw-bold mb-0" style="color: #e8531d;">3</h4>
                <small class="text-muted">Kecamatan</small>
              </div>
            </div>
            <div class="col-4">
              <div class="text-center p-3 bg-white rounded-3 shadow-sm border">
                <h4 class="fw-bold mb-0" style="color: #e8531d;">930m</h4>
                <small class="text-muted">Di atas laut</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Keunggulan --}}
      <div class="row g-4 mt-2" data-aos="fade-up">
        <div class="col-12">
          <h4 class="fw-bold text-center mb-4">Mengapa Mengunjungi Bukittinggi?</h4>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center p-4 bg-white rounded-4 shadow-sm border h-100">
            <div class="mb-3" style="font-size: 2.5rem; color: #e8531d;">
              <i class="bi bi-geo-alt-fill"></i>
            </div>
            <h6 class="fw-bold mb-2">Destinasi Wisata</h6>
            <p class="text-muted small mb-0">Berbagai destinasi wisata alam, sejarah, kuliner, dan budaya yang memukau.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center p-4 bg-white rounded-4 shadow-sm border h-100">
            <div class="mb-3" style="font-size: 2.5rem; color: #e8531d;">
              <i class="bi bi-thermometer-half"></i>
            </div>
            <h6 class="fw-bold mb-2">Iklim Sejuk</h6>
            <p class="text-muted small mb-0">Terletak di ketinggian 930 mdpl, Bukittinggi menawarkan udara yang sejuk dan segar.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center p-4 bg-white rounded-4 shadow-sm border h-100">
            <div class="mb-3" style="font-size: 2.5rem; color: #e8531d;">
              <i class="bi bi-cup-hot-fill"></i>
            </div>
            <h6 class="fw-bold mb-2">Kuliner Khas</h6>
            <p class="text-muted small mb-0">Surga kuliner Minangkabau yang kaya rasa dan tradisi yang tak terlupakan.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center p-4 bg-white rounded-4 shadow-sm border h-100">
            <div class="mb-3" style="font-size: 2.5rem; color: #e8531d;">
              <i class="bi bi-building-fill"></i>
            </div>
            <h6 class="fw-bold mb-2">Nilai Sejarah</h6>
            <p class="text-muted small mb-0">Kota bersejarah dengan banyak peninggalan masa perjuangan kemerdekaan Indonesia.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

</main>
@endsection