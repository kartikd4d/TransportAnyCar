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
        /* ul.document_list {
            list-style: auto;
            margin-left: -19px;} */
        .document-list {
            width: 100%;
            max-width: 100%;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .document-item {
            display: block;
        }
        .document-item .col-lg-6 {
            width: 100%;
            max-width: 100%;
        }
        .document-item .col-lg-6 .form-group {
            margin-bottom: 0;
        }
        .document-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
}

.document-name {
    flex: 1;
}
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2" style="border-left: 1px solid #5bc0de;padding:10px;"><h5 class="mb-0">Transporter details</h5></div>
                        <div class="row mb-1">
                            <div class="col-md-3">Profile Image:</div>
                            <div class="col-md-9">{!! get_fancy_box_html(get_asset($data->profile_image)) !!}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">Company name:</div>
                            <div class="col-md-9">{{$data->name}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">Full name:</div>
                            <div class="col-md-9">{{$data->first_name}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">Mobile:</div>
                            <div class="col-md-9">{{($data->mobile) ? $data->country_code.' '.$data->mobile :  '-'}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">Email:</div>
                            <div class="col-md-9">{{$data->email}}</div>
                        </div>
                        <!-- <div class="row mb-1">
                            <div class="col-md-3">Addresssss:</div>
                            <div class="col-md-9">{{$data->address_line_1}}<br>{{$data->town}},{{$data->postcode}},{{$data->county}}  </div>
                        </div> -->
                        <div class="row mb-1">
                            <div class="col-md-3">Status:</div>
                            <div class="col-md-9">{!! user_status($data->status,$data->deleted_at) !!}</div>
                        </div>
                        @if($data->driver_license != null || $data->goods_in_transit_insurance != null || $data->motor_trade_insurance != null)
                        <div class="row mb-1">
                            <div class="col-md-3">Documents :</div>
                            <div class="col-md-9">
                            <div class="document-list">
                                @if($data->driver_license != null)
                                <div class="document-item">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <a href="{{ url($data->driver_license) }}" class="document-name" target="_blank" title="Click to see the document">Valid driving license</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($data->goods_in_transit_insurance != null)
                                <div class="document-item">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <a href="{{ url($data->goods_in_transit_insurance) }}" class="document-name" target="_blank" title="Click to see the document">Goods in transit insurance</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($data->motor_trade_insurance != null)
                                <div class="document-item">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <a href="{{ url($data->motor_trade_insurance) }}" class="document-name" target="_blank" title="Click to see the document">Motor trade insurance</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <input type="hidden" class="user_id" name="user_id" value="{{$data->id}}">
                                @if($data->is_status == 'pending' || $data->is_status === null)
                                    <button class="btn btn-success update_status_btn">Approve or Reject</button>        
                                @elseif($data->is_status == 'rejected')
                                    <button class="btn btn-success accept_btn">Approve</button>
                                @else
                                    <button class="btn btn-danger reject_btn">Reject</button>      
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display:none;">
                <div class="card">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Events List</button>
                              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Freinds</button>
                          </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <table id="events_listResults" class="table table-responsive dt-responsive mb-4  nowrap w-100 mb-">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Km</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table id="freinds_listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
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
                    </div>
                </div>
            </div>
            @endsection

            @section('script')
            <script src="{{asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('.update_status_btn').click(function(){
                            Swal.fire({
                            title: 'Approve or Reject?',
                            text: 'Choose whether to approve or reject this Transporter.',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Approve',
                            confirmButtonColor: '#34c38f',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Reject'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                update_transporter_status('approved');
                                $('.update_status_btn').html('Approved');
                                $('.update_status_btn').prop('disabled', true);
                                $('.update_status_btn').addClass('btn-success');
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                update_transporter_status('rejected');
                                $('.update_status_btn').html('Rejected');
                                $('.update_status_btn').prop('disabled', true);
                                $('.update_status_btn').addClass('btn-danger');
                            }
                        });
                    });
                    $('.accept_btn').click(function(){
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Do you want to approve this?",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#34c38f',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, approve it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                update_transporter_status('approved');
                                $('.accept_btn').html('Approved');
                                $('.accept_btn').prop('disabled', true);
                                $('.accept_btn').addClass('btn-success');
                            }
                        }); 
                    });
                    $('.reject_btn').click(function(){
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Do you want to reject this?",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, reject it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                update_transporter_status('rejected');
                                $('.reject_btn').html('Rejected');
                                $('.reject_btn').prop('disabled', true);
                                $('.reject_btn').addClass('btn-danger');
                            }
                        }); 
                    })
                });
                function update_transporter_status(status){
                    var user_id=$('.user_id').val();
                    $.ajax({
                        url: '{{route('admin.carTransporter.t_status')}}',
                        type: 'POST',
                        dataType:'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { user_id: user_id, status:status },
                        success: function(response){
                            if(response.result){
                                if(response.tStatus == 'approved')
                                    Swal.fire('Approved!', 'Transporter has been approved.', 'success');
                                else 
                                    Swal.fire('Rejected!', 'Transporter has been rejected.', 'error');
                            }
                            else {
                                alert(response.tStatus);
                           }
                       },
                       error: function(xhr, status, error){
                        alert("Error: " + error);
                    }
                });
                }
            </script>
            @endsection
