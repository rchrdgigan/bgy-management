@extends('layouts.admin')
@section('content')
<div class="container-fluid">
<div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable ui-sortable">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cogs"></i> Setting</h3>
              </div>

              <div class="card-body">
                <lable>Barangay :</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Input Barangay">
                </div>
                
                <lable>Municipality :</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Input Municipality">
                </div>

                <lable>Province :</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Input Province">
                </div>

                <lable>Contact Number :</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Input Contact Number">
                </div>

                <lable for="email">Email Address :</label>
                <div class="input-group mb-3">
                  <input id="email" type="email" class="form-control" placeholder="Input Email Address">
                </div>
                <div class="row">
                    <div class="col-2">
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
          <section class="col-lg-4 connectedSortable ui-sortable">
            <div class="card card-primary card-outline">
              <div class="card-header mx-auto">
                <img src="../../../images/brgy.jpg" height="150" class=" brand-image img-circle elevation-3" style="opacity: .8">
              </div>
              <div class="card-body">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Barangay</label> 
                    <div class="col-md-6">
                        <p class="form-control">Barangay Name</p>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Municipality</label> 
                    <div class="col-md-6">
                        <p class="form-control">Barangay Name</p>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Province</label> 
                    <div class="col-md-6">
                        <p class="form-control">Bulan Sorsogon</p>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Contact Number</label> 
                    <div class="col-md-6">
                        <p class="form-control">0920412312</p>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label> 
                    <div class="col-md-6">
                        <p class="form-control">Email</p>
                    </div>
                </div>
              </div>
            </div>
          </section>
          <!-- right col -->
        </div>
</div>
@endsection