@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-all-tab" data-toggle="pill" href="#custom-tabs-all" role="tab" aria-controls="custom-tabs-all" aria-selected="true"><i class="fas fa-file"></i> All</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-tabs-clearance-tab" data-toggle="pill" href="#custom-tabs-clearance" role="tab" aria-controls="custom-tabs-clearance" aria-selected="false"><i class="fas fa-file-invoice"></i> Clearance</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " id="custom-tabs-tabs-business-tab" data-toggle="pill" href="#custom-tabs-business" role="tab" aria-controls="custom-tabs-business" aria-selected="false"><i class="fas fa-file-contract"></i> Business Permit</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-indigency-tab" data-toggle="pill" href="#custom-tabs-indigency" role="tab" aria-controls="custom-tabs-indigency" aria-selected="false"><i class="fas fa-file-invoice-dollar"></i> Indigency</a>
            </li>
        </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-all" role="tabpanel" aria-labelledby="custom-tabs-all-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="all_data" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Name</th>
                                <th>Generated Type</th>
                                <th>Purpose</th>
                                <th>Date Issued</th>
                                <th>Date Expired</th>
                                <th>OR Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($issue_all as $d1)
                                <tr>
                                    <td hidden="">{{$d1->id}}</td>
                                    <td>
                                        @foreach($d1->resident_issue_certificate->take(1) as $sub_d1)
                                            {{$sub_d1->fname}} {{$sub_d1->mname}} {{$sub_d1->lname}}
                                        @endforeach
                                    </td>
                                    <td>{{$d1->generated_type}}</td>
                                    <td><?php echo nl2br(html_entity_decode($d1->purpose))?></td>
                                    <td>{{$d1->date_issue}}</td>
                                    <td>{{$d1->date_expire}}</td>
                                    <td>{{$d1->or_number}}</td>
                                    <td>
                                        @if($d1->generated_type == 'Clearance')
                                        <a href="{{route('print.clearance',$d1->id)}}"><i class="fas fa-print"></i> Print</a>
                                        @elseif($d1->generated_type == 'Business Permit')
                                        <a href="{{route('print.business')}}"><i class="fas fa-print"></i> Print</a>
                                        @elseif($d1->generated_type == 'Indigency')
                                        <a href="{{route('print.indigency')}}"><i class="fas fa-print"></i> Print</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>


                <div class="tab-pane fade" id="custom-tabs-clearance" role="tabpanel" aria-labelledby="custom-tabs-clearance-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="certificate_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden=""></th>
                                <th>Name</th>
                                <th>Generated Type</th>
                                <th>Purpose</th>
                                <th>Date Issued</th>
                                <th>Date Expired</th>
                                <th>OR Number</th>
                                <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issue_clearance as $d2)
                            <tr>
                                <td hidden="">{{$d2->id}}</td>
                                <td>
                                    @foreach($d2->resident_issue_certificate->take(1) as $sub_d1)
                                        {{$sub_d1->fname}} {{$sub_d1->mname}} {{$sub_d1->lname}}
                                    @endforeach
                                </td>
                                <td>{{$d2->generated_type}}</td>
                                <td><?php echo nl2br(html_entity_decode($d2->purpose))?></td>
                                <td>{{$d2->date_issue}}</td>
                                <td>{{$d2->date_expire}}</td>
                                <td>{{$d2->or_number}}</td>
                                <td>
                                    <a href="{{route('print.clearance',$d2->id)}}"><i class="fas fa-print"></i> Print</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-business" role="tabpanel" aria-labelledby="custom-tabs-business-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="business_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Name</th>
                                <th>Generated Type</th>
                                <th>Purpose</th>
                                <th>Date Issued</th>
                                <th>Date Expired</th>
                                <th>OR Number</th>
                                <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issue_business as $d3)
                            <tr>
                                <td hidden="">{{$d3->id}}</td>
                                <td>
                                    @foreach($d3->resident_issue_certificate->take(1) as $sub_d1)
                                        {{$sub_d1->fname}} {{$sub_d1->mname}} {{$sub_d1->lname}}
                                    @endforeach
                                </td>
                                <td>{{$d3->generated_type}}</td>
                                <td><?php echo nl2br(html_entity_decode($d3->purpose))?></td>
                                <td>{{$d3->date_issue}}</td>
                                <td>{{$d3->date_expire}}</td>
                                <td>{{$d3->or_number}}</td>
                                <td>
                                    <a href="{{route('print.business')}}"><i class="fas fa-print"></i> Print</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-indigency" role="tabpanel" aria-labelledby="custom-tabs-indigency-tab">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="indigency_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Name</th>
                                <th>Generated Type</th>
                                <th>Purpose</th>
                                <th>Date Issued</th>
                                <th>Date Expired</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issue_indigency as $d4)
                            <tr>
                                <td hidden="">{{$d4->id}}</td>
                                <td>
                                    @foreach($d4->resident_issue_certificate->take(1) as $sub_d1)
                                        {{$sub_d1->fname}} {{$sub_d1->mname}} {{$sub_d1->lname}}
                                    @endforeach
                                </td>
                                <td>{{$d4->generated_type}}</td>
                                <td><?php echo nl2br(html_entity_decode($d4->purpose))?></td>
                                <td>{{$d4->date_issue}}</td>
                                <td>{{$d4->date_expire}}</td>
                                <td>
                                    <a href="{{route('print.indigency')}}"><i class="fas fa-print"></i> Print</a>
                                </td>
                            </tr>
                            @endforeach
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

@endsection