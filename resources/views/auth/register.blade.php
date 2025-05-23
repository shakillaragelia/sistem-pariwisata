<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DISPAR BUKITTINGGI</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/src/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/src/assets/images/favicon.png') }}" />
</head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Buat akun</h4>

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('failed'))
    <div class="alert alert-danger mt-2">
        {{ session('failed') }}
    </div>
@endif

<form class="pt-3" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control form-control-lg" name="nama" placeholder="Username" value="{{ old('nama') }}">
    </div>
    <div class="form-group">
        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
    </div>
    <div class="mt-3 d-grid gap-2">
        <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN UP</button>
    </div>
    <div class="text-center mt-4 fw-light"> Sudah punya akun?
        <a href="{{ route('login') }}" class="text-primary">Silahkan login</a>
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

</html>