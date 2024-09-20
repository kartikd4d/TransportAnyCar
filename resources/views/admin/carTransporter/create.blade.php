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
            @if(isset($data) && !empty($data))
            <form class="" name="main_form" id="main_form" method="post" action="{{route('admin.carTransporter.update',$data->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @else
            <form class="" name="main_form" id="main_form" method="post" action="{{route('admin.carTransporter.store')}}" enctype="multipart/form-data">
            @endif
                 {!! get_error_html($errors) !!}
                @csrf
                <input type="hidden" name="country_code" id="country_code" value="{{empty($data->country_code)?"+1":$data->country_code}}">
                @if(isset($data))
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('Profile Image')}}</label>
                    <div class="col-md-8">
                        <input type="file" accept="image/*" id="profile_image" class="form-control" name="profile_image">
                    </div>
                    <div class="col-md-2">
                        <a target="_blank" href="{{$data->profile_image}}"><img src="{{$data->profile_image}}" alt="img" height="40" width="40" /></a>
                    </div>
                </div>
                @else
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('Profile Image')}}</label>
                    <div class="col-md-10">
                        <input type="file" accept="image/*" id="profile_image" class="form-control" name="profile_image">
                    </div>
                </div>
                @endif
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Name</label>
                    <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name', ($data->name) ?? '')}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>{{__('Number')}}</label>
                    <div class="col-md-10">
                        <input type="text" id="number" name="mobile" class="form-control" maxlength="10" value="{{old('country_code',  ($data->country_code) ?? '' )}} {{old('mobile',  ($data->mobile) ?? '' )}}" minlength="5">
                        <div><label id="number-error" class="error" for="number"></label>    </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>email</label>
                    <div class="col-md-10">
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email', ($data->email) ?? '')}}">
                    </div>
                </div>
                @if(!isset($data) && empty($data))
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"> <span class="text-danger">*</span>Password</label>
                    <div class="col-md-10">
                        <input type="password" name="password" id="npassword" class="form-control" placeholder="Please Enter New Password." data-error-container="#error_npassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Confirm Password</label>
                    <div class="col-md-10">
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Please Enter Confirm Password." data-error-container="#error_cpassword">
                    </div>
                </div>
                @endif
                <div class="kt-portlet__foot">
                        <div class=" ">
                          <div class="row">
                            <div class="wd-sl-modalbtn">
                                <button  type="submit" class="btn btn-orange waves-effect waves-light" id="save_changes">Submit</button>
                                <a href="{{route('admin.carTransporter.index')}}" id="close"><button type="button" class="btn btn-outline-secondary waves-effect">Cancel</button></a>

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
        $('#number').intlTelInput({
            nationalMode: false,
            separateDialCode: true,
            formatOnDisplay: false,
        }).on("countrychange", function () {
            $('#country_code').val('+' + $(this).intlTelInput("getSelectedCountryData").dialCode);
        });

        $("#main_form").validate({
            rules: {
                name: {required: true},
                email: {required: true},
                mobile: {
                    required: true,
                    digits: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                cpassword: {
                    required: true,
                    equalTo: "#npassword",
                }
            },
            messages: {
                name: {required: "Please enter name"},
                email: {required: "Please enter email"},
                mobile: {required: 'Please enter number'},
                email: {required: 'Please enter email'},
                password: {
                    required: "Please Enter New Password.",
                    minlength: "Please Enter minimum 6 character for password",

                },
                cpassword: {
                    required: "Please Enter Confirm Password.",
                    equalTo: "Confirm Password does not match with new password.",
                }
            },
            submitHandler: function (form) {
                addOverlay();
                form.submit();
            }
        });
    });
</script>
@endsection
