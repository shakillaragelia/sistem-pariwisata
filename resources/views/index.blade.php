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

  <!-- Wisata Section -->
  <section id="wisata" class="wisata section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Wisata</h2>
      <p>Kategori Wisata<br></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-5">

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="wisata-item">
            <div class="img">
              <img src="ragel/ragel/assets/img/sejarah.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <a href="sejarah" class="stretched-link">
                <h3>Wisata Sejarah</h3>
              </a>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis.</p>
            </div>
          </div>
        </div><!-- End Wisata Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="wisata-item">
            <div class="img">
              <img src="ragel/ragel/assets/img/sejarah-2.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="detail" class="stretched-link">
                <h3>Wisata Alam</h3>
              </a>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
            </div>
          </div>
        </div><!-- End Wisata Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="wisata-item">
            <div class="img">
              <img src="ragel/ragel/assets/img/sejarah-3.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="detail" class="stretched-link">
                <h3>Wisata Kuliner</h3>
              </a>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
            </div>
          </div>
        </div><!-- End Wisata Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="wisata-item">
            <div class="img">
              <img src="ragel/ragel/assets/img/sejarah-4.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="list-wisata" class="stretched-link">
                <h3>Wisata Seni dan Budaya</h3>
              </a>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
            </div>
          </div>
        </div><!-- End Wisata Item -->
      </div>
    </div>
  </section><!-- /Wisata Section -->

    <!-- blog Section -->
    <section id="blog" class="blog section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>IKON KOTA</h2>
        <p>IKON KOTA BUKITTINGGI </p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 blog-item isotope-item filter-app">
              <div class="blog-content h-100">
                <img src="ragel/ragel/assets/img/ikon-1.jpg" class="img-fluid" alt="">
                <div class="blog-info">
                  <h4>Jam Gadang</h4>
                  <p>Tekan Gambar Untuk Tampilan Yang Lebih Besar</p>
                  <a href="ragel/ragel/assets/img/ikon-1.jpg" title="Jam Gadang Merupakan salah satu Cagar Budaya yang ada di Kota Bukittingi" data-gallery="blog-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div><!-- End blog Item -->

            <div class="col-lg-4 col-md-6 blog-item isotope-item filter-app">
  <div class="blog-content h-100">
    <img src="ragel/ragel/assets/img/ikon-2.jpg" class="img-fluid" alt="">
    <div class="blog-info">
      <h4>Karupuak Sanjai</h4>
      <p>Tekan Gambar Untuk Tampilan Yang Lebih Besar</p>
      <a href="ragel/ragel/assets/img/ikon-2.jpg" title="Karupuak Sanjai" data-gallery="blog-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
    </div>
  </div>
</div><!-- End blog Item -->


            <div class="col-lg-4 col-md-6 blog-item isotope-item filter-app">
              <div class="blog-content h-100">
                <img src="ragel/ragel/assets/img/ikon-3.jpg" class="img-fluid" alt="">
                <div class="blog-info">
                  <h4>Ngarai Sianok</h4>
                  <p>Tekan Gambar Untuk Tampilan Yang Lebih Besar</p>
                  <a href="ragel/ragel/assets/img/ikon-3.jpg" title="Ngarai Sianok salah satu cagar alama yang ada di Kota Bukittinggi" data-gallery="blog-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div><!-- End blog Item -->
          </div><!-- End blog Container -->
        </div>
      </div>
      </div>
    </section><!-- /blog Section -->
</main>
@endsection
