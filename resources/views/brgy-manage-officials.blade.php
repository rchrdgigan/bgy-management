@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title p-2"><i class="fas fa-users"></i> List of Officials</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    New Official
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
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