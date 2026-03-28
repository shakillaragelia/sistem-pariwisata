@extends('layouts.app')

@section('content')
<main class="main">

  {{-- Hero --}}
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('ragel/ragel/assets/img/jam.jpg') }}" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
      <h2 data-aos="fade-up" data-aos-delay="100">HOTEL</h2>
    </div>
  </section>

  {{-- Hotel Section --}}
  <section id="hotel" class="hotel section light-background py-5">
    <div class="container section-title" data-aos="fade-up">
      <h2>Hotel</h2>
      <p>HOTEL DI BUKITTINGGI</p>
    </div>

    {{-- Search --}}
    <form action="{{ route('hotel.search') }}" method="GET" class="mb-5 d-flex justify-content-center px-3">
      <input type="text" name="search" class="form-control w-50 me-2 rounded-3"
             placeholder="Cari nama hotel..." value="{{ request('search') }}">
      <button type="submit" class="btn btn-primary px-4 rounded-3">Cari</button>
    </form>

    <div class="d-flex justify-content-center gap-2 mb-4 flex-wrap">
  <a href="{{ url('/hotel') }}"
     class="btn btn-sm {{ !request('bintang') ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill">
    Semua
  </a>
  @for($i = 1; $i <= 5; $i++)
  <a href="{{ url('/hotel?bintang=' . $i) }}"
     class="btn btn-sm {{ request('bintang') == $i ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill">
    {{ $i }} <i class="bi bi-star-fill text-warning"></i>
  </a>
  @endfor
</div>

    <div class="container">
      <div class="row gy-4">
        @forelse($data as $item)
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="{{ asset('storage/' . ($item->gambar[0] ?? '')) }}"
                     class="card-img-top"
                     style="object-fit: cover; height: 220px;"
                     alt="{{ $item->nama }}">
                {{-- Badge bintang --}}
                @if($item->bintang)
                <div class="position-absolute top-0 end-0 m-2 bg-white rounded-pill px-2 py-1 shadow-sm"
                     style="font-size: 12px;">
                  @for($i = 0; $i < $item->bintang; $i++)
                    <i class="bi bi-star-fill text-warning"></i>
                  @endfor
                </div>
                @endif
              </div>
              @php $avg = $item->averageRating(); @endphp
@if($avg)
<p class="text-muted small mb-2">
  @for($i = 1; $i <= 5; $i++)
    <i class="bi bi-star-fill {{ $i <= $avg ? 'text-warning' : 'text-muted' }}"></i>
  @endfor
  <span class="ms-1">{{ $avg }} ({{ $item->ratings()->count() }})</span>
</p>
@endif

              <div class="card-body d-flex flex-column p-4">
                <h5 class="card-title fw-bold mb-1">{{ $item->nama }}</h5>

                @if($item->lokasi)
                <p class="text-muted small mb-2">
                  <i class="bi bi-geo-alt me-1"></i>{{ Str::limit($item->lokasi, 40) }}
                </p>
                @endif

                @if($item->harga_mulai)
                <p class="text-muted small mb-3">
                  <i class="bi bi-cash me-1"></i>
                  Mulai Rp{{ number_format($item->harga_mulai) }} / malam
                </p>
                @endif

                <a href="{{ url('/detail-hotel/' . $item->slug) }}"
                   class="btn btn-primary btn-sm mt-auto rounded-3">
                  Lihat Detail
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center py-5">
            <i class="bi bi-building fs-1 text-muted d-block mb-3"></i>
            <p class="text-muted">Belum ada hotel yang tersedia.</p>
          </div>
        @endforelse
      </div>

      {{-- Pagination --}}
      @if(method_exists($data, 'links'))
      <div class="d-flex justify-content-center mt-5">
        {{ $data->links() }}
      </div>
      @endif
    </div>
  </section>

</main>
@endsection