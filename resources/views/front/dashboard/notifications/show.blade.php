@extends('layouts.web.dashboard.app')

@section('content')
<style type="text/css">
    .chat_box {
        padding: 20px;
    }
</style>
@include('layouts.web.dashboard.header')
<section class="wd-active-job">
    <div class="container-job">
        <div class="active-job-box">
            <div class="chat_title_bx">
                <h5>{{ $notification->subject }}</h5>
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
</section>
@endsection
