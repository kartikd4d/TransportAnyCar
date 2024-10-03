@extends('layouts.master')

@section('content')
<div class="row wd-sl-rowmain">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-orange bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-orange p-3">
                            <h5 class="text-orange">Welcome Back !</h5>
                        </div>
                    </div>
                    <div class="col-5 align-self-end"> <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid"> </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4"> <img src="{{ isset(Auth::user()->profile_image) ? asset(Auth::user()->profile_image) : asset('/assets/images/users/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle"> </div>
                        <h5 class="font-size-15 text-truncate">{{ucfirst(@Auth::user()->name)}}</h5>

                    </div>
                    <div class="col-sm-8">
                        <div class="pt-4">
                            <div class="row">

                            </div>
                            <div class="mt-4"> <a href="{{route('admin.profile')}}" class="btn btn-orange waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card wd-sl-dashcard">
            <div class="card-body">
                <h5 class="mb-4">Total Users</h5>
                <h1>{{($counter['user']) ?? 0}}</h1>
            </div>
        </div>
        <div class="card wd-sl-dashcard">
            <div class="card-body">
                <h5 class="mb-4">Total Car Transporter</h5>
                <h1>{{($counter['car_transporter']) ?? 0}}</h1>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        {{-- <div class="row wd-sl-otherrow">
            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Total Agency</p>
                                <h4 class="mb-0">{{($counter['agency']) ?? 0}}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-orange">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Total Vehicles</p>
                                <h4 class="mb-0">{{($total_vehicles) ?? 0}}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-orange mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-orange">
                                        <i class="bx bx-archive-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div> --}}
        <div class="card h-100">
                <div class="card-body">
                    <div id="container" style="width: 100%;">

                    </div>
                </div>
            </div>

    </div>
</div>


@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>


<script>
    Highcharts.getJSON(
        '{{route("admin.totalusers")}}',
        function(data) {

            Highcharts.chart('container', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'Register Users'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'Register Users'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, "white"],
                                [1, "white"]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },

                series: [{
                    type: 'area',
                    name: 'USERS',
                    data: data
                }]
            });
        }
    );
</script>
@endsection
