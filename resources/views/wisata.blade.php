@extends('layouts.app')

@section('content')

<main class="main">
 
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

    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
      <div class="wisata-item">
        <div class="img">
          <img src="ragel/ragel/assets/img/sejarah-2.jpg" class="img-fluid" alt="">
        </div>
        <div class="details position-relative">
          <div class="icon">
            <i class="bi bi-broadcast"></i>
          </div>
          <a href="detail" class="stretched-link">
            <h3>Wisata Alam </h3>
          </a>
          <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
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
          <a href="senbud-detail" class="stretched-link">
            <h3>Wisata Seni dan Budaya</h3>
          </a>
          <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
        </div>
      </div>
    </div><!-- End Wisata Item -->
  </div>
</div>
</section><!-- /Wisata Section -->
</main>
@endsection