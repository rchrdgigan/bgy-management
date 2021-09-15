@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title p-2"><i class="fas fa-users"></i> List of Officials</h3>
            <div class="card-tools">
                <button type="button"
                        data-toggle="modal" 
                        data-target="#addNewModal"
                        class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    New Official
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="food_item" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th hidden="">No.</th>
                <th>Image</th>
                <th>Full Name</th>
                <th>Job-Position</th>
                <th>Term From - To</th>
                <th>Purok</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td hidden="">1</td>
                <td><img src="{{ asset('images/no-picture.png')}}" height="30" class="brand-image img-circle elevation-3"></td>
                <td>Polano Ba</td>
                <td>Kagawad</td>
                <td>Sept 02, 2021 - Sept 02, 2022</td>
                <td>Purok 1</td>
                <td>
                  <form action="" method="post">
                  @csrf
                  @method('DELETE')
                    <a href="" class="btn btn-primary .btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button type="submit" class="btn btn-danger .btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                    <a href="" class="btn btn-success .btn-sm">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                  </form>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<!-- Modal ADD New Official -->
<div class="modal fade bd-example-modal-xl" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-information">
            <h5 class="modal-title" id="exampleModalLabel">Add New Official Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container p-3">
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-3 connectedSortable ui-sortable">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user"></i> Profile Picture</h3>
                            </div>
                            <div class="card-body box-profile">
                                <div class="text-center mb-2">
                                    <img class="brand-image img-circle elevation-3" height="200" src="{{ asset('images/no-picture.png')}}">
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
                                <h3 class="card-title"><i class="fas fa-info"></i> Official Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">First Name :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="fname" name="fname" 
                                                class="inp form-control" 
                                                placeholder="Input First Name" required="">
                                        </div>
                                        
                                        <label for="mname">Middle Name :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="mname" name="mname" 
                                                class="inp form-control" 
                                                placeholder="Input Middle Name" required="">
                                        </div>

                                        <label for="lname">Last Name :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="lname" name="lname" 
                                                class="inp form-control" 
                                                placeholder="Input Last Name" required="">
                                        </div>

                                        <label for="nickname">Nick Name :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="nickname" name="nickname" 
                                                class="inp form-control" 
                                                placeholder="Input Nick Name" required="">
                                        </div>

                                        <label for="">Gender :</label>
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

                                        <label for="civil_status">Civil Status :</label>
                                        <div class="input-group mb-3">
                                        <select name="civil_status" id="civil_status" class="inp form-control" style="width: 100%;" aria-hidden="true" required="">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                        </div>

                                        <label for="age">Age :</label>
                                        <div class="input-group mb-3">
                                        <input type="number" id="age" name="age" 
                                                class="inp form-control" 
                                                placeholder="Input Age" required="">
                                        </div>
                                        
                                        <label for="birthdate">Birth Date :</label>
                                        <div class="input-group mb-3">
                                        <input type="date" id="birthdate" name="birthdate" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Date" required="">
                                        </div>

                                        <label for="bplace">Birth Place :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="bplace" name="bplace" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Place" required="">
                                        </div>

                                        <label for="from">Terms From :</label>
                                        <div class="input-group mb-3">
                                        <input type="date" id="birthdate" name="birthdate" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Date" required="">
                                        </div>
                                        <label for="from">To :</label>
                                        <div class="input-group mb-3">
                                        <input type="date" id="birthdate" name="birthdate" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Date" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="contact_number">Contact Number :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="contact_number" name="contact_number" 
                                                        class="inp form-control" maxlength="11"  
                                                        placeholder="Input Contact Number" required="" />
                                            </div>
                                        </div>

                                        <label for="email">Email Address :</label>
                                        <div class="input-group mb-3">
                                        <input type="email"  id="email" name="email" 
                                                class="inp form-control" 
                                                placeholder="Input Email Address" required="">
                                        </div>
                                        
                                        <label for="street">Street :</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="street" name="street" 
                                                    class="inp form-control" 
                                                    placeholder="Input Street" required="">
                                        </div>

                                        <label for="purok">Purok/Area :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="purok" name="purok" 
                                                class="inp form-control" 
                                                placeholder="Input Purok/Area" required="">
                                        </div>

                                        <label for="citizenship">Citizenship :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="citizenship" name="citizenship" 
                                                class="inp form-control" 
                                                placeholder="Input Citizenship" required="">
                                        </div>

                                        <label for="disabled_person">Defferently Disabled Person :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="disabled_person" name="disabled_person" 
                                                class="inp form-control" 
                                                placeholder="Input Defferently Disabled Person" required="">
                                        </div>

                                        <label for="religion">Religion :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="religion" name="religion" 
                                                class="inp form-control" 
                                                placeholder="Input Religion" required="">
                                        </div>

                                        <label for="occupation">Occupation / Position :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="occupation" name="occupation" 
                                                class="inp form-control" 
                                                placeholder="Input Occupation" required="">
                                        </div>
                                        

                                        <label for="status">Status :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="status" name="status" 
                                                    class="inp form-control" 
                                                    placeholder="Input Status ex: Alive or Deceased" required="">
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
                            </div>
                            <!-- /.card-body -->
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