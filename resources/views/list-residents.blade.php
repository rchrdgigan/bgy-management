@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title p-2"><i class="fas fa-users"></i> List of Residents</h3>
            <div class="card-tools">
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
                <th>Images</th>
                <th>Status</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Purok</th>
                <th>Street</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resident as $data)
            <tr>
                <td hidden="">{{$data->id}}</td>
                <td><img src="/storage/resident_image/{{$data->image}}" height="30" class="brand-image img-circle elevation-3"></td>
                <td><a class="p-1 bg-success rounded">{{$data->status}}</a></td>
                <td>{{$data->fname }}{{$data->mname }}{{$data->lname }}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->purok}}</td>
                <td>{{$data->street}}</td>
                <td>
                  <form action="" method="post">
                  @csrf
                  @method('DELETE')
                    <a href="{{route('resident.profile',$data->id)}}" class="btn btn-primary .btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button type="submit" class="btn btn-danger .btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                    <a href="" class="btn btn-success .btn-sm">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                  </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection