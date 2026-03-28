@extends('layouts.app')

@section('content')
<main class="main">

  {{-- Hero --}}
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('storage/' . ($wisata->gambar[0] ?? '')) }}" alt="{{ $wisata->nama }}" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">{{ strtoupper($wisata->nama) }}</h2>
    </div>
  </section>

  {{-- Detail --}}
  <section id="detail-wisata" class="section light-background py-5">
    <div class="container" data-aos="fade-up">

      {{-- Breadcrumb --}}
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/wisata') }}">Wisata</a></li>
          <li class="breadcrumb-item active">{{ $wisata->nama }}</li>
        </ol>
      </nav>

      <div class="row g-5">
        {{-- Carousel kiri --}}
        <div class="col-lg-6">
          <div id="wisataCarousel" class="carousel slide rounded-4 overflow-hidden shadow" data-bs-ride="carousel">
            <div class="carousel-indicators">
              @foreach($wisata->gambar ?? [] as $index => $gambar)
                <button type="button" data-bs-target="#wisataCarousel"
                        data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}">
                </button>
              @endforeach
            </div>
            <div class="carousel-inner">
              @foreach($wisata->gambar ?? [] as $index => $gambar)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                  <img src="{{ asset('storage/' . $gambar) }}"
                       class="d-block w-100"
                       style="height: 420px; object-fit: cover;"
                       alt="{{ $wisata->nama }}">
                </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#wisataCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#wisataCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>

        {{-- Info kanan --}}
        <div class="col-lg-6">
          {{-- Badge kategori --}}
          <span class="badge rounded-pill mb-3" style="background-color: #e8531d; font-size: 13px;">
            {{ $wisata->kategori->nama ?? '-' }}
          </span>

          <h2 class="fw-bold mb-3">{{ $wisata->nama }}</h2>

          {{-- Info dasar --}}
          <div class="d-flex flex-column gap-2 mb-4">
            @if($wisata->lokasi && $wisata->lokasi !== '-')
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-geo-alt-fill text-danger"></i>
              <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($wisata->lokasi) }}"
                 target="_blank" class="text-decoration-none text-muted">
                {{ $wisata->lokasi }}
              </a>
            </div>
            @endif

            @if($wisata->harga > 0)
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-ticket-perforated-fill text-success"></i>
              <span>Rp{{ number_format($wisata->harga, 0, ',', '.') }} / orang</span>
            </div>
            @else
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-ticket-perforated-fill text-success"></i>
              <span class="text-success fw-semibold">Gratis</span>
            </div>
            @endif
          </div>

          {{-- Deskripsi --}}
          <h5 class="fw-bold mb-2">Deskripsi</h5>
          <p class="text-muted" style="text-align: justify; line-height: 1.8;">{{ $wisata->deskripsi }}</p>

          {{-- Fasilitas --}}
          @if($wisata->toilet || $wisata->parkir || $wisata->tempat_ibadah)
          <h5 class="fw-bold mb-3 mt-4">Fasilitas</h5>
          <div class="d-flex gap-3 flex-wrap">
            @if($wisata->parkir)
            <div class="d-flex align-items-center gap-2 bg-white rounded-3 px-3 py-2 shadow-sm border">
              <i class="bi bi-p-square-fill text-primary fs-5"></i>
              <span style="font-size: 14px;">Parkir</span>
            </div>
            @endif
            @if($wisata->toilet)
            <div class="d-flex align-items-center gap-2 bg-white rounded-3 px-3 py-2 shadow-sm border">
              <i class="bi bi-door-open-fill text-info fs-5"></i>
              <span style="font-size: 14px;">Toilet</span>
            </div>
            @endif
            @if($wisata->tempat_ibadah)
            <div class="d-flex align-items-center gap-2 bg-white rounded-3 px-3 py-2 shadow-sm border">
              <i class="bi bi-moon-stars-fill text-warning fs-5"></i>
              <span style="font-size: 14px;">Tempat Ibadah</span>
            </div>
            @endif
          </div>
          @endif

          {{-- Rekomendasi Hotel --}}
          @if($rekomendasiHotel->count() > 0)
          <h5 class="fw-bold mb-3 mt-4">Hotel Terdekat</h5>
          <div class="d-flex flex-column gap-2">
            @foreach($rekomendasiHotel as $hotel)
            <a href="{{ route('detailHotel', ['slug' => $hotel->slug]) }}"
               class="d-flex align-items-center gap-3 bg-white rounded-3 p-3 shadow-sm border text-decoration-none text-dark">
              <i class="bi bi-building fs-5 text-warning"></i>
              <div>
                <div class="fw-semibold" style="font-size: 14px;">{{ $hotel->nama }}</div>
                <small class="text-muted">{{ number_format($hotel->distance, 2) }} km dari sini</small>
              </div>
              <i class="bi bi-chevron-right ms-auto text-muted"></i>
            </a>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>

  {{-- Rating --}}
