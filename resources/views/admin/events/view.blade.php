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

    .description-toggle {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="mb-2" style="border-left: 1px solid #5bc0de;padding:10px;"><h5 class="mb-0">Event Details</h5></div>

                <div class="row mb-1">
                    <div class="col-md-3">Title:</div>
                    <div class="col-md-9">{{$data->title}}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Category:</div>
                    <div class="col-md-9">{{$data->categories->category_title??''}}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Description:</div>
                    <div class="col-md-9">
                        <p>
                            <span id="description-{{ $data->id }}">{{ Str::limit($data->description, 100) }}</span>
                            <span id="full_length" style="display:none;">{{$data->description}}</span>
                            @if (strlen($data->description) > 100)
                                <span id="toggle-{{ $data->id }}" class="description-toggle" onclick="toggleDescription({{ $data->id }})">
                                    Read more
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Km:</div>
                    <div class="col-md-9">{{$data->km??''}}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Date:</div>
                    <div class="col-md-9">{{$data->event_start_date_time??''}}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Starting Location:</div>
                    <div class="col-md-9">{{$data->location??''}}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Ending Location:</div>
                    <div class="col-md-9">{{$data->end_location??''}}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Status:</div>
                    <div class="col-md-9">{!! user_status($data->status,$data->deleted_at) !!}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab_participant">Participant List</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab_deduction">Deduction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab_user_challanges">Challnges</a>
                </li> --}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_participant" role="tabpanel">
                    <table id="participant_listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profile Image</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                {{-- <div class="tab-pane" id="tab_deduction" role="tabpanel">
                    <!--begin: Datatable -->
                    <table class="kt-datatable" id="deduction_listResults" width="100%">

                    </table>
                    <!--end: Datatable -->
                </div>
                <div class="tab-pane" id="tab_user_challanges" role="tabpanel">
                    <!--begin: Datatable -->
                    <table class="kt-datatable" id="userChallange_listResults" width="100%">

                    </table>
                    <!--end: Datatable -->
                </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        oTable1 = $('#participant_listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": {
                url: "{{route('admin.events.particiapnt_list',$data->id)}}",
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
                    "data": "profile_image",
                    sortable: false
                },
                {
                    "data": "name",
                    sortable: false
                },
                {
                    "data": "email",
                    sortable: false
                },
            ]
        });

    });

    function toggleDescription(id) {
        const description = document.getElementById(`description-${id}`);
        const toggle = document.getElementById(`toggle-${id}`);
        const full_length=document.getElementById(`full_length`);
        if (description.style.display === 'none') {
            description.style.display = 'block';
            full_length.style.display="none"
            toggle.textContent = 'Read more';
        } else {
            full_length.style.display="block"
            description.style.display = 'none';
            toggle.textContent = 'Read less';
        }
    }

</script>
@endsection
