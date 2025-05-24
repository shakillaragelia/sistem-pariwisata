@extends('layouts.auth')

@section('content')
<div class="form-container mt-5">
  <h2 class="text-center">Daftar Akun Baru</h2>
  <form method="POST" action="{{ route('register') }}" class="mx-auto mt-4" style="max-width: 400px;">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Daftar</button>
  </form>
</div>
@endsection
