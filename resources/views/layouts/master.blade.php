
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--@yield('title')-->
  <title>Barangay Aquino</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('vendor/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/dist/css/adminlte.min.css') }}">
</head>
<marquee class="bg-primary" style="width:100%; top:0; position: absolute;">

  <em>Barangay Benigno S. Aquino Bulan Sorsogon</em> 
  &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; 

  <em>VISION</em>
  &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;

  <em>Isang maunlad na barangay na kung saan matatagpuan ang paliparan ng bulan, na may malinis at malasakit sa
  kapaligiran matatag na ekonomiya, mapayapa, makadiyos , at disiplinadong mamamayan, na pinamumunuan ng mga
  tapat na barangay opisyal.</em>
  &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
  
  <em>MISSION</em>
  &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;

  <em>Maiangat ang antas ng pamumuhay sa pamamagitan ng pagsasanay ng kapasidad sa buong barangay na maging
  responsable sa kanilang pamilya at kapaligiran.</em>
  &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;

</marquee>
<body class="hold-transition login-page"  style="background-image: url({{ asset('images/bgframe.png')}}); background-repeat: no-repeat; background-attachment: fixed;
  background-size: cover;">
@yield('content')
</body>
</html>
<!-- jQuery -->
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>
