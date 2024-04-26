<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>@yield('title')</title>
    <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
   <link  type="text/css" href="{{ url('assets/css/virtual-select.min.css') }}"  rel="stylesheet">
   <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
   <link href="{{ url('assets/css/mycss.css') }}" rel="stylesheet">
  @yield('style')

</head>

<body>

  {{-- start headbar --}}
@include('layouts.main-headerbar')
  {{-- start headbar --}}

  <!-- ======= Sidebar ======= -->
  @include('layouts.main_sidebar')

  <!-- End Sidebar-->
{{-- start main content --}}
<main id="main" class="main" >

      <h1>@yield('maintopic')</h1>

@yield('content')
   {{-- end content --}}
  </main>


  {{-- end java script links --}}
  <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ url('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

{{-- for multi select --}}
<script type="text/javascript" src="{{ url('assets/js/virtual-select.min.js') }}">
    VirtualSelect.init({
  ele: '#multiplSelect'
});
</script>
  <!-- Template Main JS File -->

  <script src="{{ url('assets/js/jquery/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ url('assets/js/main.js') }}"></script>


 @yield('scripts')
</body>

</html>
