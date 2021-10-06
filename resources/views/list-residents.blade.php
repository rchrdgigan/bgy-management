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
        <table id="list_item" class="table table-bordered table-striped">
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
                <td>{{$data->fname}} {{$data->mname}} {{$data->lname}}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->purok}}</td>
                <td>{{$data->street}}</td>
                <td>
                    <a href="{{route('resident.profile',$data->id)}}" class="btn btn-primary .btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button type="button" class="btn btn-danger .btn-sm" data-toggle="modal" id="{{$data->id}}" data-target="#showModal">
                        <i class="fas fa-trash"></i>
                    </button>
                    <a href="{{route('edit.resident',$data->id)}}" class="btn btn-success .btn-sm">
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

<!-- Modal Delete Yes Or No  -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('delete.resident')}}" method="post" id="delete_frm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input hidden name="id" type="text">
                    <p>Are you sure you want to delete this data?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn btn-primary" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection