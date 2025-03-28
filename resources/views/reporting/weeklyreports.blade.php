@extends('layouts.master')



@section('title')

@lang('Weekly Reports')

@endsection



@section('css')

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- select2 css -->

<link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- bootstrap-datepicker css -->

<link href="{{ URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">



<!-- DataTables -->

<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Animate CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Responsive datatable examples -->

<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"

    type="text/css" />

<style type="text/css">
    .card1 {
        background-color: #FFFDEC !important;
    }

    .card2 {
        background-color: #E2F1E7 !important;
    }
</style>

@endsection



@section('content')

@component('components.breadcrumb')

@slot('li_1')

Reports

@endslot

@slot('title')

Weekly Reports

@endslot

@endcomponent



<div class="row">

    <div class="col-lg-12">

        <div class="card card1">

            <div class="card-body">

                <h4 class="card-title mb-3">Weekly Report Generation - Individual Client</h4>

                <form action="{{route('exportDataSingle')}}" method="get">
                    <input type="hidden" name="regenerationToken" value="">
                    <div class="row">

                        <div class="col-lg-3">

                            <label>Merchant</label>

                            <select name="clientName" class="form-control" required>
                                <option value="">
                                    Select Client
                                </option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->name }}">
                                    {{strtoupper($client->name) }}
                                </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-lg-3">

                            <label>From Date</label>
                            <input type="date" name="orderdatefrom" class="form-control from_date" required>

                        </div>

                        <div class="col-lg-3">

                            <label>To Date</label>
                            <input type="date" name="orderdateto" class="form-control to_date" required>

                        </div>

                        <div class="col-lg-3 mt-4">
                            <button type="submit" class="btn btn-success">Generate</button>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!--<div class="col-lg-12">-->

    <!--    <div class="card card2">-->

    <!--        <div class="card-body">-->

    <!--            <form action="{{route('exportData')}}" method="get">-->
    <!--                <input type="hidden" name="regenerationToken" value="">-->
    <!--                <div class="row">-->

                        
    <!--                    <div class="col-md-12">-->
                            <!-- Button trigger modal -->
    <!--                        <h4 class="card-title d-inline">Manual Weekly Report Generation - Whole Clients :   </h4>-->
    <!--                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">-->
    <!--                             Generate-->
    <!--                        </button>-->

                            <!-- Modal -->
    <!--                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--                            <div class="modal-dialog" role="document">-->
    <!--                                <div class="modal-content">-->
    <!--                                    <div class="modal-header">-->
    <!--                                        <h5 class="modal-title" id="exampleModalLabel">Weekly Report Generation</h5>-->
    <!--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                                            <span aria-hidden="true">&times;</span>-->
    <!--                                        </button>-->
    <!--                                    </div>-->
    <!--                                    <div class="modal-body">-->
    <!--                                        Are you sure to generate ?-->
    <!--                                        <span class="text-danger">(It will override the current reports)</span>-->
    <!--                                    </div>-->
    <!--                                    <div class="modal-footer">-->
    <!--                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
    <!--                                        <button type="submit" class="btn btn-success">Generate</button>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->

    <!--            </form>-->

    <!--        </div>-->

    <!--    </div>-->

    <!--</div>-->

    <div class="col-lg-12">

        <div class="card card3">

            <div class="card-body">

                <h4 class="card-title mb-3">Weekly Reports</h4>

                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                             <th scope="col">CLIENT</th>
                            <th scope="col">START DATE</th>
                            <th scope="col">END DATE</th>
                            <th scope="col">WEEKLY REPORT</th>
                            <th scope="col">Current Payout Balance</th>
                            <th scope="col">Net Payout Balance</th>
                            <th scope="col">STATUS</th>
                            @can('WeeklyReports.Download')
                                <th scope="col">APPROVE</th>
                                <th scope="col">REGENERATE</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($reports as $report)
                        @if($report->filePath !== null)
                        <tr>
                            <td>{{strtoupper(substr($report->clientName,11)) }}</td>
                            <td>{{$report->startDate}}</td>
                            <td>{{$report->endDate}}</td>                            
                            <td>
                               @if ($report->status == 1 || auth()->user()->can('WeeklyReports.Download'))
                                    <a type="button" class="btn btn-sm btn-primary" href="{{url($report->filePath)}}" target="_blank">Download <i class="bi bi-download"></i></a>
                                @else                                    
                                    <a type="button" class="btn btn-sm btn-secondary disabled">Pending<i class="bi bi-download"></i></a>
                                @endif
                            </td>                               
                            <td>${{ number_format((float) $report->payoutAmt ?? 0, 2) }}</td>
                            <td>${{ number_format(optional($report->clientDetails)->payOutBalance ?? 0, 2) }}</td>
                            <td>
                                @if($report->status == null)
                                <span class="badge bg-primary animate__animated animate__tada animate__slow">New</span>
                                @elseif($report->status == 0)
                                <span class="badge bg-success">Rejected</span>
                                @elseif($report->status == 1)
                                <span class="badge bg-success">Approved</span>
                                @endif
                            </td>
                            @can('WeeklyReports.Download')
                            <td>
                                @if($report->status !== 1)
                                <form action="{{route('approveReport', $report->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" target="_blank">Approve <i class="bi bi-check-circle-fill"></i></button>
                                </form>
                                @else
                                <form action="{{route('revertApproval', $report->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning" target="_blank"><i class="bi bi-arrow-left-circle-fill"></i> Revert Approval</button>
                                </form>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('exportDataSingle')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="orderdatefrom" value="{{$report->startDate}}">
                                    <input type="hidden" name="orderdateto" value="{{$report->endDate}}">
                                    <input type="hidden" name="clientName" value="{{$report->clientName}}">
                                    <input type="hidden" name="regenrationToken" value="Regeneration">

                                    @if($report->status !== 1)
                                    <button type="submit" class="btn btn-sm btn-info">Regenerate <i class="bi bi-arrow-clockwise"></i></button>
                                    @else
                                    <button type="submit" class="btn btn-sm btn-secondary disabled">Regenerate <i class="bi bi-arrow-clockwise"></i></button>
                                    @endif
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>



            </div>

        </div>

    </div>

</div>

<!-- end row -->

@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- select2 -->

<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

<!-- bootstrap-datepicker js -->

<script src="{{ URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>



<!-- Required datatable js -->

<script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>



<!-- Responsive examples -->

<script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>

<script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>



<!-- init js -->

<script src="{{ URL::asset('build/js/pages/crypto-orders.init.js') }}"></script>

@endsection