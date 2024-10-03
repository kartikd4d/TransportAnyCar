@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .wd-transport-dtls h1 {
            text-transform: capitalize;
        }    
        .wd-transport-rght ul li {
            align-items: flex-start;
            margin: 8px 0;
        }
        .wd-transport-area {
            align-items: self-start;
        }
        ul.wd-star-lst {
            margin-bottom: 0;
        }
        .wd-transport-img {
            padding-top: 11px;
        }
        .feedback-time-line .table-responsive {
            border-radius: 5px;
            border: 1px solid #C3C3C3;
        }
        .feedback-time-line table {
            border: none;
        }


@media(max-width: 1199px){
    .wd-transport-area {
        flex-wrap: wrap;
    }
    .wd-transport-rght ul li p {
        font-size: 14px;
        min-width: 126px;
    }
    .wd-transport-rght ul li span.wd-black {
        font-size: 18px;
    }
    .wd-transport-rght ul li {
        margin: 5px 0;
    }
    .wd-pb {
    padding-bottom: 60px;
}
}

@media(max-width: 767px){
.wd-transport-img {
    padding-top: 5px;
    padding-bottom: 5px;
}
.wd-transport-rght ul li p {
    font-size: 16px;
    min-width: 144px;
}
.wd-transport-rght ul li span.wd-black {
    font-size: 22px;
}       
.wd-feedback-box .col-lg-6:nth-child(1) {
    border-bottom: 1px solid #ccc;
    padding-bottom: 20px;
    margin-bottom: 25px;
}
.wd-transport-rght ul li span {
    padding: 0px 12px;
}
.wd-transport-rght ul li span br {
    display: none;
}



}



    </style>
@endsection

@section('content')
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
        @include('layouts.transporter.dashboard.top_head')
        <!-- content part -->
            <div class="content_container">
                <div class="inner_content">
                    <div class="wd-white-box">
                        <div class="wd-feedback-box">
                            <div class="row wd-pb">
                                <div class="col-lg-6">
                                    <div class="wd-transport-dtls">
                                        <h1>{{$user->name ?? '-'}} 
                                            <!-- <span>({{count($feedback)}})</span> -->
                                        </h1> 
                                        <ul class="wd-star-lst">
                                                <li>
                                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                                    </svg>
                                                </li>
                                                {{-- <li>({{ number_format($overall_percentage, 0) }}%)</li> --}}
                                                <!-- <li>({{100}}%)</li> -->
                                            </ul>                                       
                                        <div class="wd-transport-area">
                                            <div class="wd-transport-img">
                                            
                                                <img src="{{ $user->profile_image }}" style="width:50px" alt="trasporter feedback" class="img-fluid">
                                            </div>
                                            <div class="wd-transport-rght">
                                                <ul>
                                                    <li>
                                                        <p>Positive feedback:</p>
                                                        {{-- <span class="wd-black">{{ number_format($positive_feedback_percentage, 0) }}%</span> --}}
                                                    </li>
                                                    <!-- <li>
                                                        <p>Completed jobs:</p>
                                                        <span>{{$completed_job}}</span>
                                                    </li> -->
                                                    <li>
                                                        <p>Insurance:</p>

                                                        <span>
                                                            @if($user->insurance_cover)  
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                                              </svg>
                                                        @endif
                                                    </span>
                                                    </li>
                                                    <li>
                                                        <p>Photo Id:</p>
                                                        <span>
                                                            @if($user->profile_image)  
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                                              </svg>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <p>Total Reviews:</p>
                                                        <span>{{count($feedback)}}</span>
                                                    </li>
                                                    <li>
                                                        <p>Job Conpleted:</p>
                                                        <span>{{$completed_job}}</span>
                                                    </li>
                                                    <li>
                                                        <p>Miles Travelled:</p>
                                                        <span>{{$distance}}</span>
                                                    </li>
                                                    <li>
                                                        <p>Total Earning:</p>
                                                        <span>{{$total_earning}}</span>
                                                    </li>
                                                    <li>
                                                        <p>Payment method:</p>
                                                        <span>Credit/Debit Card, Cash, <br />Paypal, Visa, Cheque </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="feedback-tbl" id="feedback_listing">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/web/js/admin.js')}}"></script>
    <script>
        var globalSiteUrl = '<?php echo $path = url('/'); ?>'

        function fetch_data(page) {
            $.ajax({
                url: globalSiteUrl + "/transporter/feedback_listing?page=" + page + '&' + params(),
                success: function (res) {
                    let result = res.data;
                    if (result){
                        $('#feedback_listing').html(result.html);
                    }
                }
            });
        }

        function params() {
            var search = $('#search').val();
            return "search=" + search;
        }

        $(document).ready(function () {
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#page').val(page);
            fetch_data(page);
        });

        // $(document).on('submit', '#searchForm', function (event) {
        //     event.preventDefault();
        //     fetch_data(1);
        // });

        // $('#search').on('input', function() {
        //     var search = $(this).val();
        //     if (search === '') {
        //         fetch_data(1);
        //     }
        // });
        $(document).ready(function () {
            $(document).on('click', '.read_more_show', function() {
                var parentTr = $(this).closest('tr');
                var readMoreContent = parentTr.find('.read_more_content');
                $(this).addClass('d-none');
                readMoreContent.removeClass('d-none');
                parentTr.find('.read_more_less').removeClass('d-none');
            });
            $(document).on('click', '.read_more_less', function() {
                var parentTr = $(this).closest('tr');
                var readMoreContent = parentTr.find('.read_more_content');
                parentTr.find('.read_more_show').removeClass('d-none');
                readMoreContent.addClass('d-none');
                $(this).addClass('d-none');
            });
        });
    </script>

@endsection
