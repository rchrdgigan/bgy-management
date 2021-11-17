@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title p-2"><i class="fas fa-users"></i> List of Records</h3>
                <div class="card-tools">
                    <button type="button"
                            data-toggle="modal" 
                            data-target="#addCaseModal"
                            class="btn btn-warning">
                        <i class="fas fa-plus"></i>
                        New Compliant
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="all_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th hidden="">No.</th>
                    <th>Status</th>
                    <th>Incident Type</th>
                    <th>DateTime Incident</th>
                    <th>DateTime Recorded</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($record as $data)
                    <tr>
                        <td hidden="">{{$data->id}}</td>
                        <td>
                            @if($data->remarks == "Open" || $data->remarks == "New")
                            <p class="{{($data->status == 'New')? 'bg-success' : 'bg-info'}} rounded text-center">{{$data->status}}</p>
                            @else
                            <p class="bg-danger rounded text-center">Close</p>
                            @endif
                        </td>
                        <td>{{$data->type_incident}}</td>
                        <td>{{$data->date_time_incident}}</td>
                        <td>{{$data->date_time_reported}}</td>
                        <td>
                            <a class="btn btn-primary m-1 .btn-sm"
                                type="button" 
                                class="btn btn-primary" 
                                href="{{route('show.records',$data->id)}}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-danger m-1 .btn-sm"
                                type="button" 
                                class="btn btn-primary" 
                                id="{{$data->id}}"
                                data-toggle="modal" 
                                data-target="#delCaseModal">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a class="btn btn-success m-1 .btn-sm"
                                type="button" 
                                href="{{route('edit.records',$data->id)}}">
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
  </div>
</div>

<!-- Add -->
<div class="modal fade" id="addCaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">New Case Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('add.records')}}" method="POST" id="showForm">
            @csrf
            <div class="modal-body">
                <div class="container p-3">
                        <div class="form-group">
                            <label for="complianant">Name of Complianant :</label>
                            <div class="input-group mb-3">
                                <input type="text" id="complianant" name="complianant" 
                                    class="inp form-control"
                                    placeholder="Input name complianant"/>
                            </div>
                        </div>
                        <label for="citizenship">Complianant Statement :</label>
                        <div class="input-group mb-3">
                            <textarea id="cs" name="complianant_statement"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Name of Repondent</label>
                            <select class="select2" multiple="multiple" name="respondent_name" data-placeholder="Select a Respondent" style="width: 100%;">
                            @foreach($resident as $data)
                                <option value="{{$data->fname}} {{$data->mname}} {{$data->lname}}">{{$data->fname}} {{$data->mname}} {{$data->lname}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Person Involved</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" name="involve_resident[]" data-placeholder="Select a Person Involved" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($resident as $data2)
                                    <option value="{{$data2->id}}">{{$data2->fname}} {{$data2->mname}} {{$data2->lname}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="location">Location of Incident :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="location" name="location" 
                                            class="inp form-control"
                                            placeholder="Input location of incident"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="incident">Incident Type :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="incident" name="incident" 
                                            class="inp form-control"
                                            placeholder="Input type of incident ex: Kawatan... etc."/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dt_report">Date and Time of Reported :</label>
                                    <div class="input-group mb-3">
                                        <input type="date" id="dt_report" name="dt_report" 
                                            class="inp form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dt_incident">Date and Time of Incident :</label>
                                    <div class="input-group mb-3">
                                        <input type="date" id="dt_incident" name="dt_incident" 
                                            class="inp form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status :</label>
                                    <div class="input-group mb-3">
                                        <select style="width: 100%;" class="form-control" name="status">
                                            <option value="New">New</option>
                                            <option value="On-going">On-going</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="complianant">Remarks :</label>
                                    <div class="input-group mb-3">
                                        <select style="width: 100%;" class="form-control" name="remarks">
                                            <option value="Open">Open</option>
                                            <option value="Close">Close</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="citizenship">Action Taken :</label>
                        <div class="input-group mb-3">
                            <textarea id="at" name="action_taken"></textarea>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger .btn-md" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary .btn-md"><i class="fas fa-check"></i> Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delCaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
            <h5 class="modal-title" id="exampleModalLabel">Status Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('delete.records')}}" method="POST" id="delFrm">
            @method('DELETE')
            @csrf
            <div class="modal-body">
                <input type="text" name="id" hidden>
                Are you sure you want to delete this Case Information?
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i> No</button>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-check"></i> Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection