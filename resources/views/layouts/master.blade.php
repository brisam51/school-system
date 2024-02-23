<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
{{-- title place --}}


  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--start head-->
@include('layouts.head')
   <!--end head-->

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  {{-- start headbar --}}
@include('layouts.main-headerbar')
  {{-- start headbar --}}

  <!-- ======= Sidebar ======= -->
  @include('layouts.main-sidebar')

  <!-- End Sidebar-->
{{-- start main content --}}
<main id="main" class="main" >

    <div class="pagetitle">
      <h1>@yield('maintopic')</h1>
      <nav>
        {{-- I make below change in 14021129 --}}
        {{-- <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">@yield('homepage')</a></li>
          <li class="breadcrumb-item active">@yield('secondpage')</li>
        </ol> --}}
      </nav>
    </div>
    <!-- End Page Title -->

   {{-- start content --}}
@yield('content')
   {{-- end content --}}
  </main>

  {{-- end main content --}}

  <!-- ======= Footer ======= -->
  {{-- @include('layouts.footer') --}}
  <!-- End Footer -->



  <!-- Vendor JS Files -->
  {{-- JavaScriptsLinks --}}

  {{-- end java script links --}}
  @include('layouts.footer-scripts')
</body>

</html>
