@extends('layouts.app')

@section('content')

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('ragel/ragel/assets/img/jam.jpg') }}" alt="" data-aos="fade-in">
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
        @php
          $today = now()->toDateString();
          $mulai = $event->tanggal_mulai?->toDateString();
          $selesai = $event->tanggal_selesai?->toDateString();

          if ($mulai && $today < $mulai) {
            $status = 'Akan Datang';
            $badgeClass = 'bg-primary';
          } elseif ($mulai && $selesai && $today >= $mulai && $today <= $selesai) {
            $status = 'Sedang Berlangsung';
            $badgeClass = 'bg-success';
          } else {
            $status = 'Selesai';
            $badgeClass = 'bg-secondary';
          }
        @endphp

        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
          <div class="card h-100 shadow border-0">
            <!-- Gambar + Badge Status -->
            <div class="position-relative">
              <img src="{{ asset('storage/' . ($event->gambar[0] ?? '')) }}"
                   class="card-img-top"
                   alt="{{ $event->judul }}"
                   style="height: 220px; object-fit: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
              <span class="badge {{ $badgeClass }} position-absolute top-0 end-0 m-2">
                {{ $status }}
              </span>
            </div>

            <div class="card-body d-flex flex-column">
              <h5 class="card-title fw-bold">{{ $event->judul }}</h5>

              <!-- Tanggal -->
              <p class="text-muted small mb-1">
                <i class="bi bi-calendar-event me-1"></i>
                {{ $event->tanggal_mulai?->format('d M Y') ?? '-' }}
                @if($event->tanggal_selesai)
                  — {{ $event->tanggal_selesai->format('d M Y') }}
                @endif
              </p>

              <!-- Lokasi -->
              @if($event->lokasi)
              <p class="text-muted small mb-2">
                <i class="bi bi-geo-alt me-1"></i> {{ $event->lokasi }}
              </p>
              @endif

              <p class="card-text text-muted flex-grow-1">
                {{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}
              </p>

              <button class="btn btn-sm btn-outline-primary mt-2 align-self-start"
                      data-bs-toggle="modal"
                      data-bs-target="#modalEvent{{ $event->id_event }}">
                Lihat Selengkapnya
              </button>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalEvent{{ $event->id_event }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <div>
                  <h5 class="modal-title fw-bold">{{ $event->judul }}</h5>
                  <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
              </div>
              <div class="modal-body">
                {{-- Carousel --}}
                @if(count($event->gambar ?? []) > 1)
                  <div id="carouselEvent{{ $event->id_event }}" class="carousel slide mb-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      @foreach($event->gambar as $index => $gambar)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                          <img src="{{ asset('storage/' . $gambar) }}"
                               class="d-block w-100 rounded"
                               style="height: 300px; object-fit: cover;"
                               alt="{{ $event->judul }}">
                        </div>
                      @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEvent{{ $event->id_event }}" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselEvent{{ $event->id_event }}" data-bs-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </button>
                  </div>
                @else
                  <img src="{{ asset('storage/' . ($event->gambar[0] ?? '')) }}"
                       class="img-fluid mb-3 rounded"
                       style="height: 300px; object-fit: cover; width: 100%;"
                       alt="{{ $event->judul }}">
                @endif

                {{-- Info tanggal & lokasi --}}
                <div class="d-flex gap-3 mb-3 flex-wrap">
                  <span class="text-muted">
                    <i class="bi bi-calendar-event me-1"></i>
                    {{ $event->tanggal_mulai?->format('d M Y') ?? '-' }}
                    @if($event->tanggal_selesai)
                      — {{ $event->tanggal_selesai->format('d M Y') }}
                    @endif
                  </span>
                  @if($event->lokasi)
                  <span class="text-muted">
                    <i class="bi bi-geo-alt me-1"></i> {{ $event->lokasi }}
                  </span>
                  @endif
                </div>

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
          <div class="alert alert-info">Belum ada event saat ini.</div>
        </div>
        @endforelse
      </div>
    </div>
  </section>

</main>

@endsection