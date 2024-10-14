@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <style>
        .how-title {
            font-size: 16px;
            font-weight: 600;
            color: #000000;
        }

        .how-desc {
            font-size: 14px;
            font-weight: 300;
            color: #000000;
        }

        .how-works { counter-reset: item-counter;}

        .how-works .content-wrap {
            counter-increment: item-counter;
            list-style: none;
            position: relative;
            padding-left: 50px;
        }

        .how-works .content-wrap::before {
            content: counter(item-counter);
            background-color:#0356D6;
            width: 37px;
            height: 37px;
            line-height:37px;
            border-radius: 100%;
            display: flex;
            flex-wrap: wrap;
            font-size: 24px;
            font-weight: 600;
            color:#ffffff;
            align-items: center;
            justify-content: center;
            position: absolute;
            left:0;
            top:5px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/globle.css') }}" />
@endsection


@section('content')
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
            @include('layouts.transporter.dashboard.top_head')
            <!-- content part -->
            <div class="content_container">

                <div class="job_container job_container_watchList">
                    <div class="admin_job_bx find_trans_newjob list_of_items" id="style-1">
                        <div class="admin_job_top flex-column header-banner">
                            <h3 class="mb-md-3">How it works</h3>
                            {{-- <p class="pera_srch">Here are the jobs you are currently watching.</p> --}}
                        </div>

                        <div class="container">
                            <div class="row how-works">
                                <div class="col-12">
                                    <div class="content-wrap">
                                        <p class="how-title mb-1">Finding Transport Jobs</p>
                                        <p class="how-desc">You will see all available jobs in the ‘Find jobs’ section or
                                            search for jobs by collection and delivery areas. Save your searches and receive
                                            an email when a new job is posted that matches your saved search.</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="content-wrap">
                                        <p class="how-title mb-1">Finding Transport Jobs</p>
                                        <p class="how-desc">You will see all available jobs in the ‘Find jobs’ section or
                                            search for jobs by collection and delivery areas. Save your searches and receive
                                            an email when a new job is posted that matches your saved search.</p>
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
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>
@endsection