<section class="section py-4" style="background: #f8f9fa;">
  <div class="container" data-aos="fade-up">
    @php 
      $avgRating = $wisata->averageRating(); 
      $totalRating = $wisata->ratings()->count(); 
    @endphp

    <div class="row g-4 align-items-start">
      {{-- Rata-rata rating --}}
      <div class="col-lg-3 text-center">
        <div class="bg-white rounded-4 p-4 shadow-sm border">
          <h1 class="fw-bold mb-0" style="font-size: 3rem; color: #e8531d;">{{ $avgRating ?: '-' }}</h1>
          <div class="my-2">
            @for($i = 1; $i <= 5; $i++)
              <i class="bi bi-star-fill {{ $i <= $avgRating ? 'text-warning' : 'text-muted' }}"></i>
            @endfor
          </div>
          <small class="text-muted">{{ $totalRating }} ulasan</small>
        </div>
      </div>

      {{-- Form rating --}}
      <div class="col-lg-9">
        <div class="bg-white rounded-4 p-4 shadow-sm border">
          <h5 class="fw-bold mb-3">Beri Penilaian</h5>
          @if(auth()->check() && auth()->user()->role === 'user')
            @php $userRating = $wisata->ratings()->where('id_user', auth()->id())->value('rating'); @endphp
            <p class="text-muted small mb-3">Kamu sudah mengunjungi {{ $wisata->nama }}? Bagikan pengalamanmu!</p>
            <form action="{{ route('rating.store') }}" method="POST">
              @csrf
              <input type="hidden" name="rateable_id" value="{{ $wisata->id_wisata }}">
              <input type="hidden" name="rateable_type" value="wisata">
              <div class="d-flex align-items-center gap-3">
                <span style="font-size: 14px;" class="text-muted">Rating kamu:</span>
                <div class="d-flex gap-1">
                  @for($i = 1; $i <= 5; $i++)
                    <label style="cursor: pointer; font-size: 2rem; color: {{ $i <= ($userRating ?? 0) ? '#ffc107' : '#ccc' }}; transition: color 0.2s;"
                           onmouseover="highlightStars({{ $i }})"
                           onmouseout="resetStars({{ $userRating ?? 0 }})">
                      <input type="radio" name="rating" value="{{ $i }}" style="display: none;"
                             onchange="this.form.submit()">
                      <i class="bi bi-star-fill" id="star-{{ $i }}"></i>
                    </label>
                  @endfor
                </div>
                @if($userRating)
                  <span class="badge rounded-pill bg-success">Kamu memberi {{ $userRating }} bintang</span>
                @endif
              </div>
            </form>
          @else
            <div class="alert alert-light border d-flex align-items-center gap-3 rounded-3 mb-0">
              <i class="bi bi-star text-warning fs-5"></i>
              <div>
                <a href="{{ route('login.user') }}" class="fw-semibold text-decoration-none">Login</a>
                untuk memberi rating pada destinasi ini.
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function highlightStars(n) {
    for (let i = 1; i <= 5; i++) {
      document.getElementById('star-' + i).parentElement.style.color = i <= n ? '#ffc107' : '#ccc';
    }
  }
  function resetStars(n) {
    for (let i = 1; i <= 5; i++) {
      document.getElementById('star-' + i).parentElement.style.color = i <= n ? '#ffc107' : '#ccc';
    }
  }
</script>

  {{-- Komentar --}}
  <section class="section py-5">
    <div class="container" data-aos="fade-up">
      <h4 class="fw-bold mb-4">Komentar</h4>

      @if(auth()->check() && auth()->user()->role === 'user')
        <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
          @csrf
          <input type="hidden" name="id" value="{{ $wisata->id_wisata }}">
          <input type="hidden" name="type" value="wisata">
          <div class="mb-3">
            <textarea name="komentar" class="form-control rounded-3" rows="3"
                      placeholder="Bagikan pengalaman kamu..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary px-4">Kirim Komentar</button>
        </form>
      @else
        <div class="alert alert-light border d-flex align-items-center gap-3 rounded-3">
          <i class="bi bi-lock-fill text-muted fs-5"></i>
          <div>
            Silakan <a href="{{ route('login.user') }}" class="fw-semibold text-decoration-none">login</a>
            untuk memberikan komentar.
          </div>
        </div>
      @endif

      <div class="komentar-list mt-4">
        @forelse($wisata->komentar as $komen)
          <div class="d-flex gap-3 mb-4">
            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center flex-shrink-0"
                 style="width: 42px; height: 42px;">
              <i class="bi bi-person-fill text-white"></i>
            </div>
            <div class="flex-grow-1">
              <div class="bg-white rounded-3 p-3 shadow-sm border">
                <div class="d-flex justify-content-between mb-1">
                  <strong style="font-size: 14px;">{{ $komen->user->name ?? 'Anonim' }}</strong>
                  <small class="text-muted">{{ $komen->created_at->format('d M Y') }}</small>
                </div>
                <p class="mb-0 text-muted" style="font-size: 14px;">{{ $komen->komentar }}</p>
              </div>
            </div>
          </div>
        @empty
          <div class="text-center py-4 text-muted">
            <i class="bi bi-chat-dots fs-1 d-block mb-2"></i>
            Belum ada komentar. Jadilah yang pertama!
          </div>
        @endforelse
      </div>
    </div>
  </section>

</main>
@endsection