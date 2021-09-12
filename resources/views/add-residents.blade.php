@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-3 connectedSortable ui-sortable">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> Profile Picture</h3>
            </div>
            <div class="card-body box-profile">
                <div class="text-center mb-2">
                    <img class="profile-user-img img-fluid img-circle" src="../../../images/brgy.jpg" alt="User profile picture">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Photo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        </section>
        <!-- /.Left col -->
        
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-9 connectedSortable ui-sortable">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info"></i> Resident Information</h3>
            </div>
            <div class="card-body">

                <form>
                <div class="row">
                    <div class="col-md-6">
                        <lable>First Name :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input First Name" required="">
                        </div>
                        
                        <lable>Middle Name :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Middle Name" required="">
                        </div>

                        <lable>Last Name :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Last Name" required="">
                        </div>

                        <lable>Nick Name :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Nick Name" required="">
                        </div>

                        <lable>Gender :</label>
                        <div class="input-group">
                            <div class="form-check ml-5 p-3">
                                <input id="male" class="form-check-input" type="radio" value="Male" name="gender" required="">
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check ml-5 p-3">
                                <input id="female" class="form-check-input" type="radio" value="Female" name="gender" required="">
                                <label for="female" class="form-check-label">Female</label>
                            </div>
                        </div>

                        <lable for="civil_status">Civil Status :</label>
                        <div class="input-group mb-3">
                        <select name="civil_status" id="civil_status" class="inp form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true" required="">
                            <option value="Single">Single</option>
                            <option value="Single">Married</option>
                            <option value="Single">Widowed</option>
                        </select>
                        </div>

                        <lable for="">Age :</label>
                        <div class="input-group mb-3">
                        <input type="number" class="inp form-control" placeholder="Input Age" required="">
                        </div>
                        
                        <lable for="">Birth Date :</label>
                        <div class="input-group mb-3">
                        <input type="date" class="inp form-control" placeholder="Input Birth Date" required="">
                        </div>

                        <lable for="">Birth Place :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Birth Place" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <lable for="">Contact Number :</label>
                        <div class="input-group mb-3">
                        <input type="number" class="inp form-control" placeholder="Input Contact Number" required="">
                        </div>

                        <lable>Email Addres :</label>
                        <div class="input-group mb-3">
                        <input type="email" class="inp form-control" placeholder="Input Email Addres" required="">
                        </div>
                        
                        <lable>Street :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Street" required="">
                        </div>

                        <lable>Purok/Area :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Purok/Area" required="">
                        </div>

                        <lable>Citizenship :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Citizenship" required="">
                        </div>

                        <lable for="">Defferently Disabled Person :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Defferently Disabled Person" required="">
                        </div>

                        <lable for="">Religion :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Religion" required="">
                        </div>

                        <lable for="">Occupation :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Occupation" required="">
                        </div>

                        <lable for="">Status :</label>
                        <div class="input-group mb-3">
                        <input type="text" class="inp form-control" placeholder="Input Status" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            Submit
                        </button>
                    </div>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
        </div>
        </section>
        <!-- right col -->
    </div>
</div>
@endsection