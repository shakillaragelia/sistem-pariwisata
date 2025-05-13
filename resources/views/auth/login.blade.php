@extends('layouts.main')
@section('content-admin')

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{asset('profil/img/logo.png')}}" class="navbar-logo">
                            </div>
                         
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if (session('failed'))
        <div class="alert alert-danger mt-2">
            {{ session('failed') }}
        </div>
    @endif

    <div class="form-group">
        <input type="email" class="form-control form-control-lg" name="email"
            placeholder="Email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-lg" name="password"
            placeholder="Password">
    </div>
    <div class="mt-3 d-grid gap-2">
        <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN IN</button>
    </div>

    <div class="text-center mt-4 fw-light"> Buat akun baru ?
        <a href="{{ route('register') }}" class="text-primary">Buat akun</a>
    </div>
</form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/src/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/src/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/template.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>
@endsection