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
  <section id="event" class="event section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>Event</h2>
      <p>EVENT DI BUKITTINGGI</p>
    </div>

    <div class="container">
      <div class="row">
        @forelse($events as $event)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100 shadow">
            <img src="{{ asset('storage/' . $event->gambar) }}"
                 class="card-img-top"
                 alt="{{ $event->nama }}"
                 style="height: 220px; object-fit: cover; width: 100%; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $event->nama }}</h5>
              <p class="card-text">{{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}</p>
              <button class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalEvent{{ $event->id_event }}">
                Lihat Selengkapnya
              </button>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalEvent{{ $event->id_event }}" tabindex="-1" aria-labelledby="modalEventLabel{{ $event->id_event }}" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalEventLabel{{ $event->id_event }}">{{ $event->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
              </div>
              <div class="modal-body">
                <img src="{{ asset('storage/' . $event->gambar) }}" class="img-fluid mb-3 rounded" alt="{{ $event->nama }}">
                <p>{{ $event->deskripsi }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <div class="alert alert-info">
            Belum ada event saat ini.
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </section>

</main>

@endsection
