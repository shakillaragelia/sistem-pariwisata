@extends('layouts.app')

@section('content')

  <main class="main">

   <!-- Hero Section -->
   <section id="hero" class="hero section dark-background">

<img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">

<div class="container d-flex flex-column align-items-center">
  <h2 data-aos="fade-up" data-aos-delay="100">KRITIK SARAN</h2>
  <!-- <p data-aos="fade-up" data-aos-delay="200">Jelajahi pesona alam, budaya, dan sejarah yang menakjubkan di jantung Sumatera Barat. Temukan destinasi menarik, kuliner khas, dan pengalaman tak terlupakan di Kota Bukittinggi.</p> -->
  <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
  </div>
</div>

</section><!-- /Hero Section -->
 
 <!-- Contact Section -->
 <section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>HUBUNGI KAMI</h2>
  <p>KRITIK & SARAN</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

<div class="row gy-4 align-items-stretch">
  <!-- MAP -->
  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.041445481918!2d100.3574018836855!3d-0.3088317450100831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd538c03ba6f53b%3A0x7ef992ef92aceff0!2sDepartment%20of%20culture%20and%20tourism!5e0!3m2!1sen!2sid!4v1748179923061!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <!-- FORM -->
  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
    <div class="bg-white p-4 shadow rounded h-100">
      <form action="{{ route('kritik.store') }}" method="POST" class="php-email-form">
        @csrf
        <div class="row gy-3">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
          </div>

          <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
          </div>

          <div class="col-12">
            <input type="text" name="subject" class="form-control" placeholder="Subjek" required>
          </div>

          <div class="col-12">
            <textarea name="message" class="form-control" rows="4" placeholder="Pesan" required></textarea>
          </div>

          <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


</section> <!-- /Contact Section -->
</main>
@endsection
@push('scripts')
  @if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
          icon: 'success',
          title: 'Pesan Terkirim!',
          text: '{{ session('success') }}',
          showConfirmButton: false,
          timer: 2000
        });
      });
    </script>
  @endif
@endpush
