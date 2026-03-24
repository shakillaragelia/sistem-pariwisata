<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
      <img src="{{ asset('ragel/ragel/assets/img/logobkt.png') }}" alt="Logo" style="height: 40px;" class="me-2">
      <h1 class="sitename">DISPAR BUKITTINGGI</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">Tentang</a></li>
        <li><a href="{{ url('/wisata') }}" class="{{ request()->is('wisata*') ? 'active' : '' }}">Wisata</a></li>
        <li><a href="{{ url('/event') }}" class="{{ request()->is('event') ? 'active' : '' }}">Event</a></li>
        <li><a href="{{ url('/hotel') }}" class="{{ request()->is('hotel*') ? 'active' : '' }}">Hotel</a></li>
        <li><a href="{{ url('/saran') }}" class="{{ request()->is('saran') ? 'active' : '' }}">Kontak</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    {{-- Ikon Search --}}
    <a href="#" id="searchToggleBtn" title="Cari" style="font-size:1.3rem; color:inherit; margin-left:12px;">
      <i class="bi bi-search"></i>
    </a>

    {{-- Ikon User: login / dropdown logout --}}
    @auth
      @if(auth()->user()->role === 'user')
        <div class="dropdown" style="margin-left:10px;">
          <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" style="font-size:1.3rem; color:inherit; text-decoration:none;" title="{{ auth()->user()->name }}">
            <i class="bi bi-person-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><span class="dropdown-item-text fw-bold">{{ auth()->user()->name }}</span></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ url('/logout-user') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                  <i class="bi bi-box-arrow-right me-1"></i> Keluar
                </button>
              </form>
            </li>
          </ul>
        </div>
      @endif
    @else
      <a href="{{ route('login.user') }}" title="Login" style="font-size:1.3rem; color:inherit; margin-left:10px;">
        <i class="bi bi-person-circle"></i>
      </a>
    @endauth

  </div>

  {{-- Search bar yang muncul di bawah header --}}
  <div id="searchBar" style="display:none; position:absolute; top:100%; left:0; right:0; background:#fff; padding:10px 24px; box-shadow:0 4px 12px rgba(0,0,0,0.12); z-index:9999;">
    <form action="{{ route('wisata.search') }}" method="GET" class="d-flex gap-2 align-items-center">
      <input type="text" name="search" id="searchInput" class="form-control" placeholder="Cari wisata berdasarkan nama..." value="{{ request('search') }}" autocomplete="off">
      <button type="submit" class="btn btn-primary px-4">Cari</button>
      <button type="button" id="searchCloseBtn" class="btn btn-outline-secondary"><i class="bi bi-x-lg"></i></button>
    </form>
  </div>

</header>

{{-- Script toggle search bar --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var btn   = document.getElementById('searchToggleBtn');
    var bar   = document.getElementById('searchBar');
    var close = document.getElementById('searchCloseBtn');
    var inp   = document.getElementById('searchInput');

    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var showing = bar.style.display === 'block';
      bar.style.display = showing ? 'none' : 'block';
      if (!showing) inp.focus();
    });

    if (close) {
      close.addEventListener('click', function () {
        bar.style.display = 'none';
      });
    }
  });
</script>
