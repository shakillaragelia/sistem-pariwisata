<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/src/assets/vendors/feather/feather.css')}}">
  <link rel=" stylesheet" href="{{asset('admin/src/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel=" stylesheet" href="{{asset('admin/src/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel=" stylesheet" href="{{asset('admin/src/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel=" stylesheet" href="{{asset('admin/src/assets/vendors/typicons/typicons.css')}}">
  <link rel=" stylesheet" href="{{asset('admin/src/assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel=" stylesheet" href="{{asset('admin/src/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel=" stylesheet"
    href="{{asset('admin/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel=" stylesheet" href="{{asset('admin/src/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel=" stylesheet" type="text/css" href="admin/assets/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel=" stylesheet" href="{{asset('admin/src/assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/src/assets/images/favicon.png')}}" />
</head>


<body>
  <!-- Header -->
  @include('partials.admin-header')

  <!-- Main Content -->
  <main>
    @yield('content-admin')
  </main>

  <!-- Footer -->
  @include('partials.admin-footer')

  <!-- partial -->
  <!-- main-panel ends -->
  <!-- page-body-wrapper ends -->
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('admin/src/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('admin/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('admin/src/assets/vendors/chart.js')}}/chart.umd.js')}}"></script>
  <script src="{{asset('admin/src/assets/vendors/progressbar.js')}}/progressbar.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/src/assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/src/assets/js/template.js')}}"></script>
  <script src="{{asset('admin/src/assets/js/settings.js')}}"></script>
  <script src="{{asset('admin/src/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/src/assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin/src/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/src/assets/js/dashboard.js')}}"></script>
  <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
</body>

</html>