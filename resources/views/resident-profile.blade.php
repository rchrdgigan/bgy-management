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
                    <img class="brand-image img-circle elevation-3" height="200" src="{{ asset('images/no-picture.png')}}">
                </div>
                <h3 class="profile-username text-center p-3">Captain Marvells</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">Male</a>
                    </li>
                    <li class="list-group-item">
                    <b>Age</b> <a class="float-right">38</a>
                    </li>
                    <li class="list-group-item">
                    <b>Civil Staus</b> <a class="float-right">Single</a>
                    </li>
                   
                    <li class="list-group-item">
                    <b>Status</b> <a class="float-right bg-success rounded p-1">Alive</a>
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
                            <b>Nick Name</b> <a class="float-right">Capitan Boom</a>
                            </li>
                            <li class="list-group-item">
                            <b>Birth Date</b> <a class="float-right">Feb 20, 1985</a>
                            </li>
                            <li class="list-group-item">
                            <b>Phone Number</b> <a class="float-right">09213341256</a>
                            </li>
                            <li class="list-group-item">
                            <b>Email Address</b> <a class="float-right">captain_marvells@gmail.com</a>
                            </li>
                            <li class="list-group-item">
                            <b>Birth Place</b> <a class="float-right">Bulan, Sorsogon</a>
                            </li>
                            <li class="list-group-item">
                            <b>Street</b> <a class="float-right">Sta. Rosa St.</a>
                            </li>
                            <li class="list-group-item">
                            <b>Purok/Area</b> <a class="float-right">Purok 1</a>
                            </li>
                            <li class="list-group-item">
                            <b>Citizenship</b> <a class="float-right">Filipino</a>
                            </li>
                            <li class="list-group-item">
                            <b>Defferently Disabled Person</b> <a class="float-right">none</a>
                            </li>
                            <li class="list-group-item">
                            <b>Religion</b> <a class="float-right">Roman Catholic</a>
                            </li>
                            </li>
                            <li class="list-group-item">
                            <b>Occupation</b> <a class="float-right">Programmer</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="food_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Status</th>
                                <th>Case</th>
                                <th>Date Reported</th>
                                <th>Incident Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- <tr>
                            </tr> -->
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