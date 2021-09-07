@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
       <!-- Small boxes (Stat box) -->
       <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3>30</h3>

                <p>Barangay Officials</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-friends"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>4203</h3>

                <p>Residents</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Certificates</p>
              </div>
              <div class="icon">
                <i class="fas fa-certificate"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>53</h3>

                <p>Blotters</p>
              </div>
              <div class="icon">
                <i class="fas fa-exclamation-circle"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary">
        <h3 class="card-title">List of Officials</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="food_item" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th hidden="">No.</th>
                <th>Image</th>
                <th>Full Name</th>
                <th>Job-Position</th>
                <th>Term From - To</th>
                <th>Purok</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td hidden="">1</td>
                <td><img src="#" width="100" hight="100" class="img-circle"></td>
                <td>Polano Ba</td>
                <td>Kagawad</td>
                <td>Sept 02, 2021 - Sept 02, 2022</td>
                <td>Purok 1</td>
            </tr>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection