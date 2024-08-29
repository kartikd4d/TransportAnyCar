<nav class="navbar">
    <div class="menu_leftbar">
        <a href="{{route('transporter.dashboard')}}" class="logo">
            <img src="{{asset('assets/web/images/logo.png')}}" alt="brand_logo" />
        </a>
    </div>
    <div class="navbarmenu">
        <div class="menu_rightbar">
            <div class="dropdown">
                <!-- <a class="menu-link dropdown-toggle" href="javascript:;" id="dropdownMenuButton">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 21C11.9487 21 13.1238 19.8249 13.1238 18.375H7.87626C7.87626 19.8249 9.05136 21 10.5 21ZM19.3344 14.8596C18.542 14.0081 17.0592 12.7271 17.0592 8.53125C17.0592 5.34434 14.8247 2.79316 11.8117 2.16727V1.3125C11.8117 0.587754 11.2244 0 10.5 0C9.77569 0 9.18835 0.587754 9.18835 1.3125V2.16727C6.17534 2.79316 3.94081 5.34434 3.94081 8.53125C3.94081 12.7271 2.45809 14.0081 1.66567 14.8596C1.41958 15.1241 1.31048 15.4403 1.31253 15.75C1.31704 16.4227 1.84491 17.0625 2.62913 17.0625H18.3709C19.1551 17.0625 19.6834 16.4227 19.6875 15.75C19.6896 15.4403 19.5805 15.1237 19.3344 14.8596Z" fill="black" />
                        @if($notificationCount>=1)
                        <circle cx="15.9596" cy="4.19997" r="2.86" fill="#52D017" stroke="white" />
                        @endif
                    </svg>
                </a> -->
                <div class="dropdown-menu" style="display:none;">
                    <h5>
                        <a href="{{ route('transporter.notifications.index');}}" id="dropdownClose">
                            <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path d="M6 11.8635L1 6.43176L6 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                        </a>
                        Notifications
                        <a href="javascript:;" id="dropdownCrossClose" class="d-lg-none d-md-none d-sm-block d-block res_close_menu"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z" fill="#000"/></svg></a>
                    </h5>
                    @if(isset($notifications) && $notifications->isNotEmpty())
                    @foreach($notifications as $notification)
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
                            <h4>{{ $notification->subject }} </h4>
                            <h6> {{ $notification->short_message }}</h6>
                            <a href="{{ route('transporter.notifications.show', $notification->id) }}" class="view_debtn">View Details</a>
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
        <a class="menu-link profile_menu" href="javascript:;">
            <img src="{{checkFileExist(Auth::user()->profile_image)}}" alt="icon" />
            <h3>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
        </a>
    </div>
    <button id="sidebarToggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
</nav>