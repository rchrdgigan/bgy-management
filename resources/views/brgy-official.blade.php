@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
                
        <section class="col-lg-3 connectedSortable ui-sortable">
        <div class="card card-primary card-outline">
        @forelse($official->where('position','Captain')->take(1) as $data)
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> Barangay Captain</h3>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="brand-image img-circle elevation-3" height="200" width="200" src="/storage/official_image/{{$data->image}}">
                </div>
                <h3 class="mt-4 profile-username text-center">{{$data->fname." ".$data->mname." ".$data->lname}}</h3>

                <p class="text-muted text-center">Term : {{Carbon\Carbon::parse($data->from)->format('Y')}} - {{Carbon\Carbon::parse($data->to)->format('Y')}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{$data->gender}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Age</b> <a class="float-right">{{$data->age}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Civil Staus</b> <a class="float-right">{{$data->civil_status}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Birth Date</b> <a class="float-right">{{Carbon\Carbon::parse($data->bday)->format('M d, Y')}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Birth Place</b> <a class="float-right">{{$data->bplace}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right">{{$data->cnumber}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Email Address</b> <a class="float-right">{{$data->email}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Status</b> <a class="float-right bg-success rounded p-1">{{$data->status}}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
            @empty
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> Barangay Captain</h3>
            </div>
            <div class="card-body box-profile">
            <div class="alert alert-info alert-dismissible">
                Note: Brgy. Captain information not found... Please check position of the Captain!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
        @endforelse
        </div>
        </section>

        
        <section class="col-lg-9 connectedSortable ui-sortable">
        <div class="card card-primary card-outline">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-users"></i> Official Member</h3>
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($official->where('position','!=','Captain') as $member)
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-primary">
                            <h3 class="widget-user-username">{{$member->fname." ".$member->mname." ".$member->lname}}</h3>
                            <h5 class="widget-user-desc">{{$member->position}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="/storage/official_image/{{$member->image}}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                <h5 class="description-header">Gender</h5>
                                <span class="description-text">{{$member->gender}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                <h5 class="description-header">Age</h5>
                                <span class="description-text">{{$member->age}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                <h5 class="description-header">View</h5>
                                <a class="btn btn-primary .btn-sm"
                                    type="button" 
                                    class="btn btn-primary" 
                                    fname="{{$member->fname.' '.$member->mname.' '.$member->lname}}"
                                    gender="{{$member->gender}}"
                                    age="{{$member->age}}"
                                    civil_status="{{$member->civil_status}}"
                                    status="{{$member->status}}"
                                    nname="{{$member->nname}}"
                                    bday="{{$member->bday}}"
                                    cnumber="{{$member->cnumber}}"
                                    email="{{$member->email}}"
                                    bplace="{{$member->bplace}}"
                                    street="{{$member->street}}"
                                    purok="{{$member->purok}}"
                                    citizenship="{{$member->citizenship}}"
                                    religion="{{$member->religion}}"
                                    position="{{$member->position}}"
                                    from="{{Carbon\Carbon::parse($data->from)->format('Y')}}"
                                    to="{{Carbon\Carbon::parse($data->to)->format('Y')}}"
                                    image="/storage/official_image/{{$member->image}}"
                                    data-toggle="modal" 
                                    data-target="#showOfficialModal">
                                    <i class="fas fa-eye"></i>
                                </a> 
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                @endforeach

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        </section>

    </div>
</div>

<!-- Modal SHOW Brgy Official -->
<div class="modal fade" id="showOfficialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h5 class="modal-title" id="exampleModalLabel">Brgy. Official Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container p-3">
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-4 connectedSortable ui-sortable">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user"></i> About Official</h3>
                            </div>
                            <div class="card-body box-profile">
                                <div class="text-center mb-2">
                                    <img class="brand-image img-circle elevation-3" height="150" width="150" id="image">
                                </div>
                                <h3 class="profile-username text-center p-3" id="fname"></h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right" id="gender"></a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Age</b> <a class="float-right" id="age"></a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Civil Staus</b> <a class="float-right" id="civil_status"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="mr-auto">
                                                <b>Terms : </b> 
                                            </div>
                                            <div class="ml-auto">
                                                <a class="" id="from"></a> - <a class="" id="to"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Status</b> <a class="float-right bg-success rounded p-1" id="status"></a>
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
                                </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                <b>Nick Name</b> <a class="float-right" id="nickname"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Birth Date</b> <a class="float-right" id="bday"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Phone Number</b> <a class="float-right" id="cnumber"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Email Address</b> <a class="float-right" id="email"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Birth Place</b> <a class="float-right" id="bplace"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Street</b> <a class="float-right" id="street"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Purok/Area</b> <a class="float-right" id="purok"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Citizenship</b> <a class="float-right" id="citizenship"></a>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Religion</b> <a class="float-right" id="religion"></a>
                                                </li>
                                                </li>
                                                <li class="list-group-item">
                                                <b>Position</b> <a class="float-right" id="position"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </section>
                        <!-- right col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection