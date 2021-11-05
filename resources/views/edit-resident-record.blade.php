@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="card-title">Edit Case Information</h5>
            </div>
            @foreach($record as $records)
            <form action="{{route('update.records',$records->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="container p-3">
                        <div class="form-group">
                            <label for="complianant">Name of Complianant :</label>
                            <div class="input-group mb-3">
                                <input type="text" id="complianant" value="{{$records->complianant_name}}" name="complianant" 
                                    class="inp form-control"
                                    placeholder="Input name complianant"/>
                            </div>
                        </div>
                        <label for="citizenship">Complianant Statement :</label>
                        <div class="input-group mb-3">
                            <textarea id="cs-edit" name="complianant_statement">{{$records->complianant_statement}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Name of Repondent</label>
                            <select class="select2" multiple="multiple" name="respondent_name" data-placeholder="Select a Respondent" style="width: 100%;">
                            @foreach($resident as $data)
                                @if($records->respondent_name == $data->fname.' '.$data->mname.' '.$data->lname)
                                <option selected value="{{$data->fname}} {{$data->mname}} {{$data->lname}}">{{$data->fname}} {{$data->mname}} {{$data->lname}}</option>
                                @else
                                <option value="{{$data->fname}} {{$data->mname}} {{$data->lname}}">{{$data->fname}} {{$data->mname}} {{$data->lname}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Person Involved</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" name="involve_resident[]" data-placeholder="Select a Person Involved" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                @foreach($resident as $dt)
                                    @forelse($records->assign_resident_record->where('resident_id', $dt->id) as $sub_data)
                                    <option selected value="{{$sub_data->resident_id}}">{{$sub_data->fname}} {{$sub_data->mname}} {{$sub_data->lname}}</option>
                                    @empty
                                    <option value="{{$dt->id}}">{{$dt->fname}} {{$dt->mname}} {{$dt->lname}}</option>
                                    @endforelse
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="location">Location of Incident :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="location" value="{{$records->location_incident}}" name="location" 
                                            class="inp form-control"
                                            placeholder="Input location of incident"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="incident">Incident Type :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="incident" value="{{$records->type_incident}}" name="incident" 
                                            class="inp form-control"
                                            placeholder="Input type of incident ex: Kawatan... etc."/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dt_report">Date and Time of Reported :</label>
                                    <div class="input-group mb-3">
                                        <input type="date" id="dt_report" value="{{$records->date_time_reported}}" name="dt_report" 
                                            class="inp form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dt_incident">Date and Time of Incident :</label>
                                    <div class="input-group mb-3">
                                        <input type="date" id="dt_incident" value="{{$records->date_time_incident}}" name="dt_incident" 
                                            class="inp form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status :</label>
                                    <div class="input-group mb-3">
                                        <select style="width: 100%;" class="form-control" name="status">
                                            <option {{($records->status == 'New')? 'selected':''}} value="New">New</option>
                                            <option {{($records->status == 'On-going')? 'selected':''}} value="On-going">On-going</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="complianant">Remarks :</label>
                                    <div class="input-group mb-3">
                                        <select style="width: 100%;" class="form-control" name="remarks">
                                            <option {{($records->status == 'Open')? 'selected':''}} value="Open">Open</option>
                                            <option {{($records->status == 'Close')? 'selected':''}} value="Close">Close</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="citizenship">Action Taken :</label>
                        <div class="input-group mb-3">
                            <textarea id="at-edit" name="action_taken">{{$records->action_taken}}</textarea>
                        </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-danger btn-md" href="{{route('list.records')}}"><i class="fas fa-times"></i> Cancel</a>
                <button type="submit" class="btn btn-primary btn-md float-right"><i class="fas fa-check"></i> Update</button>
            </div>
            </form>
            @endforeach
        </div>
    </div>
  </div>
</div>
@endsection