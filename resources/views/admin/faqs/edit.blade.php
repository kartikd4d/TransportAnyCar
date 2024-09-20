@extends('layouts.master')

@section('title')
    @lang('translation.Form_Layouts')
@endsection

@section('content')
    <style>
        .iti__flag-container{
            height: 37px;
        }
    </style>
    @include('components.breadcum')
    <div class="row">
        <div class="col-12">
        </div>
        <div class="card">
            <div class="card-body">
                <form class="" name="main_form" id="main_form" method="post"
                      action="{{route('admin.faqs.update',$data->id)}}" enctype="multipart/form-data">
                    {!! get_error_html($errors) !!}
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            <span class="text-danger">*</span>Title
                        </label>
                        <div class="col-md-10">
                            <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}" placeholder="Enter title">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            <span class="text-danger">*</span>Description
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="content" name="content" placeholder="{{__('Description')}}" rows="4">{!! $data->content !!}</textarea>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="">
                            <div class="row">
                                <div class="wd-sl-modalbtn">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"
                                            id="save_changes">Submit
                                    </button>
                                    <a href="{{route('admin.faqs.index')}}" id="close">
                                        <button type="button" class="btn btn-outline-secondary waves-effect">Cancel
                                        </button>
                                    </a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
    });
    $("#main_form").validate({
        ignore:'',
        rules: {
            title: {required: true},
            content: {required: true},
        },
        messages: {
            title: {required: "Please enter title"},
            content: {required: "Please enter description"},
        },
        errorPlacement: function (error, element) {
            if (element.attr("id") == "content") {
                error.insertAfter($(element).parent().children().last());
            } else {
                error.insertAfter($(element));
            }
        },
        submitHandler: function (form) {
            addOverlay();
            form.submit();
        }
    });
</script>
@endsection

