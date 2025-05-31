@extends('layouts.app')

@section('content')
<main class="main">

  <!-- Hero Section -->
  <section class="hero section dark-background" id="hero">
    <img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center text-center">
      <h2 class="white-text-shadow" data-aos="fade-up" data-aos-delay="100">TENTANG KOTA BUKITTINGGI</h2>
    </div>
  </section>

  <!-- Tentang Section -->
  <section id="about" class="about section light-background py-5">
    <div class="container">
      <div class="section-title text-center mb-5" data-aos="fade-up">
        <h2>TENTANG</h2>
        <p>TENTANG KOTA BUKITTINGGI</p>
      </div>

      <div class="row gy-4 align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="ragel/ragel/assets/img/about.jpg" alt="Tentang Bukittinggi" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <h5 class="text-uppercase fw-bold mb-3">KOTA WISATA DENGAN PESONA ALAM</h5>
          <p class="mb-3">
            Kota Bukittinggi pada zaman kolonial Belanda disebut dengan Fort de Kock dan juga pernah dijuluki sebagai Parijs van Sumatra.
            Kota yang hari jadinya diperingati setiap tanggal 22 Desember ini pernah menjadi ibu kota Provinsi Sumatera Barat sampai tahun 1978 (de jure),
            serta pernah juga ditunjuk menjadi ibu kota negara Republik Indonesia ketika Yogyakarta (yang saat itu merupakan ibu kota negara) diduduki oleh Belanda pada tanggal 19 Desember 1948.
          </p>
          <p>
            Pemindahan ibu kota negara dari Yogyakarta ke Bukittinggi tersebut dikenal dengan masa Pemerintahan Darurat Republik Indonesia,
            yang kemudian pada tahun 2006 ditetapkan oleh pemerintah sebagai Hari Bela Negara.
          </p>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection
