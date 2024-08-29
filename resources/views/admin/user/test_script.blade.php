@extends('layouts.master')

@section('content')
@section('title')
@lang('translation.Form_Layouts')
@endsection @section('content')
@include('components.breadcum')
<div class="row">
    <div class="col-12">
    </div>
    <div class="card">
        <div class="card-body">
                <form class="" name="main_form" id="main_form" method="post" action="{{route('admin.test_script.store')}}" enctype="multipart/form-data">
                 {!! get_error_html($errors) !!}
                @csrf
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>City</label>
                    <div class="col-md-10">
                        <select name="user_id" class="form-control">
                            <option value="">Select User</option>
                        @if(isset($users) && count($users) > 0)
                            @foreach($users as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>{{__('Image')}}</label>
                    <div class="col-md-10">
                        <input type="file" accept="image/*" id="document" class="form-control" name="document">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Type</label>
                    <div class="col-md-10">
                        <?php
                            $types = ["aadhar_front","aadhar_back","driving_license","pan_card"];
                        ?>
                        <select name="type" class="form-control">
                            <option value="">Select type</option>
                            @foreach($types as $type)
                            <option value="{{$type}}" {{(isset($point->type) && $point->type == $type) ? "selected" : ""}}>{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class=" ">
                        <div class="row">
                            <div class="wd-sl-modalbtn">
                                <button  type="submit" class="btn btn-primary waves-effect waves-light" id="save_changes">Submit</button>
                                <a href="{{route('admin.points.index')}}" id="close"><button type="button" class="btn btn-outline-secondary waves-effect">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/utils.js"></script>
    
<script>
        $(function () {

            $("#main_form").validate({
                rules: {
                    name: {required: true},
                    city_id: {required: true},
                    type: {required: true},
                },
                messages: {
                    name: {required: "Please Enter Point Name"},
                    city_id: {required: "Please Select City"},
                    type: {required: "Please Select Point Type"},
                },
                submitHandler: function (form) {
                    addOverlay();
                    form.submit();
                }
            });
        });
    </script>
@endsection