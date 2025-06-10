@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="mb-4 text-center">Login untuk Berkomentar</h4>

        {{-- Tampilkan pesan error dari session --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Tampilkan pesan sukses dari session --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tampilkan error dari validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.user') }}" method="POST">
            @csrf
            @if (request()->has('redirect'))
                <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
            @endif

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            Belum punya akun? <a href="{{ route('register') }}">Buat akun</a>
        </div>
    </div>
</div>
@endsection
