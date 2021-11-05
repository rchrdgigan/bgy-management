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
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12 text-center">
        <h5 class="page-header">
          <img src="{{ asset('images/brgy.jpg')}}" width="160" class="rounded-circle" style="position:absolute; left:100px;" alt="">
          <!-- <i class="far fa-address-card fa-7x float-left"></i> -->
          Republic of the Philippines<br>
          MUNICIPALITY OF BULAN<br>
          Provice of Sorsogon<br>
          OFFICE OF THE PUNONG BARANGAY<br>
          Barangay B.S. Aquino (Imelda)<br>
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">

      <div class="col-sm-12 invoice-col text-center">
        <h1 class="page-header text-danger"><b> BARANGAY CLEARANCE</b>
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table">
          <img src="{{ asset('images/brgy.jpg')}}" width="600" class="rounded-circle" style="position:absolute; left:250px; opacity: 0.2; top:100px;" alt="">
          @foreach($issue_clearance as $d2)

          <thead>
            <tr>
              <th colspan="4" class="text-center p-0 bg-dark  border-left border-right"><span class="text-xl text-warning">CERTIFY THAT PER RECORD</span></th>
            </tr>
            <tr>
              <th class="p-0 pl-2 border-left">NAME: (LAST)</th>
              <th class="p-0">(FIRST)</th>
              <th class="p-0">(MI.)</th>
              <th class="p-0 pl-2 border-left border-right">STATUS:</th>
            </tr>
          </thead>

          <tbody>
            @foreach($d2->resident_issue_certificate->take(1) as $sub_d1)
            <tr>
              <td class="p-1 pl-2  border-left">{{$sub_d1->lname}}</td>
              <td class="p-1">{{$sub_d1->fname}}</td>
              <td class="p-1">{{$sub_d1->mname}}</td>
              <td class="border-left p-1 pl-2 border-right">{{$sub_d1->status_p}}</td>
            </tr>
            <tr>
              <th colspan="4" class="p-0 border-left pl-2 border-right">BONAFIDE RESIDENT OF THIS BARANGAY, WHOSE ADDRESS IS AT:</th>
            </tr>
            <tr>
              <td colspan="4" class="text-center p-1 border-left border-right text-uppercase">Purok {{$sub_d1->purok}}, {{$sub_d1->street}}, B.S AQUINO (IMELDA), BULAN, SORSOGON</td>
            </tr>
            <tr>
              <th colspan="2" class="p-0 pl-2 border-left">BIRTHDATE:</th>
              <th colspan="2" class="p-0 pl-2 border-left border-right">BIRTHPLACE:</th>
            </tr>
            <tr>
              <td colspan="2" class="p-1 pl-2 border-left">{{Carbon\Carbon::parse($sub_d1->bday)->format('M d, Y')}}</td>
              <td colspan="2" class="p-1 pl-2 border-left border-right">{{$sub_d1->bplace}}</td>
            </tr>

            <tr>
              <th colspan="3" class="p-0 pl-2 border-left">IF MARRIED TO:</th>
              <th colspan="1" class="p-0 pl-2 border-left border-right">No. years residence of this Brgy.</th>
            </tr>
            <tr>
              <td colspan="3" class="p-1 pl-2 border-left"></td>
              <td colspan="1" class="p-1 pl-2 border-left border-right">20 yrs.</td>
            </tr>
            @endforeach
            <tr>
              <td colspan="4" class="pt-5 pb-3 border-left border-right text-center">__________________________<br>Signature of Applicant</td>
            </tr>
            <tr>
              <th colspan="4" class="text-center p-0 border-left border-right"><span class="text-lg text-warning bg-secondary">CERTIFY FURTHER THAT HE/SHE</span></th>
            </tr>
            <tr>
              <td colspan="1" class="text-center pt-3 border-left"></td>
              <td colspan="2">
                <p class="pt-3 m-0">(X) HAS NO PENDING CRIMINAL CASE FILE AGAINST HIM/HER IN THIS LEVEL</p>
                <p class="m-0">( ) HAS PENDING CASE:</p>
                <p class="ml-5 m-0">NATURE OF CASE:________N/A_________________</p>
                <p class="ml-5 m-0">AS OF:_________________N/A_________________</p>

                <p class="ml-3 pt-5 m-0">Issued this day of <u>{{Carbon\Carbon::parse($d2->date_issue)->format('M d, Y')}}</u></p>
                <p class="ml-3 m-0 ">For the purpose of: <u class="pl-5"><?php echo nl2br(html_entity_decode($d2->purpose))?></u></p>

                <p class="float-right pt-5 mr-5 m-0 text-center pb-1"><br><br><br> <span class="text-lg"><b><u>Ariel O. Gupit</u></b><br></span>Punong Barangay</p>
                <p class="float-right pt-5 mr-5 m-0">Approved by:<br><br><br> <span class="text-center ml-3 text-lg"><b> </b><br></span></p>
              </td>
              <td colspan="1" class="text-center pt-3 border-right"></td>
            </tr>
            <tr>
              <td colspan="4" class="p-3 border-left border-bottom border-right">
                <span class="ml-2">Community Tax No:</span><br>
                <span class="ml-2">Issued on:</span><br>
                <span class="ml-2">Issued at:</span><br>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
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
