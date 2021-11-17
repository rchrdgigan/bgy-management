@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
       <!-- Small boxes (Stat box) -->
       <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$count_official}}</h3>

                <p>Barangay Officials</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-friends"></i>
                </div>
                <a href="{{route('brgy.manage-offcials')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$count_resident}}</h3>

                <p>Residents</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{route('list.residents')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$issue_all}}</h3>

                <p>Certificates</p>
              </div>
              <div class="icon">
                <i class="fas fa-certificate"></i>
              </div>
              <a href="{{route('gen.certificate')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$record}}</h3>

                <p>Blotters</p>
              </div>
              <div class="icon">
                <i class="fas fa-exclamation-circle"></i>
              </div>
              <a href="{{route('list.records')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">List of Officials</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="card-body">
          <table id="list_item" class="table table-bordered table-striped">
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
              @foreach($officials as $data)
              <tr>
                  <td hidden="">{{$data->id}}</td>
                  <td><img src="/storage/official_image/{{$data->image}}" height="30" class="brand-image img-circle elevation-3"></td>
                  <td>{{$data->fname}} {{$data->mname}} {{$data->lname}}</td>
                  <td>{{$data->position}}</td>
                  <td>{{Carbon\Carbon::parse($data->from)->format('M d, Y')}} - {{Carbon\Carbon::parse($data->to)->format('M d, Y')}}</td>
                  <td>{{$data->purok}}</td>
              </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection