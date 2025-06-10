@extends('layouts.auth')

@section('content')
<div class="form-container mt-5">
  <h2 class="text-center">Daftar Akun Baru</h2>

  {{-- Tampilkan error validasi secara umum --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}" class="mx-auto mt-4" style="max-width: 400px;">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
      @error('name')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
      @error('email')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
      @error('password')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
      <input type="password" name="password_confirmation" class="form-control" required>
      @error('password_confirmation')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">Daftar</button>
  </form>

  <p class="text-center mt-3">&copy; 2025 DISPAR BUKITTINGGI. All rights reserved.</p>
</div>
@endsection
