<header class="admin-header">
    <div class="container-admin">
        <nav class="navbar">
            <a class="brand" href="{{ route('front.home') }}">
                <img src="{{ site_logo }}" alt="logo">
            </a>
            <div class="admin-menu">
                <div class="dropdown d-lg-none d-md-none d-sm-block d-block notifaction_sec">
                    <a class="menu-link dropdown-toggle noti_info_icon" href="javascript:;" id="dropdownMenuButton">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.5 21C11.9487 21 13.1238 19.8249 13.1238 18.375H7.87626C7.87626 19.8249 9.05136 21 10.5 21ZM19.3344 14.8596C18.542 14.0081 17.0592 12.7271 17.0592 8.53125C17.0592 5.34434 14.8247 2.79316 11.8117 2.16727V1.3125C11.8117 0.587754 11.2244 0 10.5 0C9.77569 0 9.18835 0.587754 9.18835 1.3125V2.16727C6.17534 2.79316 3.94081 5.34434 3.94081 8.53125C3.94081 12.7271 2.45809 14.0081 1.66567 14.8596C1.41958 15.1241 1.31048 15.4403 1.31253 15.75C1.31704 16.4227 1.84491 17.0625 2.62913 17.0625H18.3709C19.1551 17.0625 19.6834 16.4227 19.6875 15.75C19.6896 15.4403 19.5805 15.1237 19.3344 14.8596Z"
                                fill="black" />

                        </svg>
                        @if ($notificationCount >= 1)
                            <small>{{ $notificationCount }}</small>
                        @endif
                    </a>
                    <div class="dropdown-menu" style="display:none;">
                        <h5>
                            <a href="javascript:;" id="dropdownClose">
                                <svg width="7" height="13" viewBox="0 0 7 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.5">
                                        <path d="M6 11.8635L1 6.43176L6 1" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>
                            </a>
                            Notifications
                        </h5>

                        @if (isset($notifications) && $notifications->isNotEmpty())
                            @foreach ($notifications as $notification)
                                <div class="dropdown-item {{ $notification->seen == 1 ? 'gray_notify' : 'white_notify' }}"
                                    data-type="{{ $notification->type }}"
                                    data-id="{{ $notification->type == 'message' ? $notification->reference_id : $notification->user_quote_id }}"
                                    data-href="
                            @if ($notification->type == 'quote') {{ route('front.quotes', $notification->user_quote_id) }}
                            @elseif($notification->type == 'message')
                                {{ route('front.messages', ['thread_id' => $notification->reference_id]) }} @endif "
                                    onclick="handleNotificationClick(event, this);">
                                    <div class="drop-item-lft notifaction_sec_list">
                                        <span class="notifi_icon">
                                            @if ($notification->type == 'quote')
                                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="14" cy="14" r="14" fill="#52D017" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7 14.0002C7.00024 10.6607 9.35944 7.78639 12.6348 7.1351C15.9102 6.48382 19.1895 8.23693 20.4673 11.3223C21.7451 14.4077 20.6655 17.966 17.8887 19.8212C15.1119 21.6764 11.4113 21.3117 9.05 18.9502C7.73728 17.6373 6.99987 15.8568 7 14.0002Z"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10.5 14.001L12.833 16.334L17.5 11.668" stroke="white"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            @elseif($notification->type == 'message')
                                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="14" cy="14" r="14" fill="#0356D6" />
                                                    <path
                                                        d="M14.5846 13.416H11.0846C10.9299 13.416 10.7816 13.4775 10.6722 13.5869C10.5628 13.6963 10.5013 13.8446 10.5013 13.9993C10.5013 14.1541 10.5628 14.3024 10.6722 14.4118C10.7816 14.5212 10.9299 14.5827 11.0846 14.5827H14.5846C14.7393 14.5827 14.8877 14.5212 14.9971 14.4118C15.1065 14.3024 15.168 14.1541 15.168 13.9993C15.168 13.8446 15.1065 13.6963 14.9971 13.5869C14.8877 13.4775 14.7393 13.416 14.5846 13.416ZM16.918 11.0827H11.0846C10.9299 11.0827 10.7816 11.1441 10.6722 11.2535C10.5628 11.3629 10.5013 11.5113 10.5013 11.666C10.5013 11.8207 10.5628 11.9691 10.6722 12.0785C10.7816 12.1879 10.9299 12.2493 11.0846 12.2493H16.918C17.0727 12.2493 17.2211 12.1879 17.3304 12.0785C17.4398 11.9691 17.5013 11.8207 17.5013 11.666C17.5013 11.5113 17.4398 11.3629 17.3304 11.2535C17.2211 11.1441 17.0727 11.0827 16.918 11.0827ZM18.0846 8.16602H9.91797C9.45384 8.16602 9.00872 8.35039 8.68053 8.67858C8.35234 9.00677 8.16797 9.45189 8.16797 9.91602V15.7493C8.16797 16.2135 8.35234 16.6586 8.68053 16.9868C9.00872 17.315 9.45384 17.4993 9.91797 17.4993H16.6788L18.8371 19.6635C18.8916 19.7176 18.9563 19.7604 19.0274 19.7894C19.0984 19.8184 19.1745 19.8331 19.2513 19.8327C19.3278 19.8347 19.4037 19.8187 19.473 19.786C19.5795 19.7423 19.6707 19.6679 19.735 19.5724C19.7994 19.4769 19.8341 19.3645 19.8346 19.2493V9.91602C19.8346 9.45189 19.6503 9.00677 19.3221 8.67858C18.9939 8.35039 18.5488 8.16602 18.0846 8.16602ZM18.668 17.8435L17.3321 16.5018C17.2776 16.4478 17.213 16.405 17.1419 16.376C17.0708 16.347 16.9947 16.3322 16.918 16.3327H9.91797C9.76326 16.3327 9.61489 16.2712 9.50549 16.1618C9.39609 16.0524 9.33464 15.9041 9.33464 15.7493V9.91602C9.33464 9.76131 9.39609 9.61293 9.50549 9.50354C9.61489 9.39414 9.76326 9.33268 9.91797 9.33268H18.0846C18.2393 9.33268 18.3877 9.39414 18.4971 9.50354C18.6065 9.61293 18.668 9.76131 18.668 9.91602V17.8435Z"
                                                        fill="white" />
                                                </svg>
                                            @endif
                                        </span>
                                        <div class="item-content">
                                            <h4>{{ $notification->title }} </h4>
                                            <h6> {{ $notification->message }}</h6>
                                        </div>
                                        <div class="notifi_time">
                                            <span>{{ getTimeAgo($notification->created_at->toDateTimeString()) }}</span>
                                            <a href="javascript:void(0)" class="view_debtn">View</a>

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="dropdown-item empty_notifiction" href="javascript:;">
                                <div class="no_notification">
                                    <img src="{{ asset('assets/images/no_notification.png') }}">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <input type="checkbox" id="nav" class="hidden">
            <label for="nav" class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="wrapper">
                <ul class="menu">
                    <li class="menu-item {{ is_active_module_dashboard(['front.dashboard']) }}">
                        <a href="{{ route('front.dashboard') }}" id="active_deliveries">
                            <div class="noti_info_icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.5 16.25C5.40111 16.25 5.30444 16.2793 5.22221 16.3343C5.13999 16.3892 5.0759 16.4673 5.03806 16.5587C5.00022 16.65 4.99031 16.7506 5.00961 16.8475C5.0289 16.9445 5.07652 17.0336 5.14645 17.1036C5.21637 17.1735 5.30546 17.2211 5.40245 17.2404C5.49945 17.2597 5.59998 17.2498 5.69134 17.2119C5.7827 17.1741 5.86079 17.11 5.91573 17.0278C5.97068 16.9456 6 16.8489 6 16.75C6 16.6174 5.94732 16.4902 5.85355 16.3964C5.75979 16.3027 5.63261 16.25 5.5 16.25ZM8.5 11.75H7.5C7.36739 11.75 7.24021 11.8027 7.14645 11.8964C7.05268 11.9902 7 12.1174 7 12.25C7 12.3826 7.05268 12.5098 7.14645 12.6036C7.24021 12.6973 7.36739 12.75 7.5 12.75H8.5C8.63261 12.75 8.75979 12.6973 8.85355 12.6036C8.94732 12.5098 9 12.3826 9 12.25C9 12.1174 8.94732 11.9902 8.85355 11.8964C8.75979 11.8027 8.63261 11.75 8.5 11.75ZM23.5 10.75H11V5.25C11 5.11739 10.9473 4.99021 10.8536 4.89645C10.7598 4.80268 10.6326 4.75 10.5 4.75H6.5C6.4249 4.75035 6.35084 4.76761 6.28332 4.8005C6.2158 4.83339 6.15656 4.88107 6.11 4.94L2.11 9.88L1 10.67C0.76 10.82 0 11.37 0 12.07V16.25C0 16.3826 0.0526784 16.5098 0.146447 16.6036C0.240215 16.6973 0.367392 16.75 0.5 16.75H3C3 17.413 3.26339 18.0489 3.73223 18.5178C4.20107 18.9866 4.83696 19.25 5.5 19.25C6.16304 19.25 6.79893 18.9866 7.26777 18.5178C7.73661 18.0489 8 17.413 8 16.75H16C16 17.413 16.2634 18.0489 16.7322 18.5178C17.2011 18.9866 17.837 19.25 18.5 19.25C19.163 19.25 19.7989 18.9866 20.2678 18.5178C20.7366 18.0489 21 17.413 21 16.75H22.5C22.8978 16.75 23.2794 16.592 23.5607 16.3107C23.842 16.0294 24 15.6478 24 15.25V11.25C24 11.1174 23.9473 10.9902 23.8536 10.8964C23.7598 10.8027 23.6326 10.75 23.5 10.75ZM5.5 18.25C5.20333 18.25 4.91332 18.162 4.66664 17.9972C4.41997 17.8324 4.22771 17.5981 4.11418 17.324C4.00065 17.0499 3.97094 16.7483 4.02882 16.4574C4.0867 16.1664 4.22956 15.8991 4.43934 15.6893C4.64912 15.4796 4.91639 15.3367 5.20736 15.2788C5.49834 15.2209 5.79994 15.2506 6.07403 15.3642C6.34811 15.4777 6.58238 15.67 6.7472 15.9166C6.91203 16.1633 7 16.4533 7 16.75C7 17.1478 6.84196 17.5294 6.56066 17.8107C6.27936 18.092 5.89782 18.25 5.5 18.25ZM10 15.75H7.79C7.59507 15.3049 7.27466 14.9263 6.86796 14.6604C6.46126 14.3945 5.9859 14.2529 5.5 14.2529C5.0141 14.2529 4.53874 14.3945 4.13204 14.6604C3.72534 14.9263 3.40493 15.3049 3.21 15.75H1V14.75H1.5C1.63261 14.75 1.75979 14.6973 1.85355 14.6036C1.94732 14.5098 2 14.3826 2 14.25C2 14.1174 1.94732 13.9902 1.85355 13.8964C1.75979 13.8027 1.63261 13.75 1.5 13.75H1V12.08C1.14008 11.8365 1.34411 11.6359 1.59 11.5L2.79 10.66C2.82799 10.6317 2.86168 10.598 2.89 10.56L6.74 5.75H10V15.75ZM18.5 18.25C18.2033 18.25 17.9133 18.162 17.6666 17.9972C17.42 17.8324 17.2277 17.5981 17.1142 17.324C17.0007 17.0499 16.9709 16.7483 17.0288 16.4574C17.0867 16.1664 17.2296 15.8991 17.4393 15.6893C17.6491 15.4796 17.9164 15.3367 18.2074 15.2788C18.4983 15.2209 18.7999 15.2506 19.074 15.3642C19.3481 15.4777 19.5824 15.67 19.7472 15.9166C19.912 16.1633 20 16.4533 20 16.75C20 17.1478 19.842 17.5294 19.5607 17.8107C19.2794 18.092 18.8978 18.25 18.5 18.25ZM23 13.75H22.5C22.3674 13.75 22.2402 13.8027 22.1464 13.8964C22.0527 13.9902 22 14.1174 22 14.25C22 14.3826 22.0527 14.5098 22.1464 14.6036C22.2402 14.6973 22.3674 14.75 22.5 14.75H23V15.25C23 15.3826 22.9473 15.5098 22.8536 15.6036C22.7598 15.6973 22.6326 15.75 22.5 15.75H20.79C20.5951 15.3049 20.2747 14.9263 19.868 14.6604C19.4613 14.3945 18.9859 14.2529 18.5 14.2529C18.0141 14.2529 17.5387 14.3945 17.132 14.6604C16.7253 14.9263 16.4049 15.3049 16.21 15.75H11V11.75H23V13.75ZM18.5 16.25C18.4011 16.25 18.3044 16.2793 18.2222 16.3343C18.14 16.3892 18.0759 16.4673 18.0381 16.5587C18.0002 16.65 17.9903 16.7506 18.0096 16.8475C18.0289 16.9445 18.0765 17.0336 18.1464 17.1036C18.2164 17.1735 18.3055 17.2211 18.4025 17.2404C18.4994 17.2597 18.6 17.2498 18.6913 17.2119C18.7827 17.1741 18.8608 17.11 18.9157 17.0278C18.9707 16.9456 19 16.8489 19 16.75C19 16.6174 18.9473 16.4902 18.8536 16.3964C18.7598 16.3027 18.6326 16.25 18.5 16.25ZM4.5 10.47C4.54123 10.5542 4.60528 10.625 4.68485 10.6745C4.76441 10.724 4.85629 10.7502 4.95 10.75H8.5C8.63261 10.75 8.75979 10.6973 8.85355 10.6036C8.94732 10.5098 9 10.3826 9 10.25V7.25C9 7.11739 8.94732 6.99021 8.85355 6.89645C8.75979 6.80268 8.63261 6.75 8.5 6.75H7.4C7.32321 6.74882 7.24719 6.76535 7.17782 6.7983C7.10845 6.83125 7.0476 6.87974 7 6.94L4.6 9.94C4.5426 10.0147 4.50745 10.104 4.4986 10.1978C4.48975 10.2916 4.50757 10.3859 4.55 10.47H4.5ZM7.64 7.75H8V9.75H6L7.64 7.75Z"
                                        fill="black" />
                                </svg>
                                @if ($quotationCounts >= 1)
                                    <small>{{ $quotationCounts }}</small>
                                @endif
                            </div>
                            Active deliveries
                        </a>
                    </li>
                    <li class="menu-item {{ is_active_module_dashboard(['front.past_deliveries']) }}">
                        <a href="{{ route('front.past_deliveries') }}">
                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.0621 15C8.92994 15 8.80319 14.9504 8.70974 14.8621C8.61629 14.7738 8.56379 14.654 8.56379 14.5292C8.56379 14.4043 8.61629 14.2845 8.70974 14.1962C8.80319 14.1079 8.92994 14.0583 9.0621 14.0583C12.8894 14.0583 16.0032 11.1163 16.0032 7.50171C16.0032 3.88707 12.8894 0.941619 9.0621 0.941619C5.23475 0.941619 2.12064 3.88361 2.12064 7.50171C2.12064 7.62657 2.06814 7.74633 1.97469 7.83463C1.88124 7.92292 1.75449 7.97253 1.62233 7.97253C1.49017 7.97253 1.36343 7.92292 1.26998 7.83463C1.17652 7.74633 1.12402 7.62657 1.12402 7.50171C1.1238 6.01824 1.58919 4.56802 2.46134 3.33447C3.33349 2.10092 4.57322 1.13944 6.02374 0.571636C7.47426 0.00382789 9.07042 -0.144806 10.6104 0.144533C12.1503 0.433872 13.5648 1.14819 14.6751 2.19714C15.7853 3.24609 16.5414 4.58257 16.8476 6.03754C17.1539 7.49252 16.9966 9.00063 16.3956 10.3711C15.7946 11.7416 14.777 12.9129 13.4714 13.7369C12.1658 14.5609 10.6309 15.0006 9.06077 15.0003L9.0621 15Z"
                                    fill="black" />
                                <path
                                    d="M1.56872 8.98235C1.50329 8.9824 1.43849 8.97022 1.37806 8.94652C1.31762 8.92282 1.26274 8.88806 1.21658 8.84424L0.145881 7.83292C0.0996155 7.78919 0.0629201 7.73727 0.0378898 7.68014C0.0128596 7.62301 -1.5409e-05 7.56178 1.38397e-08 7.49994C1.54367e-05 7.43811 0.012921 7.37688 0.0379797 7.31976C0.0630385 7.26264 0.0997598 7.21074 0.146047 7.16703C0.192334 7.12331 0.247281 7.08864 0.307749 7.06499C0.368218 7.04134 0.433025 7.02918 0.498469 7.02919C0.563914 7.02921 0.628714 7.0414 0.689171 7.06508C0.749628 7.08876 0.804558 7.12345 0.850823 7.16718L1.56872 7.84705L2.28695 7.16844C2.33292 7.12347 2.3879 7.0876 2.4487 7.06293C2.5095 7.03825 2.57488 7.02527 2.64105 7.02472C2.70722 7.02418 2.77283 7.03609 2.83407 7.05976C2.89531 7.08344 2.95095 7.1184 2.99774 7.1626C3.04453 7.20681 3.08153 7.25938 3.10658 7.31724C3.13164 7.3751 3.14425 7.4371 3.14367 7.49962C3.1431 7.56213 3.12935 7.62391 3.10323 7.68135C3.07712 7.73879 3.03916 7.79075 2.99156 7.83418L1.92119 8.84424C1.87492 8.88801 1.81998 8.92274 1.7595 8.94644C1.69902 8.97013 1.63419 8.98234 1.56872 8.98235ZM12.501 7.9726H9.00018C8.86802 7.9726 8.74127 7.923 8.64782 7.8347C8.55437 7.7464 8.50187 7.62665 8.50187 7.50178V3.71984C8.50187 3.59497 8.55437 3.47522 8.64782 3.38692C8.74127 3.29863 8.86802 3.24902 9.00018 3.24902C9.13234 3.24902 9.25909 3.29863 9.35254 3.38692C9.44599 3.47522 9.49849 3.59497 9.49849 3.71984V7.03096H12.501C12.6331 7.03096 12.7599 7.08056 12.8533 7.16886C12.9468 7.25716 12.9993 7.37691 12.9993 7.50178C12.9993 7.62665 12.9468 7.7464 12.8533 7.8347C12.7599 7.923 12.6331 7.9726 12.501 7.9726Z"
                                    fill="black" />
                            </svg>
                            Past deliveries</a>
                    </li>
                    <li class="menu-item {{ is_active_module_dashboard(['front.messages']) }}">
                        <a href="{{ route('front.messages') }}">
                            <div class="noti_info_icon message_icon">
                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.05749 14.7949C2.71777 14.7949 2.37805 14.7117 2.20833 14.4622C1.95361 14.2129 1.78361 13.8805 1.78361 13.548V12.2182C1.78361 11.9689 1.61361 11.8025 1.35889 11.8025H1.27389C0.594443 11.8025 0 11.2208 0 10.5559V1.24636C0 0.581727 0.509721 0 1.27389 0H15.7127C16.3922 0 16.9866 0.581727 16.9866 1.24664V10.5559C16.9866 11.2208 16.3922 11.8025 15.7127 11.8025H6.79471C6.70971 11.8025 6.53998 11.8857 6.45471 11.8857L3.90693 14.3793C3.73693 14.6285 3.39721 14.7949 3.05749 14.7949ZM1.27389 0.831273C1.01916 0.831273 0.849443 0.997636 0.849443 1.24664V10.5559C0.849443 10.8052 1.01944 10.9715 1.27389 10.9715H1.35889C2.03833 10.9715 2.63305 11.5533 2.63305 12.2182V13.548C2.63305 13.7144 2.71777 13.7973 2.80305 13.8807C2.97277 14.0468 3.14249 14.13 3.39721 13.8807L5.94526 11.3869C6.20026 11.1376 6.53998 11.0545 6.87971 11.0545H15.7977C16.0525 11.0545 16.2225 10.8881 16.2225 10.6391V1.24636C16.1375 0.997091 15.8825 0.831 15.7127 0.831H1.27389V0.831273Z"
                                        fill="black" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.85253 3.74018H4.24699C3.99227 3.74018 3.82227 3.57382 3.82227 3.32454C3.82227 3.07527 3.99227 2.90918 4.24699 2.90918H9.93781C10.1922 2.90918 10.3622 3.07554 10.3622 3.32454C10.3622 3.57409 10.1075 3.74018 9.85253 3.74018Z"
                                        fill="black" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.2964 5.40268H4.24699C3.99227 5.40268 3.82227 5.23632 3.82227 4.98705C3.82227 4.7375 3.99227 4.57141 4.24699 4.57141H11.2964C11.5514 4.57141 11.7211 4.73777 11.7211 4.98705C11.7211 5.23632 11.5511 5.40268 11.2964 5.40268Z"
                                        fill="black" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.7403 7.06504H4.24699C3.99227 7.06504 3.82227 6.89867 3.82227 6.6494C3.82227 6.40013 3.99227 6.23376 4.24699 6.23376H12.7403C12.9953 6.23376 13.165 6.40013 13.165 6.6494C13.165 6.89867 12.9103 7.06504 12.7403 7.06504Z"
                                        fill="black" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.49364 8.72727H4.24699C3.99227 8.72727 3.82227 8.56091 3.82227 8.31163C3.82227 8.06236 3.99227 7.896 4.24699 7.896H8.49364C8.74836 7.896 8.91836 8.06236 8.91836 8.31163C8.91836 8.56091 8.66364 8.72727 8.49364 8.72727Z"
                                        fill="black" />
                                </svg>
                                @if ($unseenMessageCount >= 1)
                                    <small>{{ $unseenMessageCount }}</small>
                                @endif
                            </div>
                            Messages
                        </a>
                    </li>
                    <li class="menu-item {{ is_active_module_dashboard(['front.account']) }}">
                        <a href="{{ route('front.account') }}">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.48094 10.3C11.4062 10.3 12.9501 8.66 12.9501 6.66C12.9501 4.66 11.4062 3 9.48094 3C7.55572 3 6.01173 4.64 6.01173 6.64C6.01173 8.64 7.55572 10.3 9.48094 10.3ZM9.48094 3.96C10.8915 3.96 12.0352 5.16 12.0352 6.64C12.0352 8.12 10.8915 9.32 9.48094 9.32C8.07038 9.32 6.92669 8.14 6.92669 6.66C6.92669 5.18 8.07038 3.96 9.48094 3.96ZM3.45748 16H15.5425C15.7903 16 16 15.78 16 15.52C16 13 14.0367 10.94 11.6349 10.94H7.3651C4.96334 10.94 3 13 3 15.52C3 15.78 3.20968 16 3.45748 16ZM7.3651 11.9H11.6349C13.3886 11.9 14.8182 13.26 15.0469 15.04H3.95308C4.18182 13.26 5.61144 11.9 7.3651 11.9Z"
                                    fill="black" />
                            </svg>Account</a>
                    </li>
                </ul>
                <div class="wd-profile">
                    <div class="dropdown notifaction_sec">
                        <a class="menu-link dropdown-toggle noti_info_icon" href="javascript:;"
                            id="dropdownMenuButton">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.5 21C11.9487 21 13.1238 19.8249 13.1238 18.375H7.87626C7.87626 19.8249 9.05136 21 10.5 21ZM19.3344 14.8596C18.542 14.0081 17.0592 12.7271 17.0592 8.53125C17.0592 5.34434 14.8247 2.79316 11.8117 2.16727V1.3125C11.8117 0.587754 11.2244 0 10.5 0C9.77569 0 9.18835 0.587754 9.18835 1.3125V2.16727C6.17534 2.79316 3.94081 5.34434 3.94081 8.53125C3.94081 12.7271 2.45809 14.0081 1.66567 14.8596C1.41958 15.1241 1.31048 15.4403 1.31253 15.75C1.31704 16.4227 1.84491 17.0625 2.62913 17.0625H18.3709C19.1551 17.0625 19.6834 16.4227 19.6875 15.75C19.6896 15.4403 19.5805 15.1237 19.3344 14.8596Z"
                                    fill="black" />

                            </svg>
                            @if ($notificationCount >= 1)
                                <small>{{ $notificationCount }}</small>
                            @endif
                        </a>
                        <div class="dropdown-menu" style="display:none;">
                            <h5>
                                <a href="javascript:void(0)" id="dropdownClose_desk">
                                    <svg width="7" height="13" viewBox="0 0 7 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.5">
                                            <path d="M6 11.8635L1 6.43176L6 1" stroke="black" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </a>
                                Notifications
                                <a href="javascript:;" id="dropdownCrossClose"
                                    class="d-lg-none d-md-none d-sm-block d-block res_close_menu"><svg width="19"
                                        height="19" viewBox="0 0 19 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z"
                                            fill="#000" />
                                    </svg></a>
                            </h5>
                            @php
                                use Carbon\Carbon;
                            @endphp

                            @if (isset($notifications) && $notifications->isNotEmpty())
                                @foreach ($notifications as $notification)
                                    @if ($notification->created_at->diffInDays(Carbon::now()) == 10)
                                        <div class="dropdown-item {{ $notification->seen == 1 ? 'gray_notify' : 'white_notify' }}"
                                            data-type="{{ $notification->type }}"
                                            data-id="{{ $notification->type == 'message' ? $notification->reference_id : $notification->user_quote_id }}"
                                            data-href="
                        @if ($notification->type == 'quote') {{ route('front.quotes', $notification->user_quote_id) }}
                        @elseif($notification->type == 'message')
                            {{ route('front.messages', ['thread_id' => $notification->reference_id]) }} @endif "
                                            onclick="handleNotificationClick(event, this);">
                                            <div class="drop-item-lft notifaction_sec_list">
                                                <span class="notifi_icon">
                                                    @if ($notification->type == 'quote')
                                                        <svg width="28" height="28" viewBox="0 0 28 28"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="14" cy="14" r="14"
                                                                fill="#52D017" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 14.0002C7.00024 10.6607 9.35944 7.78639 12.6348 7.1351C15.9102 6.48382 19.1895 8.23693 20.4673 11.3223C21.7451 14.4077 20.6655 17.966 17.8887 19.8212C15.1119 21.6764 11.4113 21.3117 9.05 18.9502C7.73728 17.6373 6.99987 15.8568 7 14.0002Z"
                                                                stroke="white" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.5 14.001L12.833 16.334L17.5 11.668"
                                                                stroke="white" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    @elseif($notification->type == 'message')
                                                        <svg width="28" height="28" viewBox="0 0 28 28"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="14" cy="14" r="14"
                                                                fill="#0356D6" />
                                                            <path
                                                                d="M14.5846 13.416H11.0846C10.9299 13.416 10.7816 13.4775 10.6722 13.5869C10.5628 13.6963 10.5013 13.8446 10.5013 13.9993C10.5013 14.1541 10.5628 14.3024 10.6722 14.4118C10.7816 14.5212 10.9299 14.5827 11.0846 14.5827H14.5846C14.7393 14.5827 14.8877 14.5212 14.9971 14.4118C15.1065 14.3024 15.168 14.1541 15.168 13.9993C15.168 13.8446 15.1065 13.6963 14.9971 13.5869C14.8877 13.4775 14.7393 13.416 14.5846 13.416ZM16.918 11.0827H11.0846C10.9299 11.0827 10.7816 11.1441 10.6722 11.2535C10.5628 11.3629 10.5013 11.5113 10.5013 11.666C10.5013 11.8207 10.5628 11.9691 10.6722 12.0785C10.7816 12.1879 10.9299 12.2493 11.0846 12.2493H16.918C17.0727 12.2493 17.2211 12.1879 17.3304 12.0785C17.4398 11.9691 17.5013 11.8207 17.5013 11.666C17.5013 11.5113 17.4398 11.3629 17.3304 11.2535C17.2211 11.1441 17.0727 11.0827 16.918 11.0827ZM18.0846 8.16602H9.91797C9.45384 8.16602 9.00872 8.35039 8.68053 8.67858C8.35234 9.00677 8.16797 9.45189 8.16797 9.91602V15.7493C8.16797 16.2135 8.35234 16.6586 8.68053 16.9868C9.00872 17.315 9.45384 17.4993 9.91797 17.4993H16.6788L18.8371 19.6635C18.8916 19.7176 18.9563 19.7604 19.0274 19.7894C19.0984 19.8184 19.1745 19.8331 19.2513 19.8327C19.3278 19.8347 19.4037 19.8187 19.473 19.786C19.5795 19.7423 19.6707 19.6679 19.735 19.5724C19.7994 19.4769 19.8341 19.3645 19.8346 19.2493V9.91602C19.8346 9.45189 19.6503 9.00677 19.3221 8.67858C18.9939 8.35039 18.5488 8.16602 18.0846 8.16602ZM18.668 17.8435L17.3321 16.5018C17.2776 16.4478 17.213 16.405 17.1419 16.376C17.0708 16.347 16.9947 16.3322 16.918 16.3327H9.91797C9.76326 16.3327 9.61489 16.2712 9.50549 16.1618C9.39609 16.0524 9.33464 15.9041 9.33464 15.7493V9.91602C9.33464 9.76131 9.39609 9.61293 9.50549 9.50354C9.61489 9.39414 9.76326 9.33268 9.91797 9.33268H18.0846C18.2393 9.33268 18.3877 9.39414 18.4971 9.50354C18.6065 9.61293 18.668 9.76131 18.668 9.91602V17.8435Z"
                                                                fill="white" />
                                                        </svg>
                                                    @endif
                                                </span>
                                                <div class="item-content">
                                                    <h4>{{ $notification->title }} </h4>
                                                    <h6> {{ $notification->message }}</h6>
                                                </div>
                                                <div class="notifi_time">
                                                    <span>{{ getTimeAgo($notification->created_at->toDateTimeString()) }}</span>
                                                    <a href="javascript:void(0)" class="view_debtn">View</a>

                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="dropdown-item empty_notifiction" href="javascript:;">
                                    <div class="no_notification">
                                        <img src="{{ asset('assets/images/no_notification.png') }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <a href="javascript:;" class="wd-prfol-nm">My profile :
                        <span>{{ optional(Auth::guard('web')->user())->username }}</span></a>
                </div>
            </div>
        </nav>
    </div>
</header>
