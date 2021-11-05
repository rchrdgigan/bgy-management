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
  <section class="invoice" style="border: 8px double black; padding: 20px;">
    <!-- title row -->
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h5 class="page-header" style="font-family: 'Times New Roman', Times, serif;">
          <img src="{{ asset('images/brgy.jpg')}}" width="120" class="rounded-circle" style="position:absolute; left:100px;" alt="">
          <!-- <i class="far fa-address-card fa-7x float-left"></i> -->
          Republic of the <b>Philippines</b><br>
          Municipality of <b>Bulan<br>
          SORSOGON<br>
          Barangay Imelda (Aquino)</b><br>
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info mb-4">
      <div class="col-sm-12 invoice-col text-center">
        <h2 class="page-header mb-4" style="font-family: 'Times New Roman', Times, serif;"><b> OFFICE OF THE PUNONG BARANGAY</b>
        </h2>
        <hr style="border: 5px double black;">
      </div>
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <img src="{{ asset('images/brgy.jpg')}}" width="600" class="rounded-circle" style="position:absolute; left:230px; opacity: 0.2; top:200px;" alt="">

      <div class="col-12">

        <h1 class="mb-4 text-center text-danger" style="font-family:Bodoni MT Black; font-size: 35pt;"><b> BARANGAY BUSINESS CLEARANCE</b>
        </h1>

        <h4 class="mb-4"><b>TO WHOM IT MAY CONCERN:</b></h4>

        <p style="text-indent: 80px; line-height: 40px; font-size:15pt; text-align: justify; text-justify: inter-word;">This is to certify that __________________________________________________________________of Barangay
          B.S Aquino (Imelda), Bulan, Sorsogon with Community Tax No. ______________________ Issued on __________________ MTO Bulan, is hereby granted a Barangay Business Permit to engage in Business _____________________________________________
          within our Barangay effective this date up to (December 31, 2021, and subject further to existing laws and authorities (Memorandum Circular No. 0-02 date November 16, 1992 issued by the Department of Interior and Local Government).</p>
        
        <p style="text-indent: 80px; font-size:15pt;">Issued this ___________________ day of _______________________2021. at the Office of the Punong Barangay.</p>
        
        <p style="font-size: 12pt;" class="mb-4 pt-4">Attested by:</p>
        <div style="text-indent: 50px; font-size: 15pt;" class="col-3 text-center">
          <b><u>IRENE R. HACHERO</u></b>
          <p>Brgy. Secretary</p>
        </div>

        <div style="font-size: 15pt;" class="col-12 text-center mb-5">
          <p style="margin-right: 250px;"><b>Approved by:</b></p>
          <b><u>ARIEL O. GUPIT</u></b>
          <p>Punong Barangay</p>
        </div>

        <div class="col-12 text-center">
          <p style="font-size:15pt; line-height: 40px;">Paid under O.R No. ______________________ issued on ___________________2021. At Barangay Imelda (Aquino), Bulan Sorsogon.</p>
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
