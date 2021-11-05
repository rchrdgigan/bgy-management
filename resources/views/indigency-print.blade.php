<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barangay Clearance</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('vendor/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="wrapper" >
  <!-- Main content -->
  <section class="invoice" style="padding: 100px;">
    <!-- title row -->
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h5 class="page-header" style="font-family: 'Times New Roman', Times, serif;">
          <img src="{{ asset('images/brgy.jpg')}}" width="140" class="rounded-circle" style="position:absolute; left:100px;" alt="">
          <!-- <i class="far fa-address-card fa-7x float-left"></i> -->
          Republic of the Philippines<br>
          Municipality of Bulan<br>
          <b>SORSOGON</b><br>
          Barangay Imelda (Aquino)<br>
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col text-center">
        <h5 class="page-header" style="font-family: 'Times New Roman', Times, serif;"><b> OFFICE OF THE PUNONG BARANGAY</b>
        </h5>
        <hr style="border: 1px solid black; margin-top: -2px;">
      </div>
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <img src="{{ asset('images/brgy.jpg')}}" width="600" class="rounded-circle" style="position:absolute; left:230px; opacity: 0.2; top:200px;" alt="">

      <div class="col-12">

        <h1 class="mb-4 text-center text-primary" style="font-family:Algerian; font-size: 35pt;"><b> CERTIFICATE OF INDIGENCY</b>
        </h1>

        <h4 class="mb-4"><b>TO WHOM IT MAY CONCERN:</b></h4>

        <p style="text-indent: 80px; line-height: 40px; font-size:15pt; text-align: justify; text-justify: inter-word;">This is to certify that _________________________________________________, legal age,________,
          resident of Purok ______, Brgy. (Imelda), Aquino, Bulan Sorsogon.</p>
        
        <p style="text-indent: 80px; font-size:15pt;">This further certify that the above mentioned name is one of the indigent family of
          this Barangay.</p>

        <p style="text-align: center; font-size:15pt;">Thus she is asking _______________________________________ assistance from your good office.</p>
        <p style="text-indent: 80px; font-size:15pt;">Given this __________________ day of ____________________ 2021.</p>

        <div style="font-size: 15pt;" class="col-12 text-center pt-5">
          <p style="margin-right: 250px;"><b>Certified by:</b></p>
          <b><u>ARIEL O. GUPIT</u></b>
          <p>Punong Barangay</p>
        </div>
        
        <p style="font-size: 15pt; font-weight: bold;" class="pt-5">Attested by:</p>
        <div style="text-indent: 50px; font-size: 15pt;" class="col-4 text-center">
          <b><u>IRENE R. HACHERO</u></b>
          <p>Brgy. Secretary</p>
        </div>

       

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
