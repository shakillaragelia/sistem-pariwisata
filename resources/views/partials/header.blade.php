<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid px-lg-5 d-flex align-items-center justify-content-between">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('ragel/ragel/assets/img/logobkt.png') }}" alt="Logo" style="height: 40px;" class="me-2">
      <h1 class="sitename">DISPAR BUKITTINGGI</h1>
    </a>

    <div class="d-flex align-items-center">
      <nav id="navmenu" class="navmenu me-lg-4 me-3">
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

      {{-- Ikon Search & User --}}
      <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="#" id="searchToggleBtn" title="Cari" style="font-size:1.3rem; color:inherit; text-decoration:none;">
          <i class="bi bi-search"></i>
        </a>

        {{-- Dropdown User --}}
        <div class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:1.4rem; color:inherit;">
            <i class="bi bi-person-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 p-0" aria-labelledby="navbarDropdown" style="border-radius:12px; overflow:hidden; min-width:200px; z-index:9999;">
            @auth
              <li class="bg-primary text-white p-3 text-center">
                <small class="d-block opacity-75">Halo,</small>
                <div class="fw-bold">{{ auth()->user()->name }}</div>
              </li>
              <li>
                <form action="{{ url('/logout-user') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item py-2 text-danger text-center">
                    <i class="bi bi-box-arrow-right me-2"></i> Keluar
                  </button>
                </form>
              </li>
            @else
              <li class="p-2">
                <a class="dropdown-item py-2 rounded mb-1" href="{{ route('login.user') }}" style="background:rgba(13, 110, 253, 0.1); color:#0d6efd;">
                   <i class="bi bi-box-arrow-in-right me-2"></i> Masuk (Login)
                </a>
                <a class="dropdown-item py-2 rounded" href="{{ url('/register') }}">
                   <i class="bi bi-person-plus me-2 text-success"></i> Daftar Akun
                </a>
              </li>
            @endauth
          </ul>
        </div>
      </div>
    </div>

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
