@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
                
        <section class="col-lg-4 connectedSortable ui-sortable">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> Barangay Captain</h3>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="brand-image img-circle elevation-3" height="200" src="{{ asset('images/no-picture.png')}}">
                </div>

                <h3 class="profile-username text-center">Captain Marvells</h3>

                <p class="text-muted text-center">Term : 2021-2022</p>

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
                    <b>Birth Date</b> <a class="float-right">Feb 20, 1985</a>
                    </li>
                    <li class="list-group-item">
                    <b>Birth Place</b> <a class="float-right">Bulan, Sorsogon</a>
                    </li>
                    <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right">09213341256</a>
                    </li>
                    <li class="list-group-item">
                    <b>Email Address</b> <a class="float-right">captain_marvells@gmail.com</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        </section>

        
        <section class="col-lg-8 connectedSortable ui-sortable">
        <div class="card card-primary card-outline">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-users"></i> Official Member</h3>
            </div>
            <div class="card-body">
                <div class="row">

                <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary">
                                <h3 class="widget-user-username">Sandy Santiago</h3>
                                <h5 class="widget-user-desc">Secretary</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{ asset('images/no-picture.png')}}" alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Gender</h5>
                                    <span class="description-text">Female</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Age</h5>
                                    <span class="description-text">28</span>
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
                                        data-toggle="modal" 
                                        data-target="#showModal">
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

                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary">
                                <h3 class="widget-user-username">Sandy Santiago</h3>
                                <h5 class="widget-user-desc">Secretary</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{ asset('images/no-picture.png')}}" alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Gender</h5>
                                    <span class="description-text">Female</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Age</h5>
                                    <span class="description-text">28</span>
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
                                        data-toggle="modal" 
                                        data-target="#showModal">
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

                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary">
                                <h3 class="widget-user-username">Sandy Santiago</h3>
                                <h5 class="widget-user-desc">Secretary</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{ asset('images/no-picture.png')}}" alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Gender</h5>
                                    <span class="description-text">Female</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Age</h5>
                                    <span class="description-text">28</span>
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
                                        data-toggle="modal" 
                                        data-target="#showModal">
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


                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary">
                                <h3 class="widget-user-username">Sandy Santiago</h3>
                                <h5 class="widget-user-desc">Secretary</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{ asset('images/no-picture.png')}}" alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Gender</h5>
                                    <span class="description-text">Female</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                    <h5 class="description-header">Age</h5>
                                    <span class="description-text">28</span>
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
                                        data-toggle="modal" 
                                        data-target="#showModal">
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


                    
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        </section>

    </div>
</div>

<!-- Modal SHOW Brgy Official -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-information">
            <h5 class="modal-title" id="exampleModalLabel">Brgy. Official Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container p-3">
                    .....Maintenance
                </div>
            </div>
        </div>
    </div>
</div>
@endsection