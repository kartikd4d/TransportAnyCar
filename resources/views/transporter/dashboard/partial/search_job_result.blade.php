<style>


@media (max-width: 580px) {

.search_resu_sec .form-group.where_custom {
    padding: 10px 30px;
}
.srch-data {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}
.srch-data span {
    color: #9C9C9C;
    font-size: 15px;
}
.srch-data a {
    font-size: 15px;
    color: #80b6f7;
    text-decoration: underline;
    font-weight:700;
}

.jobserch_mob .jobsrch_box {
    margin-bottom: 7px;
        box-shadow: 0px 0px 4px 0px rgb(0 0 0 / 15%);
}
.jobserch_mob ul.jobsrch_info_list {
    width: 90%;
}
.search_sec_footer span {
    font-size: 17px;
    text-align: center;
    display: block;
    color: #616161;
    line-height: normal;
}
.search_sec_footer span a {
    color: #80b6f7 !important;
    text-decoration: underline !important;
    font-size: 17px;
    text-underline-offset: 5px;
    font-weight: 400;
}
.search_sec_footer .srch-data {
    justify-content: center;
}

.content_container {
    padding-bottom: 0;
}
.new_job_design ul.jobsrch_info_list {
    margin: 0;
}

.new_job_design ul.jobsrch_info_list {
    margin: 0;
    display: block;
}

.jobserch_mob ul.jobsrch_info_list li.job_new_grid_img {
    width: 28%;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_post_code {
    width: 30%;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_vehi_modal {
    width: 41%;
    float: left;
    margin-bottom: 20px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_drop_code {
    width: 30%;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_time_from {
    width: 40%;
    margin-bottom: 20px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_miles {
    width: 59%;
    float: left;
    display: block;
    clear: both;padding-right: 10px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_type {
    width: 59%;
    float: left;
    display: block; clear: both;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_img span {
    font-size: 10px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_date {
    display: block;
    width: 59%;
    float: left;
    clear: both;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest {
    width: 41%;
    display: block;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bidding {
    width: 41%;
    display: block;
    float: left; 
}
.jobserch_mob ul.jobsrch_info_list li span {
    font-size: 15px; font-weight: 400;
}
.jobserch_mob ul.jobsrch_info_list li {
    margin-bottom: 6px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn {
    display: block;
    width: 41%;
    float: left;
    margin: 0;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn .jobsrch_right_box {
    margin: 0;
    display: flex;
    align-items: center;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn .jobsrch_right_box a.make_offer_btn {
    margin-top: 0;
    font-size: 15px;
    width: max-content;
    padding: 7px 33px  10px;
    border-radius: 7px;
    text-transform: none;
}

.jobserch_mob ul.jobsrch_info_list li span.sub_color {
    color: #0356D6 !important;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest span.sub_color {
    color: #52D017 !important;
}
.jobserch_mob ul.jobsrch_info_list li span.sub_color span {
    color: #9C9C9C;
}
small.new_tag {
    position: absolute;
    background: #52d017;
    color: #fff;
    right: -48px;
    padding: 3px 32px;
    font-size: 13px;
    transform: rotate(50deg);
    top: -11px;
}
small.expring_tag {
    position: absolute;
    background: #ED1C24;
    color: #fff;
    right: -56px;
    padding: 3px 32px;
    font-size: 12px;
    transform: rotate(50deg);
    top: -11px;
}
.jobsrch_box {
    position: relative;
    overflow: hidden;
}

.jobserch_mob ul.jobsrch_info_list li.job_new_grid_type span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bidding span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_date span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_miles span {
    color: #000000ba;
    font-size: 12px; font-weight: 300;
}


}
</style>
<div class="jobsrch_form_blog search_resu_sec" style="display:block !important" >
    <div class="form-group where_custom">
        <label id="pickupLabel">Your job search</label>
        <input type="text" class="form-control" name="search_pick_up_area" id="search_pick_up_area" placeholder="{{ $pickup }} - {{ $dropoff }}" disabled />
        <input type="hidden" name="pick_up_latitude" id="pick_up_latitude">
        <input type="hidden" name="pick_up_longitude" id="pick_up_longitude">
        <svg class="svgvector_mob d-md-none d-block" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z" stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
</div>
<div class="srch-data">
    <div class="srch-data-filter">
    @if ($quotes->total() == 0)
        <span>Results: 0</span>
    @else
        @if ($quotes->total() > 20)
            <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of {{ $quotes->total() }}</span>
        @else
            @if ($quotes->firstItem() == $quotes->lastItem())
                <span>Results: {{ $quotes->firstItem() }} of {{ $quotes->total() }}</span>
            @else
                <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of {{ $quotes->total() }}</span>
            @endif
        @endif
    @endif
    </div>
<a href="{{route('transporter.new_jobs_new')}}">Reset Search</a>
</div>
@foreach($quotes as $quote)
<div class="jobsrch_blogs jobserch_mob">
    <div class="jobsrch_box">
        <div class="row" data-car-id="{{$quote->id}}">
            <div class="jobserch_mob_grid new_job_design">
                @if($quote->created_at->diffInHours(now()) < 1)
                    <small class="new_tag">New</small>
                @endif    
                @if($quote->created_at->diffInDays(now()) >= 8 && $quote->created_at->diffInDays(now()) <= 10)
                    <small class="expring_tag">Expiring</small>
                @endif               
                <ul class="jobsrch_info_list">
                    <li class="job_new_grid_img">
                        <div class="jobsrch_top_box position-relative">
                            @if(is_null($quote->vehicle_make_1) && is_null($quote->vehicle_model_1))
                                <div>
                                    <img src="{{ $quote->image ?: '/uploads/no_car_image.png' }}" class="vehicle_image" alt="image" />
                                </div>
                            @else
                                <div class="job_se_sec slider">
                                    <div>
                                        <img src="{{ $quote->image ?: '/uploads/no_car_image.png' }}" class="vehicle_image" alt="image" />
                                    </div>
                                    @if(!is_null($quote->image_1))
                                        <div>
                                            <img src="/{{ $quote->image_1 }}" class="vehicle_image" alt="image" />
                                        </div>
                                    @else
                                        <div>
                                            <img src="/uploads/no_car_image.png" class="vehicle_image" alt="no image" />
                                        </div>
                                    @endif
                                </div>
                                <div class="custom-navigation">
                                    <span class="current-slide">1</span> of <span class="total-slides">2</span> 
                                </div>
                            @endif

                            <!-- <img src="{{$quote->image}}" class="vehicle_image" alt="image" /> -->
                            <span>Posted {{ getTimeAgo($quote->created_at->toDateTimeString()) }}</span>
                        </div>
                    </li>
                    <li class="job_new_grid_post_code">
                        <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#52D017" />
                        </svg>
                        <span>{{$quote->pickup_postcode ? extractPostcode($quote->pickup_postcode) : '-'}}</span>
                    </li>
                    <li class="job_new_grid_vehi_modal">
                        <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.94078 4.92816C4.88066 2.60353 6.0112 1 8.57049 1H15.4307C17.9876 1 19.1193 2.60353 20.0604 4.92816L21.0003 7.41535C21.7006 7.42378 22.344 7.80289 22.6906 8.41145C22.8946 8.75808 23.0014 9.15325 22.9998 9.55543V12.7625C23.0089 13.5113 22.631 14.2118 22.0001 14.6154C21.7001 14.8022 21.3537 14.9013 21.0003 14.9014H2.99969C2.64626 14.9013 2.29992 14.8022 1.99992 14.6154C1.36905 14.2118 0.991065 13.5113 1.00016 12.7625V9.55543C0.998842 9.15367 1.10565 8.75895 1.30938 8.41267C1.65604 7.80412 2.29937 7.425 2.99969 7.41657L3.94078 4.92816Z" stroke="#008DD4" stroke-width="1.46665" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.73371 14.9025C5.73371 14.4975 5.40539 14.1692 5.00039 14.1692C4.59539 14.1692 4.26707 14.4975 4.26707 14.9025H5.73371ZM5.00039 16.5073H4.26707C4.26707 16.5151 4.26719 16.5229 4.26744 16.5307L5.00039 16.5073ZM3.49952 18.1108L3.47398 18.8437C3.49082 18.8442 3.50767 18.8443 3.52451 18.8437L3.49952 18.1108ZM1.99988 16.506L2.73281 16.5301C2.73307 16.5221 2.7332 16.5141 2.7332 16.506H1.99988ZM2.7332 14.6153C2.7332 14.2103 2.40488 13.882 1.99988 13.882C1.59488 13.882 1.26656 14.2103 1.26656 14.6153H2.7332ZM2.99964 6.68196C2.59463 6.68196 2.26631 7.01028 2.26631 7.41528C2.26631 7.82029 2.59463 8.14861 2.99964 8.14861V6.68196ZM21.0003 8.14861C21.4053 8.14861 21.7336 7.82029 21.7336 7.41528C21.7336 7.01028 21.4053 6.68196 21.0003 6.68196V8.14861ZM19.7341 14.9013C19.7341 14.4963 19.4058 14.168 19.0008 14.168C18.5958 14.168 18.2674 14.4963 18.2674 14.9013H19.7341ZM19.0008 16.506L19.7326 16.5528C19.7336 16.5372 19.7341 16.5216 19.7341 16.506H19.0008ZM19.7219 17.8875L20.1019 17.2603L19.7219 17.8875ZM21.2802 17.8875L20.9001 17.2603L21.2802 17.8875ZM22.0013 16.506H21.2679C21.2679 16.5216 21.2684 16.5372 21.2694 16.5528L22.0013 16.506ZM22.7346 14.6153C22.7346 14.2103 22.4063 13.882 22.0013 13.882C21.5963 13.882 21.2679 14.2103 21.2679 14.6153H22.7346ZM4.66674 10.6553C4.26174 10.6553 3.93342 10.9836 3.93342 11.3886C3.93342 11.7936 4.26174 12.122 4.66674 12.122V10.6553ZM5.88894 12.122C6.29395 12.122 6.62227 11.7936 6.62227 11.3886C6.62227 10.9836 6.29395 10.6553 5.88894 10.6553V12.122ZM18.111 10.6553C17.706 10.6553 17.3777 10.9836 17.3777 11.3886C17.3777 11.7936 17.706 12.122 18.111 12.122V10.6553ZM19.3332 12.122C19.7382 12.122 20.0665 11.7936 20.0665 11.3886C20.0665 10.9836 19.7382 10.6553 19.3332 10.6553V12.122ZM4.26707 14.9025V16.5073H5.73371V14.9025H4.26707ZM4.26744 16.5307C4.28195 16.9834 3.92721 17.3625 3.47453 17.3779L3.52451 18.8437C4.78556 18.8007 5.77375 17.7449 5.73334 16.4838L4.26744 16.5307ZM3.52507 17.3779C3.07238 17.3621 2.71793 16.9828 2.73281 16.5301L1.26695 16.4819C1.22551 17.7431 2.21292 18.7997 3.47398 18.8437L3.52507 17.3779ZM2.7332 16.506V14.6153H1.26656V16.506H2.7332ZM2.99964 8.14861H21.0003V6.68196H2.99964V8.14861ZM18.2674 14.9013V16.506H19.7341V14.9013H18.2674ZM18.2689 16.4593C18.2158 17.2907 18.6293 18.0828 19.3418 18.5146L20.1019 17.2603C19.8566 17.1117 19.7143 16.839 19.7326 16.5528L18.2689 16.4593ZM19.3418 18.5146C20.0543 18.9464 20.9477 18.9464 21.6602 18.5146L20.9001 17.2603C20.6548 17.409 20.3472 17.409 20.1019 17.2603L19.3418 18.5146ZM21.6602 18.5146C22.3728 18.0828 22.7862 17.2907 22.7331 16.4593L21.2694 16.5528C21.2877 16.839 21.1454 17.1117 20.9001 17.2603L21.6602 18.5146ZM22.7346 16.506V14.6153H21.2679V16.506H22.7346ZM4.66674 12.122H5.88894V10.6553H4.66674V12.122ZM18.111 12.122H19.3332V10.6553H18.111V12.122Z" fill="#008DD4" />
                        </svg>
                        @if(!is_null($quote->vehicle_make_1) && !is_null($quote->vehicle_model_1))
                            <span>2x Vehicles</span>
                        @else
                            <span>{{$quote->vehicle_make}} {{$quote->vehicle_model}}</span>
                        @endif
                    </li>
                    <li class="job_new_grid_drop_code">
                        <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#ED1C24"/>
                        </svg>
                        <span>{{$quote->drop_postcode ? extractPostcode($quote->drop_postcode) : '-'}}</span>
                    </li>
                    <li class="job_new_grid_time_from">
                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786V4.33929ZM13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929V2.51786ZM5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929V2.51786ZM13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786V4.33929ZM6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857H6.76786ZM4.94643 4.64286C4.94643 5.14583 5.35417 5.55357 5.85714 5.55357C6.36012 5.55357 6.76786 5.14583 6.76786 4.64286H4.94643ZM4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857H4.94643ZM6.76786 1C6.76786 0.497026 6.36012 0.0892857 5.85714 0.0892857C5.35417 0.0892857 4.94643 0.497026 4.94643 1L6.76786 1ZM14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857H14.0536ZM12.2321 4.64286C12.2321 5.14583 12.6399 5.55357 13.1429 5.55357C13.6458 5.55357 14.0536 5.14583 14.0536 4.64286H12.2321ZM12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857H12.2321ZM14.0536 1C14.0536 0.497026 13.6458 0.0892857 13.1429 0.0892857C12.6399 0.0892857 12.2321 0.497026 12.2321 1L14.0536 1ZM5.85714 2.51786C2.67164 2.51786 0.0892849 5.10021 0.0892849 8.28571H1.91071C1.91071 6.10616 3.67759 4.33929 5.85714 4.33929V2.51786ZM0.0892849 8.28571V15.5714H1.91071V8.28571H0.0892849ZM0.0892849 15.5714C0.0892849 18.7569 2.67164 21.3393 5.85714 21.3393V19.5179C3.67759 19.5179 1.91071 17.751 1.91071 15.5714H0.0892849ZM5.85714 21.3393H13.1429V19.5179H5.85714V21.3393ZM13.1429 21.3393C16.3284 21.3393 18.9107 18.7569 18.9107 15.5714H17.0893C17.0893 17.751 15.3224 19.5179 13.1429 19.5179V21.3393ZM18.9107 15.5714V8.28571H17.0893V15.5714H18.9107ZM18.9107 8.28571C18.9107 5.10021 16.3284 2.51786 13.1429 2.51786V4.33929C15.3224 4.33929 17.0893 6.10616 17.0893 8.28571H18.9107ZM5.85714 4.33929L13.1429 4.33929V2.51786L5.85714 2.51786V4.33929ZM4.94643 3.42857V4.64286H6.76786V3.42857H4.94643ZM6.76786 3.42857V1L4.94643 1V3.42857H6.76786ZM12.2321 3.42857V4.64286H14.0536V3.42857H12.2321ZM14.0536 3.42857V1L12.2321 1V3.42857H14.0536Z" fill="#008DD4" />
                            <path d="M4.64282 11.9286L7.07139 15.5714L14.3571 9.5" stroke="#008DD4" stroke-width="1.82143" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>
                            @if($quote->delivery_timeframe_from)
                                <span>{{ formatCustomDate($quote->delivery_timeframe_from) }}</span>
                            @else
                                <span>{{$quote->delivery_timeframe}}</span>
                            @endif
                        </span>
                    </li>
                    <li class="job_new_grid_date">
                        <span>Expiry date:</span>
                        <span>
                        {{ formatCustomDate($quote->created_at->addDays(10)) }}
                        </span>
                    </li>
                    @php
                        $lowestBid = $quote->lowest_bid ?? 0;
                        $transporterQuotesCount = $quote->quotes_count ?? 0;
                    @endphp

                    @if($transporterQuotesCount > 0)
                        <li class="job_new_grid_lowest">
                            <span>Current lowest bid:</span>
                            <span class="sub_color">£{{roundBasedOnDecimal($lowestBid)}}</span>
                        </li>
                    @else
                    <li class="job_new_grid_lowest">
                        <span>Current lowest bid:</span>
                        <span class="sub_color">£0</span>
                    </li>
                    @endif
                    <li class="job_new_grid_type">
                        <span>Delivery type:</span>
                        <span class="sub_color">
                        {{ $quote->how_moved }}
                        </span>
                    </li>
                    @if($transporterQuotesCount > 0)
                    <li class="job_new_grid_bidding">
                        <span>Transporters bidding:</span>
                        <span class="sub_color">{{ $transporterQuotesCount }}</span>
                    </li>
                    @else
                    <li class="job_new_grid_bidding">
                        <span>Transporters bidding:</span>
                        <span class="sub_color">0</span>
                    </li>
                    @endif
                    <li class="job_new_grid_miles">
                        <span>Journey miles:</span>  
                        <span class="sub_color">{{ str_replace(' mi', '', $quote->distance) }} <span>({{$quote->duration}})</span></span>    
                    </li>
                    <li class="job_new_grid_bid_btn">
                        <div class="jobsrch_right_box">
                        <!-- <img src="{{$quote->map_image}}" alt="image" class="mapimg_jobsrch" /> -->
                        <a href="javascript:;" onclick="share_give_quote('{{$quote->id}}');" class="make_offer_btn checkStatus">Place bid</a>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach
@if(count($quotes)==0)
    <div class="col-12">
        <div class="card nodata-card border-0 rounded-3 bg-white h-100 overflow-hidden">
            <div class="card-body text-center p-3 py-5">
                -Currently no jobs to show-
            </div>
        </div>
    </div>
@endif
<div class="pagination after_search">
    {{ $quotes->links() }}
</div>
@if ($quotes->currentPage() == $quotes->lastPage())
<div class="search_sec_footer">
    <div class="conatiner srch-data">
        <span>That’s all for now. Why not try<br>
            <a href="{{route('transporter.new_jobs_new')}}">editing your search</a> for more jobs.
        </span>
    </div>
</div>
@endif