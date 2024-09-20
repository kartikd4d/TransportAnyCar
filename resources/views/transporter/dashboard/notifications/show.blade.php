@extends('layouts.transporter.dashboard.app')

@section('content')
<style type="text/css">
    .chat_box {
        padding: 20px;
    }
</style>
<div id="wrapper">
    <!-- SIDEBAR -->
    @include('layouts.transporter.dashboard.sidebar')
    <div id="page-content-wrapper">
        @include('layouts.transporter.dashboard.top_head')
        <!-- content part -->
        <div class="content_container">
           <div class="job_container notifications">
               <div class="admin_job_bx" id="style-1">
                <div class="admin_job_top">
                    <h3>{{ $notification->subject }}</h3>
                    <span></span>
                </div>
                <div class="notification_body">
                    <p>{!! $notification->full_message_html !!}</p>

                    <div class="footer_noti">
                     <span class="icon-bg">
                         @if($notification->type == 'message')
                         <img src="{{ asset('assets/web/images/dashboard/icon1.svg') }}" alt="Message Icon">
                         @elseif($notification->type == 'quote')
                         <img src="{{ asset('assets/web/images/dashboard/icon2.svg') }}" alt="Quote Icon">
                         @endif
                     </span>
                     <span>{{ $notification->formatted_created_at }}</span>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
@endsection
