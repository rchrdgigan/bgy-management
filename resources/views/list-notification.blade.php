@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fas fa-cloud-rain"></i> Disaster Notification</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-users"></i> Mettings of Officials Notification</a>
            </li>
        </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title p-2"><i class="fas fa-users"></i> List of Disaster Notified</h3>
                            <div class="card-tools">
                                <button type="button"
                                        data-toggle="modal" 
                                        data-target="#showDisastedModal"
                                        class="btn btn-warning">
                                    <i class="fas fa-plus"></i>
                                    Create Notification
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="certificate_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Notification Type</th>
                                <th>Date Notified</th>
                                <th>Purok Area</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td hidden="">No.</td>
                                <td>Flood</td>
                                <td>Sept 20, 2021</td>
                                <td>All</td>
                                <td>
                                <a class="btn btn-danger m-1 .btn-sm"
                                    type="button" 
                                    class="btn btn-primary" 
                                    data-toggle="modal" 
                                    data-target="#delCaseModal">
                                    <i class="fas fa-trash"></i>
                                </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title p-2"><i class="fas fa-users"></i> List of Mettings Notified</h3>
                            <div class="card-tools">
                                <button type="button"
                                        data-toggle="modal" 
                                        data-target="#addNewModal"
                                        class="btn btn-warning">
                                    <i class="fas fa-plus"></i>
                                    Create Notification
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="business_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Metting Type</th>
                                <th>Who's Officials</th>
                                <th>Date Notified</th>
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
</div>


<div class="modal fade mt-5" id="showDisastedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i>Choose Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="business_frm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a class="btn btn-danger p-5 col-12" href="{{route('fire.form')}}"><i class="fas fa-dumpster-fire text-white" style="font-size:200px;"></i><br><b>Fire Notifier</b></a>
                        </div> 
                        
                        <div class="col-6 text-center">
                        <form action="" method="POST">
                            <input type="text" name="notification_type" value="All" hidden>
                            <input type="text"name="message" value="FLOOD ALERT: Ang baha ay posibleng pang tumaas kaya magsilikas na ang mga nasa mabababang lugar na binabaha." hidden>
                            <button type="submit" class="btn btn-primary p-5 col-12"><i class="fas fa-cloud-rain text-white" style="font-size:200px;"></i><br><b>Flood Notifier</b></button>
                        </form>
                        </div>
                    </div>
                   
                </div>
            </form>
        </div>
    </div>
</div>
@endsection