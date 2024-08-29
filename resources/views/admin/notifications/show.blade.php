@extends('layouts.master')

@section('content')
<style type="text/css">
    .chat_box {
        padding: 20px;
    }
</style>
<div class="container-fluid admin_notification">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $notification->subject }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                       <li class="breadcrumb-item"> <a href="/admin">Home</a></li>
                       <li class="breadcrumb-item"> <a href="/admin/notifications">Notifications</a>
                       </li>
                       <li class="breadcrumb-item"> <a href="#">{{ $notification->subject }}</a>
                       </li>
                   </ol>
               </div>
           </div>
       </div>
   </div>    <div class="row">
    <div class="card">
        <div class="card-body">
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

@endsection
