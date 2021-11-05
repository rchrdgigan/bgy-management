@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable ui-sortable">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> Resident Profile</h3>
            </div>
            <div class="card-body box-profile">
                <div class="text-center mb-2">
                    <img class="brand-image img-circle elevation-3" height="200" width="200" src="/storage/resident_image/{{$resident->image}}">
                </div>
                <h3 class="profile-username text-center p-3">{{$resident->fname}} {{$resident->mname}} {{$resident->lname}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b><i class="fas fa-venus-mars"></i> Gender</b> <a class="float-right">{{$resident->gender}}</a>
                    </li>
                    <li class="list-group-item">
                    <b><i class="fas fa-sort-numeric-up-alt"></i> Age</b> <a class="float-right">{{$resident->age}}</a>
                    </li>
                    <li class="list-group-item">
                    <b><i class="fas fa-thermometer-three-quarters"></i> Civil Staus</b> <a class="float-right">{{$resident->civil_status}}</a>
                    </li>
                   
                    <li class="list-group-item">
                    <b><i class="fas fa-info"></i> Status</b> <a class="float-right bg-success rounded p-1">{{$resident->status}}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        </section>
        <!-- /.Left col -->
        
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-8 connectedSortable ui-sortable">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Personal Information</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Case Involved</a>
                    </li>
                </ul>
                </div>
                <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                            <b><i class="fas fa-file-signature"></i> Nick Name</b> <a class="float-right">{{$resident->nname}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-calendar-week"></i> Birth Date</b> <a class="float-right">{{Carbon\Carbon::parse($resident->bday)->format('M d, Y')}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-sort-numeric-up-alt"></i> Phone Number</b> <a class="float-right">{{$resident->cnumber}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-mail-bulk"></i> Email Address</b> <a class="float-right">{{$resident->email}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-location-arrow"></i> Birth Place</b> <a class="float-right">{{$resident->bplace}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-road"></i> Street</b> <a class="float-right">{{$resident->street}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-chart-area"></i> Purok/Area</b> <a class="float-right">{{$resident->purok}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-flag"></i> Citizenship</b> <a class="float-right">{{$resident->citizenship}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fab fa-accessible-icon"></i> Defferently Disabled Person</b> <a class="float-right">{{$resident->ddperson}}</a>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-church"></i> Religion</b> <a class="float-right">{{$resident->religion}}</a>
                            </li>
                            </li>
                            <li class="list-group-item">
                            <b><i class="fas fa-briefcase"></i> Occupation</b> <a class="float-right">{{$resident->occupation}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="list_item" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th hidden="">No.</th>
                                    <th>Status</th>
                                    <th>Type of Case</th>
                                    <th>Date Reported</th>
                                    <th>Incident Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($case as $dt)
                                @foreach($dt->assign_resident_record as $sub_dt)
                                <tr>
                                
                                    <td>
                                        @if($sub_dt->remarks == "Open" || $sub_dt->remarks == "New")
                                        <p class="{{($sub_dt->status_case == 'New')? 'bg-success' : 'bg-info'}} rounded text-center">{{$sub_dt->status_case}}</p>
                                        @else
                                        <p class="bg-danger rounded text-center">Close</p>
                                        @endif
                                    </td>
                                    <td>{{$sub_dt->type_incident}}</td>
                                    <td>{{$sub_dt->date_time_reported}}</td>
                                    <td>{{$sub_dt->date_time_incident}}</td>
                                    <td>
                                        <a href="{{route('show.records',$sub_dt->record_id)}}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </div>

                </div>
                </div>
                <!-- /.card -->
            </div>
        </section>
        <!-- right col -->
    </div>
</div>
@endsection