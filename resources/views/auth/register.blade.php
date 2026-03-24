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
      <label for="password" class="form-label text-start d-block">Password</label>
      <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
          <i class="bi bi-eye"></i>
        </button>
      </div>
      @error('password')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label text-start d-block">Konfirmasi Password</label>
      <div class="input-group">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ulangi password" required>
        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation">
          <i class="bi bi-eye"></i>
        </button>
      </div>
      @error('password_confirmation')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-4 mt-4">
      <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 8px;">Daftar Akun</button>
    </div>
  </form>

  <p class="text-center mt-3 text-muted">&copy; {{ date('Y') }} DISPAR BUKITTINGGI. All rights reserved.</p>
</div>

@push('scripts')
<script>
  document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');
      const input = document.getElementById(targetId);
      const icon = this.querySelector('i');

      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      }
    });
  });
</script>
@endpush
@endsection
