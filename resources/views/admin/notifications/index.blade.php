@extends('layouts.master')

@section('content')
<style type="text/css">
    .admin_notification .dropdown-item .item-content a.view_debtn {
    font-size: 10px;
    border: 1px solid #0356D6;
    color: #fff;
    padding: 3px 5px 2px;
    display: block;
    width: max-content;
    background: #0356D6;
}
</style>
<div class="container-fluid admin_notification">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">  Notifications</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"> <a href="/admin">Home</a></li><li class="breadcrumb-item"> <a href="#">Notifications</a>
                     </li></ol>
                 </div>
             </div>
         </div>
     </div>    <div class="row">
        <div class="card">
            <div class="card-body">
                @if(isset($notifications) && $notifications->isNotEmpty())
                @foreach ($notif as $notification)
                <div class="dropdown-item1" href="javascript:;">
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
                    </div>
                </div>
                <a href="{{ route('admin.notifications.show', $notification->id) }}" class="view_debtn">View Details</a>
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
</div>
</div>

@endsection
