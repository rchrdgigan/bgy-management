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
        <table id="list_item" class="table table-bordered table-striped">
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
            @foreach($officials as $data)
            <tr>
                <td hidden="">{{$data->id}}</td>
                <td><img src="/storage/official_image/{{$data->image}}" height="30" class="brand-image img-circle elevation-3"></td>
                <td>{{$data->fname}} {{$data->mname}} {{$data->lname}}</td>
                <td>{{$data->position}}</td>
                <td>{{Carbon\Carbon::parse($data->from)->format('M d, Y')}} - {{Carbon\Carbon::parse($data->to)->format('M d, Y')}}</td>
                <td>{{$data->purok}}</td>
                <td>
                    <button type="submit" class="btn btn-danger .btn-sm" data-toggle="modal" id="{{$data->id}}" data-target="#showModal">
                        <i class="fas fa-trash"></i>
                    </button>
                    <a href="" class="btn btn-success .btn-sm"
                        id="{{$data->id}}"
                        fname="{{$data->fname}}"
                        mname="{{$data->mname}}"
                        lname="{{$data->lname}}"
                        nname="{{$data->nname}}"
                        gender="{{$data->gender}}"
                        civil_status="{{$data->civil_status}}"
                        age="{{$data->age}}"
                        from="{{Carbon\Carbon::parse($data->from)->format('Y-m-d')}}"
                        to="{{Carbon\Carbon::parse($data->to)->format('Y-m-d')}}"
                        cnumber="{{$data->cnumber}}"
                        bday="{{Carbon\Carbon::parse($data->bday)->format('Y-m-d')}}"
                        bplace="{{$data->bplace}}"
                        email="{{$data->email}}"
                        street="{{$data->street}}"
                        purok="{{$data->purok}}"
                        citizenship="{{$data->citizenship}}"
                        religion="{{$data->religion}}"
                        position="{{$data->position}}"
                        status="{{$data->status}}"
                        image="/storage/official_image/{{$data->image}}"
                        data-toggle="modal" 
                        data-target="#editOfficialModal">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
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
                <form action="{{route('add.official')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-3 connectedSortable ui-sortable">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user"></i> Profile Picture</h3>
                            </div>
                            <div class="card-body box-profile">
                                <div class="profile-pic">
                                    <div class="text-center mb-2">
                                        <img class="brand-image img-circle elevation-3" height="200" width="200" src="{{ asset('images/no-picture.png')}}"  id="output">
                                    </div>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input id="file" type="file" name="image" class="custom-file-input" onchange="loadFile(event)"/>
                                                        <label class="custom-file-label" for="file">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
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
                                                placeholder="Set birthdate to generate age" readonly required="">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="from">Term From :</label>
                                                <div class="input-group mb-3">
                                                <input type="date" id="from" name="from" 
                                                        class="inp form-control" 
                                                        placeholder="Input Birth Date" required="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="to">To :</label>
                                                <div class="input-group mb-3">
                                                <input type="date" id="to" name="to" 
                                                        class="inp form-control" 
                                                        placeholder="Input Birth Date" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label for="contact_number">Contact Number :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="contact_number" name="contact_number" 
                                                        class="inp form-control" maxlength="11"  
                                                        placeholder="Input Contact Number" required="" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <label for="birthdate">Birth Date :</label>
                                        <div class="input-group mb-3">
                                        <input type="date" id="birthdate" onchange="myFunction()" name="birthdate" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Date" required="">
                                        </div>

                                        <label for="bplace">Birth Place :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="bplace" name="bplace" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Place" required="">
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

                                        <label for="religion">Religion :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="religion" name="religion" 
                                                class="inp form-control" 
                                                placeholder="Input Religion" required="">
                                        </div>

                                        <label for="occupation">Position :</label>
                                        <div class="input-group mb-3">
                                            <select name="position"  id="occupation" class="inp form-control" style="width: 100%;" aria-hidden="true" required="">
                                                <option value="Punong Barangay">Punong Barangay</option>
                                                <option value="Brgy. Secretary">Brgy. Secretary</option>
                                                <option value="Kagawad">Kagawad</option>
                                                <option value="SK Chairman">SK Chairman</option>
                                            </select>
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
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDit Official -->
<div class="modal fade bd-example-modal-xl" id="editOfficialModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Official Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container p-3">
                <form action="{{route('update.official')}}" method="post" id="updateOfficial" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-3 connectedSortable ui-sortable">
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user"></i> Profile Picture</h3>
                            </div>
                            <div class="card-body box-profile">
                                <div class="profile-pic">
                                    <div class="text-center mb-2">
                                        <img class="brand-image img-circle elevation-3" height="200" width="200" src="{{ asset('images/no-picture.png')}}" id="image">
                                    </div>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input id="file" type="file" name="image" onchange="loadFile(event)"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        </section>
                        <!-- /.Left col -->
                        
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-9 connectedSortable ui-sortable">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-info"></i> Official Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="id" hidden>
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
                                                <input id="ma" class="form-check-input" type="radio" value="Male" name="gender" required="">
                                                <label for="male" class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check ml-5 p-3">
                                                <input id="fe" class="form-check-input" type="radio" value="Female" name="gender" required="">
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
                                        <input type="number" id="editage" name="age" 
                                                class="inp form-control" 
                                                placeholder="Set birthdate to generate age" readonly required="">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="from">Term From :</label>
                                                <div class="input-group mb-3">
                                                <input type="date" id="from" name="from" 
                                                        class="inp form-control" 
                                                        placeholder="Input Birth Date" required="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="to">To :</label>
                                                <div class="input-group mb-3">
                                                <input type="date" id="to" name="to" 
                                                        class="inp form-control" 
                                                        placeholder="Input Birth Date" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label for="contact_number">Contact Number :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="contact_number" name="contact_number" 
                                                        class="inp form-control" maxlength="11"  
                                                        placeholder="Input Contact Number" required="" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <label for="birthdate">Birth Date :</label>
                                        <div class="input-group mb-3">
                                        <input type="date" id="editbirthdate" onchange="editFunction()" name="birthdate" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Date" required="">
                                        </div>

                                        <label for="bplace">Birth Place :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="bplace" name="bplace" 
                                                class="inp form-control" 
                                                placeholder="Input Birth Place" required="">
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

                                        <label for="religion">Religion :</label>
                                        <div class="input-group mb-3">
                                        <input type="text" id="religion" name="religion" 
                                                class="inp form-control" 
                                                placeholder="Input Religion" required="">
                                        </div>

                                        <label for="occupation">Position :</label>
                                        <div class="input-group mb-3">
                                            <select name="position"  id="occupation" class="inp form-control" style="width: 100%;" aria-hidden="true" required="">
                                                <option value="Punong Barangay">Punong Barangay</option>
                                                <option value="Brgy. Secretary">Brgy. Secretary</option>
                                                <option value="Kagawad">Kagawad</option>
                                                <option value="SK Chairman">SK Chairman</option>
                                            </select>
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
                                        <button type="submit" class="btn btn-warning btn-block">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        </section>
                        <!-- right col -->
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Yes Or No  -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('delete.official')}}" method="post" id="delete_frm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input hidden name="id" type="text">
                    <p>Are you sure you want to delete this data?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Yes</button>
                    <a class="btn btn-info" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection