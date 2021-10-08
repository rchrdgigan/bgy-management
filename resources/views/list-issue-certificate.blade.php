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
                <th>Full Name</th>
                <th>Gender</th>
                <th>Purok</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resident as $data)
            <tr>
                <td hidden="">{{$data->id}}</td>
                <td><img src="/storage/resident_image/{{$data->image}}" height="30" class="brand-image img-circle elevation-3"></td>
                <td>{{$data->fname}} {{$data->mname}} {{$data->lname}}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->purok}}</td>
                <td>
                    <button type="button" class="btn btn-primary .btn-sm" id="{{$data->id}}" data-toggle="modal" data-target="#showClearanceModal">
                        <i class="fas fa-id-card"></i> Clearance
                    </button>
                    <button type="button" class="btn btn-info .btn-sm" id="{{$data->id}}" data-toggle="modal" data-target="#showBusinessModal">
                        <i class="fas fa-briefcase"></i> Business Permit
                    </button>
                    <button type="button" class="btn btn-success .btn-sm" id="{{$data->id}}" fname="{{$data->fname}} {{$data->mname}} {{$data->lname}}" data-toggle="modal" data-target="#showIndigencyModal">
                        <i class="fas fa-comments-dollar"></i> Indigency
                    </button>
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

<!-- Modal Certificate -->
<div class="modal fade" id="showClearanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Generate Clearance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="clearance_frm">
                <div class="modal-body">
                    <input hidden name="id" type="text">
                    <label for="citizenship">Purpose :</label>
                    <div class="input-group mb-3">
                    <textarea id="clearance"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="or_number">OR Number :</label>
                        <div class="input-group mb-3">
                            <input type="text" id="or_number" name="or_number" 
                                class="inp form-control"
                                placeholder="Input OR Number"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generate</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Certificate -->
<div class="modal fade" id="showBusinessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Generate Business Permit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="business_frm">
                <div class="modal-body">
                    <input hidden name="id" type="text">
                    <label>Purpose :</label>
                    <div class="input-group mb-3">
                    <textarea id="business"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="or_number">OR Number :</label>
                        <div class="input-group mb-3">
                            <input type="text" id="or_number" name="or_number" 
                                class="inp form-control"
                                placeholder="Input OR Number"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generate</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Certificate -->
<div class="modal fade" id="showIndigencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Generate Indigency</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="indigency_frm">
                <div class="modal-body">
                    <input hidden name="id" type="text">
                    <label>Purpose :</label>
                    <div class="input-group mb-3">
                    <textarea id="indigency"></textarea>
                    </div>
                    <p>Are you sure you want to generate indigency for <b id="fname"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generate</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection