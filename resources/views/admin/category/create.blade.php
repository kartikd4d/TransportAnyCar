@extends('layouts.master')

@section('content')
@section('title')
@lang('translation.Form_Layouts')
@endsection @section('content')
@include('components.breadcum')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css"/>
<div class="row">
    <div class="col-12">
    </div>
    <div class="card">
        <div class="card-body">
            @if(isset($data) && !empty($data))
            <form class="" name="main_form" id="main_form" method="post" action="{{route('admin.categories.update',$data->id)}}" enctype="multipart/form-data">
                @method('PATCH')
            @else
            <form class="" name="main_form" id="main_form" method="post" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
            @endif
                 {!! get_error_html($errors) !!}
                @csrf
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Name</label>
                    <div class="col-md-10">
                        <input type="text" name="category_title" id="category_title" class="form-control" value="{{($data->category_title) ?? ''}}">
                    </div>
                </div>


                <div class="kt-portlet__foot">
                    <div class=" ">
                        <div class="row">
                            <div class="wd-sl-modalbtn">
                                <button  type="submit" class="btn btn-orange waves-effect waves-light" id="save_changes">Submit</button>
                                <a href="{{route('admin.categories.index')}}" id="close"><button type="button" class="btn btn-outline-secondary waves-effect">Cancel</button></a>

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
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script>
        $(function () {

            $("#main_form").validate({
                rules: {
                    category_title: {required: true},
                },
                messages: {
                    category_title: {required: "Please Enter Category Name"},
                },
                submitHandler: function (form) {
                    addOverlay();
                    form.submit();
                }
            });
        });
    </script>
@endsection
