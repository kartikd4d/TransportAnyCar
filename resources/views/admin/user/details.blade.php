@extends('layouts.master')
@section('content')

@include('components.breadcum')
<link href="{{ URL::asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css"/>
<style>
    .w-200{
        width: 150px;
        height: 150px;
        margin-right: 10px;
        padding: 5px;
        border: 1px solid #c2c2c2;
    }
</style>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="mb-2" style="border-left: 1px solid #5bc0de;padding:10px;"><h5 class="mb-0">User Quote Details</h5></div>
                <div class="row mb-1">
                    <div class="col-md-3">Image:</div>
                    <div class="col-md-9">{!! get_fancy_box_html(get_asset($data->image)) !!}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Pickup Postcode:</div>
                    <div class="col-md-6">{{$data->pickup_postcode}}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Drop Postcode:</div>
                    <div class="col-md-6">{{($data->drop_postcode) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Starts Drives:</div>
                    <div class="col-md-6">{{($data->starts_drives) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Operable:</div>
                    <div class="col-md-6">{{($data->operable) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Vehicle Moved:</div>
                    <div class="col-md-6">{{($data->how_moved) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Delivery From:</div>
                    <div class="col-md-6">{{($data->delivery_timeframe_from) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Delivery To:</div>
                    <div class="col-md-6">{{($data->delivery_timeframe_to) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Delivery Timeframe:</div>
                    <div class="col-md-6">{{($data->delivery_timeframe) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Email:</div>
                    <div class="col-md-6">{{($data->email) }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6">Status:</div>
                    <div class="col-md-6">{!! user_status($data->status,$data->deleted_at) !!}</div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
               
             
                    <table id="vehicle_details_listResults" class="table table-responsive dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Vehicle Make</th>
                                <th>Vehicel Model</th>
                                
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
               
                
              
               
               
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        oTable = $('#vehicle_details_listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": {
                url: "{{route('admin.user.vehicle_details_list',$data->id)}}",
                // data: function (d) {
                //     d.type = $('#referral_type').val()
                // }
            },
            "columns": [{
                    "data": "id",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "vehicle_make",
                    sortable: false
                },
                {
                    "data": "vehicel_model",
                    sortable: false
                },
               
               
            ]
        });


    
    
      

     
    });

</script>
@endsection
