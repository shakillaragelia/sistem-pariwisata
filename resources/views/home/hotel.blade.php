@extends('layouts.app')

@section('content')

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="ragel/ragel/assets/img/jam.jpg" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">HOTEL</h2>
    </div>
  </section>

  <!-- Hotel Section -->
  <section id="hotel" class="hotel section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>Hotel</h2>
      <p>HOTEL DI BUKITTINGGI</p>
    </div>

    <form action="{{ route('hotel.search') }}" method="GET" class="mb-4 d-flex justify-content-center">
          <input type="text" name="search" class="form-control w-50 me-2" placeholder="Cari nama hotel..." value="{{ request('search') }}">
          <button type="submit" class="btn btn-primary">Cari</button>
        </form>

    <div class="container">
      <div class="row gy-5">
        @foreach ($data as $item)
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="card shadow-sm h-100">
              <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                   style="object-fit: cover; height: 220px;" alt="{{ $item->nama }}">
              <div class="card-body">
                <h5 class="card-title">{{ $item->nama }}</h5>
                <p class="card-text text-warning mb-2">
  @for ($i = 0; $i < $item->bintang; $i++)
    <i class="fas fa-star"></i>
  @endfor
</p>                <a href="{{ url('/detail-hotel/' . $item->slug) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

</main>
@endsection
