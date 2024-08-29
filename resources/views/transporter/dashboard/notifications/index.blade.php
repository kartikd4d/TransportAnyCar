@extends('layouts.transporter.dashboard.app')

@section('content')
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
                <h3>Notifications</h3>
                <span></span>
            </div>
            @foreach ($notif as $notification)
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
                    <a href="{{ route('transporter.notifications.show', $notification->id) }}" class="view_debtn">View Details</a>
                </div>
            </div>
            
            <span>{{ $notification->formatted_created_at }}</span>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>
</div>
@endsection
