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
                <h5>Notifications</h5>
            </div>
            @if(isset($notifications) && $notifications->isNotEmpty())
            @foreach ($notifications as $notification)
            <div class="dropdown-item" href="javascript:;">
                <div class="drop-item-lft">
                    <span class="icon-bg">
                     @if($notification->type == 'message')
                     <img src="{{ asset('assets/web/images/dashboard/icon1.svg') }}" alt="Message Icon">
                     @elseif($notification->type == 'quote')
                     <img src="{{ asset('assets/web/images/dashboard/icon2.svg') }}" alt="Quote Icon">
                     @endif
                 </span>
                 <div class="item-content">
                    <h4>{{ $notification->subject }}</h4>
                    <p>{!! $notification->short_message !!}</p>
                    <a href="/notifications/{{$notification->id}}" class="view_debtn">View Details</a>
                </div>
            </div>
            
            <span>{{ $notification->formatted_created_at }}</span>
        </div>
        @endforeach
        @else
        <div class="dropdown-item" href="javascript:;">
            <p>No notifications found.</p>
        </div>
        @endif
    </div>
</div>
</section>
@endsection
