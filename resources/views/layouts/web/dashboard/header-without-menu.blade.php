<nav class="navbar">
    <div class="menu_leftbar">
        <a href="{{route('front.home')}}" class="logo">
            <img src="{{site_logo}}" alt="logo">
        </a>
    </div>
    <div class="navbarmenu">
        <div class="menu_rightbar">
            <div class="dropdown">
                <!-- <a class="menu-link dropdown-toggle" href="javascript:;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 21C11.9487 21 13.1238 19.8249 13.1238 18.375H7.87626C7.87626 19.8249 9.05136 21 10.5 21ZM19.3344 14.8596C18.542 14.0081 17.0592 12.7271 17.0592 8.53125C17.0592 5.34434 14.8247 2.79316 11.8117 2.16727V1.3125C11.8117 0.587754 11.2244 0 10.5 0C9.77569 0 9.18835 0.587754 9.18835 1.3125V2.16727C6.17534 2.79316 3.94081 5.34434 3.94081 8.53125C3.94081 12.7271 2.45809 14.0081 1.66567 14.8596C1.41958 15.1241 1.31048 15.4403 1.31253 15.75C1.31704 16.4227 1.84491 17.0625 2.62913 17.0625H18.3709C19.1551 17.0625 19.6834 16.4227 19.6875 15.75C19.6896 15.4403 19.5805 15.1237 19.3344 14.8596Z" fill="black" />
                        <circle cx="15.9596" cy="4.19997" r="2.86" fill="#52D017" stroke="white" />
                    </svg>
                </a> -->
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   <!--  <h5>
                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                                <path d="M6 11.8635L1 6.43176L6 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                        Notifications
                    </h5> -->
                    <div class="dropdown-item" href="javascript:;">
                        <div class="drop-item-lft">
                            <span class="icon-bg">
                              <img src="{{asset('assets/web/images/dashboard/icon1.svg')}}" alt="Icon">
                            </span>
                            <div class="item-content">
                                <h4>New job alert </h4>
                                <h6>Make Model: BMW 1 Series Delivery date: 8th Jan 2024</h6>
                                <a href="javascript:;" class="view_debtn">View Details</a>
                            </div>
                        </div>
                        <span>Just Now</span>
                    </div>
                    <div class="dropdown-item" href="javascript:;">
                        <div class="drop-item-lft">
                            <span class="icon-bg-new">
                              <img src="{{asset('assets/web/images/dashboard/icon1.svg')}}" alt="Icon">
                            </span>
                            <div class="item-content">
                                <h4>New message</h4>
                                <p>Lorem ipsum dolor sit amet consectetur.<br> Turpis vestibulum </p>
                            </div>
                        </div>
                        <span>1 hour ago</span>
                    </div>
                    <div class="dropdown-item" href="javascript:;">
                        <div class="drop-item-lft">
                            <span class="icon-bg-feed">
                              <img src="{{asset('assets/web/images/dashboard/icon3.svg')}}" alt="Icon">
                            </span>
                            <div class="item-content">
                                <h4>Feedback</h4>
                                <p>Excellent services would recommend to <br>anyone and price very reasonable</p>
                            </div>
                        </div>
                        <span>6 hour ago</span>
                    </div>
                    <div class="dropdown-item" href="javascript:;">
                        <div class="drop-item-lft">
                            <span class="icon-bg">
                              <img src="{{asset('assets/web/images/dashboard/icon1.svg')}}" alt="Icon">
                            </span>
                            <div class="item-content">
                                <h4>New job alert </h4>
                                <h6>Make Model: BMW 1 Series Delivery date: 8th Jan 2024</h6>
                                <a href="javascript:;" class="view_debtn">View Details</a>
                            </div>
                        </div>
                        <span>Yesterday</span>
                    </div>
                    <div class="dropdown-item" href="javascript:;">
                        <div class="drop-item-lft">
                            <span class="icon-bg-new">
                              <img src="{{asset('assets/web/images/dashboard/icon1.svg')}}" alt="Icon">
                            </span>
                            <div class="item-content">
                                <h4>New message</h4>
                                <p>Lorem ipsum dolor sit amet consectetur.<br> Turpis vestibulum </p>
                            </div>
                        </div>
                        <span>1 hour ago</span>
                    </div>
                    <div class="dropdown-item" href="javascript:;">
                        <div class="drop-item-lft">
                            <span class="icon-bg">
                              <img src="{{asset('assets/web/images/dashboard/icon1.svg')}}" alt="Icon">
                            </span>
                            <div class="item-content">
                                <h4>New job alert </h4>
                                <h6>Make Model: BMW 1 Series Delivery date: 8th Jan 2024</h6>
                                <a href="javascript:;" class="view_debtn">View Details</a>
                            </div>
                        </div>
                        <span>Yesterday</span>
                    </div>
                </div>
            </div>
            <a class="menu-link profile_menu" href="javascript:;">
                <img src="{{asset('assets/web/images/dashboard/profile.png')}}" alt="icon" />
                <h3>Jhon Joe ...</h3>
            </a>
        </div>
        <button id="sidebarToggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>
