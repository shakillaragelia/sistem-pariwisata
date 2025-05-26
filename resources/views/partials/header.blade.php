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
        <li><a href="{{ url('/wisata') }}" class="{{ request()->is('wisata') ? 'active' : '' }}">Wisata</a></li>
        <li><a href="{{ url('/event') }}" class="{{ request()->is('event') ? 'active' : '' }}">Event</a></li>
        <li><a href="{{ url('/hotel') }}" class="{{ request()->is('hotel') ? 'active' : '' }}">Hotel</a></li>
        <li><a href="{{ url('/kontak') }}" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a></li>
        <li>
          <form action="{{ url('/logout-user') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-link nav-link {{ request()->is('keluar') ? 'active' : '' }}" style="padding: 0; border: none; background: none;">
              KELUAR
            </button>
          </form>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>
