@extends('layouts.admin')
@section('content')
<div class="container-fluid">
<form action="{{route('update.info')}}" method="POST" enctype="multipart/form-data">  
@csrf
<div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable ui-sortable">
            <div class="card card-info card-outline">
              
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-cogs"></i> Setting</h3>
                </div>
                <div class="card-body">
                  <lable>Barangay :</label>
                  <div class="input-group mb-3">
                    <input type="text" name="bname" class="inp form-control" value="{{($data == null) ? '' : $data->barangay}}" placeholder="Input Barangay" required>
                  </div>
                  
                  <lable>Municipality :</label>
                  <div class="input-group mb-3">
                    <input type="text" name="municipality" class="inp form-control" value="{{($data == null) ? '' : $data->municipality}}" placeholder="Input Municipality" required>
                  </div>

                  <lable>Province :</label>
                  <div class="input-group mb-3">
                    <input type="text" name="provice" class="inp form-control" value="{{($data == null) ? '' : $data->province}}" placeholder="Input Province" required>
                  </div>

                  <lable>Contact Number :</label>
                  <div class="input-group mb-3">
                    <input type="text" name="cpnumber" class="inp form-control" value="{{($data == null) ? '' : $data->contact}}" placeholder="Input Contact Number" required>
                  </div>

                  <lable for="email">Email Address :</label>
                  <div class="input-group mb-3">
                    <input id="email" name="email" type="email" class="inp form-control" value="{{($data == null) ? '' : $data->email}}" placeholder="Input Email Address" required>
                  </div>
                  <div class="row">
                      <div class="col-3">
                          <button type="submit" class="btn btn-primary btn-block">
                              Save
                          </button>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
              
            </div>
          </section>
          <!-- /.Left col -->
            
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable ui-sortable">
            <div class="card card-primary card-outline">
              <div class="card-header mx-auto">
                <div class="card-body box-profile">
                  <div class="profile-pic">
                      <div class="text-center mb-2">
                          <img class="brand-image img-circle elevation-3" height="150" width="150" src="/storage/bgry_logo/{{($data == null) ? '' : $data->logo}}"  id="output">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputFile">Upload Photo</label>
                          <div class="input-group">
                              <div class="custom-file">
                                  <input id="file" type="file" name="image" class="custom-file-input" onchange="loadFile(event)"/>
                                  <label class="custom-file-label" for="file">Choose file</label>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group m-0 row">
                    <label for="email" class="col-md-4 col-form-label text-md-left">Barangay</label> 
                    <div class="col-md-6">
                        <p class="form-control border-0">{{($data == null) ? '' : $data->barangay}}</p>
                    </div>
                </div>
                <div class="form-group m-0 row">
                    <label for="email" class="col-md-4 col-form-label text-md-left">Municipality</label> 
                    <div class="col-md-6">
                        <p class="form-control border-0">{{($data == null) ? '' : $data->municipality}}</p>
                    </div>
                </div>
                <div class="form-group m-0 row">
                    <label for="email" class="col-md-4 col-form-label text-md-left">Province</label> 
                    <div class="col-md-6">
                        <p class="form-control border-0">{{($data == null) ? '' : $data->province}}</p>
                    </div>
                </div>
                <div class="form-group m-0 row">
                    <label for="email" class="col-md-4 col-form-label text-md-left">Contact Number</label> 
                    <div class="col-md-6">
                        <p class="form-control border-0">{{($data == null) ? '' : $data->contact}}</p>
                    </div>
                </div>
                <div class="form-group m-0 row">
                    <label for="email" class="col-md-4 col-form-label text-md-left">Email Address</label> 
                    <div class="col-md-6">
                        <p class="form-control border-0">{{($data == null) ? '' : $data->email}}</p>
                    </div>
                </div>
              </div>
            </div>
          </section>
          <!-- right col -->

</div>
</form>

</div>
@endsection