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
                            @foreach($disaster as $data)
                            <tr>
                                <td hidden="">{{$data->id}}</td>
                                <td>{{$data->type}}</td>
                                <td>{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</td>
                                <td>{{$data->purok_street}}</td>
                                <td>
                                <form action="{{route('del.notif',$data->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger m-1 .btn-sm"
                                        type="submit" 
                                        class="btn btn-primary">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
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
            <div class="modal-body">
                <?php 

                    function itexmo($number,$message,$apicode,$passwd){
                        $ch = curl_init();
                        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
                        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 
                                http_build_query($itexmo));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        return curl_exec ($ch);
                        curl_close ($ch);
                    }

                    if($_POST)
                    {
                        foreach($resident as $data2)
                        {
                            $name = $_POST['name'];
                            $msg = $_POST['msg'];
                            $number = $data2->cnumber;
                            $api = "TR-RICHA827042_F42CS";
                            $api_pass = "wp!5676#q$";
    
                            $text = $name." : ".$msg;
                            if(!empty($_POST['name']) && ($_POST['msg']))
                            {               
                                $result = itexmo($number,$msg,$api,$api_pass);
                                if ($result == ""){
                                    echo "iTexMo: No response from server!!!
                                    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
                                    Please CONTACT US for help. ";	
                                }else if ($result == 0){
                                    echo "<div class='alert alert-success alert-dismissible'>
                                            Flood Notification Alert Sent!
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";
                                }
                                else{	
                                    echo "<div class='alert alert-danger alert-dismissible'>
                                            Error Num ". $result . " was encountered!
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";
                                }
                            }
                        }
                    }
                ?>
                <div class="row">
                    <div class="col-6 text-center">
                        <a class="btn btn-danger p-5 col-12" href="{{route('fire.form')}}"><i class="fas fa-dumpster-fire text-white" style="font-size:200px;"></i><br><b>Fire Notifier</b></a>
                    </div> 
                    
                    <div class="col-6 text-center">
                        <form action="{{route('flood.notif')}}" method="POST">
                            @csrf
                            <input type="text" name="name" value="Brgy. Secretary" hidden>
                            <input type="text" name="msg" value="BRGY. ALERT: Ang baha ay posibleng pang tumaas kaya magsilikas na ang mga nasa mabababang lugar." hidden>
                            <button type="submit" class="btn btn-primary p-5 col-12"><i class="fas fa-cloud-rain text-white" style="font-size:200px;"></i><br><b>Flood Notifier</b></button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection