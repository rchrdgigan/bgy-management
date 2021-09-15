
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--@yield('title')-->
  <title>{{ config('newapp.name', 'Admin Dashboard') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('vendor/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/dist/css/adminlte.min.css') }}">
  <!-- Mysytle style -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{auth()->user()->name}} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{ asset('images/brgy.jpg')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BAMSystem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/admin.png')}}" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="" class="d-block">{{auth()->user()->name}}</a>
          <span href="" class="d-block text-center">Secretary</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Dashboard</p></a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon far fa-clipboard"></i>
              <p>Baranagay Officials</p>
              <i class="nav-icon fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('brgy.official')}}" class="nav-link">
                <i class="nav-icon fas fa-user-friends ml-3"></i>
                <p>List of Officials</p></a>
              </li>
              <li class="nav-item">
                <a href="{{route('brgy.manage-offcials')}}" class="nav-link">
                <i class="nav-icon fas fa-users-cog ml-3"></i>
                <p>Manage Officials</p></a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Residents</p>
            <i class="nav-icon fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('add.residents')}}" class="nav-link">
                  <i class="nav-icon fas fa-user ml-3"></i>
                  <p>Add New Resident</p></a>
              </li>
              <li class="nav-item">
                <a href="{{route('list.residents')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-friends ml-3"></i>
                  <p>List of Residents</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>Certification</p>
            <i class="nav-icon fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user ml-3"></i>
                  <p>Issue Certificate</p></a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-certificate ml-3"></i>
                  <p>List of Certificate</p></a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Blotter Record</p>
            <i class="nav-icon fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-slash ml-3"></i>
                  <p>List of Records</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>SMS Notification</p>
            <i class="nav-icon fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-friends ml-3"></i>
                <p>Disaster Notification</p></a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-friends ml-3"></i>
                <p>Meeting Notification</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
          <a href="{{route('brgy.info')}}" class="nav-link">
            <i class="nav-icon fas fa-info"></i>
            <p>Baranagay Info</p></a>
          </li>

          <hr>
          @guest @if (Route::has('login'))
          @endif @else
          <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
          @endguest
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Dashboard</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    Barangay Management System
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('vendor/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>

<script>
  $(function () {
    $("#food_item").DataTable({
      "order":[[0,'desc']],
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "lengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
    });
  });
</script>

<script>
$('#returnModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;

  var issueId=$(opener).attr('issue-id');
  var returnOn=$(opener).attr('return-on');
  var inputQty=$(opener).attr('input-qty');

  $('#returnForm').find('[name="issueId"]').val(issueId);
  $('#returnForm').find('[name="dueOn"]').val(returnOn);
  $('#returnForm').find('[name="inputQty"]').val(inputQty);
});

$('#notReturnModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;

  var issueId=$(opener).attr('issue-id');
  var reportsOn=$(opener).attr('report-on');
  var inputQty=$(opener).attr('input-qty');

  $('#notReturnForm').find('[name="issueId"]').val(issueId);
  $('#notReturnForm').find('[name="reportOn"]').val(reportsOn);
  $('#notReturnForm').find('[name="input_qty"]').val(inputQty);
});
</script>

<script>
$('#editModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var id=$(opener).attr('id');
  var category=$(opener).attr('category-name');

  $('#editCatForm').find('[name="id"]').val(id);
  $('#editCatForm').find('[name="categories"]').val(category);
});
</script>

<script>
function diffDate() {
var due = document.getElementById('due').value;
var today = document.getElementById('today').value;
var result = document.getElementById('dateResult');
  if(result !=null)
  {
  	if(due < today){
      const date1 = new Date(due);
      const date2 = new Date(today);
      const diffTime = Math.abs(date2 - date1);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24) - 1); 
        console.log(diffTime + " milliseconds");
        console.log(diffDays + " days");
        result.innerHTML = "The days lapse is : " + diffDays;
    }
    else {
      result.innerHTML = "The day lapse is : 0";
    }
  }

}
</script>
</body>
</html>