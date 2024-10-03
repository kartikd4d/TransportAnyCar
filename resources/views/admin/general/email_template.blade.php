@extends('layouts.master')
@section('content')
@section('title')
@lang('translation.Form_Layouts')
@endsection @section('content')
@include('components.breadcum')
<style type="text/css">
    .email_header {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;gap: 15px;
    }
    .select_email_temp {
        display: flex;
        align-items: center;width: 47%;
    }
    .select_email_temp label {
        width: 35.5%;
        margin-bottom: 0;
    }
    .select_box_arrow {
        width: 55%;
        position: relative;
    }
    .select_box_arrow:before {
        content: '';
        display: block;
        position: absolute;
        top: 10px;
        right: 12px;
        width: 10px;
        height: 10px;
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        transform: rotate(45deg);
        z-index: 0;
    }
    .select_box_arrow select#email_temp {
        cursor: pointer;
        background: transparent !important;
        z-index: 1;
        position: relative;
    }
    .send_test_email {
        width: 30%;
        margin-left: auto;
        position: relative;
    }
    .send_test_emai {
        width: 16%;
        background: #0173ca !important;
        border-radius: 33px;
    }
    .send_test_email span.erro.test_email {
        position: absolute;
        color: red;
        font-weight: 200;
        font-size: 13px;
        left: 0;
    }
    .swal2-confirm {
        background-color: #0173ca !important;
        color: #fff;
    }
    @media(max-width: 767px){
        .email_header {
            gap: 15px;
            flex-wrap: wrap;
        } 
        .select_email_temp {
            width: 100%;
            flex-wrap: wrap;
        }
        .select_email_temp label {
            width: 100%;
            margin-bottom: 3px;
        }
        .select_box_arrow {
            width: 100%;
        }
        .send_test_email {
            width: 100%;
            margin-bottom: 20px;
        }
        .send_test_emai {
            width: max-content;
        }



    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="email_header">
                    <div class="select_email_temp">
                        <label for="email_temp">Select email template</label>
                        <div class="select_box_arrow">
                            <select  class="form-control email_temp" id="email_temp">
                                <option value="">Select Email template</option>
                                @foreach($emailTemplates as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="send_test_email">
                        <input type="email" name="to_email" class="form-control test_email_to" placeholder="Email address">
                        <span class="erro test_email" style="display:none">Please enter test email</span>
                    </div>
                    <button class="btn send_test_emai btn-primary">Send a test email</button>
                </div>
                <form class="" name="form_cpass" id="form_email_template" method="post" enctype="multipart/form-data">
                    @csrf
                    {!! success_error_view_generator() !!}
                    {!! get_error_html($errors) !!}
                    <div class="row">
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Subject<span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input type="text" name="subject"
                            id="subject"
                            class="form-control"
                            placeholder="subject"
                            value=""
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Body<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                      <textarea id="email_body" name="email_body" rows="10" class="form-control"></textarea>
                      <input type="hidden" id="template-id" value="">
                  </div>
              </div>
          </div>
          <div class="kt-portlet__foot">
            <div class=" ">
                <div class="row">
                    <div class="wd-sl-modalbtn">

                        <button type="submit" class="btn btn-orange waves-effect waves-light" id="save_changes">Submit</button>
                        <a href="{{route(getDashboardRouteName())}}" id="close"><button type="button" class="btn btn-outline-secondary waves-effect">Close</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        get_email_template(1);
        $("#email_temp").val(1);
        $('#email_temp').change(function() {
            var selectedValue = $(this).val();
            get_email_template(selectedValue);
        });

        $('#form_email_template').on('submit', function(event) {
            event.preventDefault();
            let id = $('#template-id').val();
            let subject = $('#subject').val();
            let body = CKEDITOR.instances.email_body.getData();
            console.log(email_body);
            $.ajax({
                url:`/admin/update_email_templates/${id}`,
                type: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    subject: subject,
                    body: body
                },
                success: function(response) {
                    setTimeout(function() {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Email template updated successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    }, 1000);
                },
                error: function(response) {
                    console.log('Error updating email template');
                }
            });
        });

        $('.send_test_emai').click(function(){
            $('.test_email').fadeOut();
            let id = $('#template-id').val();
            var test_email_to = $('.test_email_to').val();
            let subject = $('#subject').val();
            let body = CKEDITOR.instances.email_body.getData();
            if(test_email_to!=''){
                $.ajax({
                    url: "/admin/send_test_email",
                    type: "GET",
                    data: { id: id,test_email_to:test_email_to,subject:subject,body:body},
                    success: function(response) {
                     setTimeout(function() {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Test email successfully sent',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    }, 1000);
                 }
             });
            }else{
                $('.test_email').fadeIn();
            }
        })
    });

    function get_email_template(selectedValue){
     CKEDITOR.instances.email_body.setData('')
     $('#subject').val('');
     $.ajax({
        url: "/admin/get_email_template",
        type: "GET",
        data: { id: selectedValue },
        success: function(response) {
            $("#template-id").val(selectedValue);
            $('#subject').val(response.subject);
            CKEDITOR.instances.email_body.setData(response.body);
        }
    });
 }

</script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('email_body');
</script>
@endsection
