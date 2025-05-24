@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="mb-4 text-center">Login untuk Berkomentar</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
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

            <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </form>

        <div class="text-center mt-3">
            Belum punya akun? <a href="{{ route('register') }}">Buat akun</a>
        </div>
    </div>
</div>
@endsection