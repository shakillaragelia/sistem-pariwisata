
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.blade.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="ragel/ragel/assets/img/logobkt.png" alt=""> 
        <h1 class="sitename">DISPAR BUKITTINGGI</h1>
      </a>

      <nav id="navmenu" class="navmenu">
  <ul>
    <li><a href="index" class="{{ request()->is('beranda') ? 'active' : '' }}">Beranda</a></li>
    <li><a href="about" class="{{ request()->is('about') ? 'active' : '' }}">Tentang</a></li>
    <li><a href="wisata" class="{{ request()->is('wisata') ? 'active' : '' }}">Wisata</a></li>
    <li><a href="event" class="{{ request()->is('event') ? 'active' : '' }}">Event</a></li>
    <li><a href="hotel" class="{{ request()->is('hotel') ? 'active' : '' }}">Hotel</a></li>
    <li><a href="kontak" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a></li>
  </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>


      <!-- <a class="cta-btn" href="index.blade.php#about">Get Started</a> -->

    </div>
  </header>