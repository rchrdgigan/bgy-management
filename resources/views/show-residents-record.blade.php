@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title p-2"><i class="fas fa-users"></i> Resident Case Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="food_item" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Complianant</th>
                        <th>Statement</th>
                        <th>Respondent</th>
                        <th>Involved</th>
                        <th>Location</th>
                        <th>Remarks</th>
                        <th>Action Taken</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($record as $data)
                    <tr>
                        <td>{{$data->complianant_name}}</td>
                        <td><?php echo nl2br(html_entity_decode($data->complianant_statement)) ?></td>
                        <td>{{$data->respondent_name}}</td>
                        <td>
                        @foreach($data->assign_resident_record as $sub_dt)
                            <p id="case_involve" style="margin:0">{{$sub_dt->fname}} {{$sub_dt->mname}} {{$sub_dt->lname}}</p>
                        @endforeach
                        </td>
                        <td>{{$data->location_incident}}</td>
                        <td><p class="{{($data->remarks == 'Open')? 'bg-success' : 'bg-danger'}} rounded text-center">{{$data->remarks}}</p></td>
                        <td><?php echo nl2br(html_entity_decode($data->action_taken)) ?></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a class="btn btn-danger btn-md" href="{{route('list.records')}}"><i class="fas fa-times"></i> Back</a>
            </div>
        </div>
        <!-- /.card -->
    </div>
  </div>
</div>
@endsection