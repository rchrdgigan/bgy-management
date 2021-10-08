@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fas fa-file-invoice"></i> Clearance</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-file-contract"></i> Business Permit</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-file-invoice-dollar"></i> Indigency</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-file"></i> All</a>
            </li>
        </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="certificate_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Name</th>
                                <th>Generated Type</th>
                                <th>Date Issued</th>
                                <th>Date Expired</th>
                                <th>OR Number</th>
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

                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="business_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Name</th>
                                <th>Generated Type</th>
                                <th>Date Issued</th>
                                <th>Date Expired</th>
                                <th>OR Number</th>
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

                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="indigency_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Name</th>
                                <th>Generated Type</th>
                                <th>Date Issued</th>
                                <th>Date Expired</th>
                                <th>OR Number</th>
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