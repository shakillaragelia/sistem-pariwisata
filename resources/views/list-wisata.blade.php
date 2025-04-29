@extends('layouts.app')

@section('content')

<main>
<!-- resources/views/list-wisata.blade.php -->

<section id="list-wisata" class="section">
  <div class="container">
    <div class="section-title">
      <h2>Wisata</h2>
      <p>Destinasi Pilihan</p>
    </div>

    <div class="row">
      @foreach($wisatas as $wisata)
        <div class="col-12 mb-4">
          <div class="card shadow-sm border-0">
            <div class="row g-0">
              <div class="col-md-4">
              <img src="{{ asset('ragel/ragel/assets/img/sejarah-4.jpg/' . $wisata->gambar) }}" class="img-fluid rounded-start" alt="{{ $wisata->nama }}">


              </div>
              <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-between h-100">
                  <div>
                    <h5 class="card-title">{{ $wisata->nama }}</h5>
                    <p class="card-text">{{ Str::limit($wisata->deskripsi, 150) }}</p>
                  </div>
                  <a href="{{ route('detail-wisata', $wisata->id) }}" class="btn btn-primary mt-3" style="width: fit-content;">Lihat Detail</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
</main>
@end