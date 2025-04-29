@extends('layouts.app')

@section('content')

  <main class="main">

   <!-- Hero Section -->
   <section id="hero" class="hero section dark-background">

<img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">

<div class="container d-flex flex-column align-items-center">
  <h2 data-aos="fade-up" data-aos-delay="100">SELAMAT DATANG!</h2>
  <p data-aos="fade-up" data-aos-delay="200">Jelajahi pesona alam, budaya, dan sejarah yang menakjubkan di jantung Sumatera Barat. Temukan destinasi menarik, kuliner khas, dan pengalaman tak terlupakan di Kota Bukittinggi.</p>
  <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
  </div>
</div>

</section><!-- /Hero Section -->
 
 <!-- Contact Section -->
 <section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Kontak</h2>
  <p>HUBUNGI KAMI</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">
    <div class="col-lg-6 ">
      <div class="row gy-4">

        <div class="col-lg-12">
          <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt"></i>
            <h3>Alamat</h3>
            <p>Jl. Perwira No.54, Belakang Balok, Kec. Aur Birugo Tigo Baleh</p>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone"></i>
            <h3>Telepon</h3>
            <p>+62 000000</p>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope"></i>
            <h3>Email Kami</h3>
            <p>info@example.com</p>
          </div>
        </div><!-- End Info Item -->

      </div>
    </div>

    <div class="col-lg-6">
      <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Nama Anda" required="">
          </div>

          <div class="col-md-6 ">
            <input type="email" class="form-control" name="email" placeholder="Email Anda" required="">
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name="subject" placeholder="Subjek" required="">
          </div>

          <div class="col-md-12">
            <textarea class="form-control" name="message" rows="4" placeholder="Pesan" required=""></textarea>
          </div>

          <div class="col-md-12 text-center">
            <div class="loading">Memuat</div>
            <div class="error-message"></div>
            <div class="sent-message">Pesan Anda Telah Terkirim. Terima Kasih!</div>

            <button type="submit">Kirim Pesan</button>
          </div>

        </div>
      </form>
    </div><!-- End Contact Form -->

  </div>

</div>

</section> <!-- /Contact Section -->
</main>
@endsection