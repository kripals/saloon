@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section>
        <div class="section-body">
            <div class="row">

                <!-- BEGIN ALERT - VISITS -->
                <a href="{{ url('employee') }}" target="_blank">
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-warning no-margin">
                                    <strong class="text-xl">{{ $old_employee_count }} OLD + {{ $new_employee_count }}
                                        NEW</strong><br/>
                                    <span class="opacity-70">Employees</span>
                                    <div class="stick-bottom-right">
                                        <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                </a>
                <!-- END ALERT - VISITS -->

                <!-- BEGIN ALERT - REVENUE -->
                <a href="{{ url('appointment') }}" target="_blank">
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-info no-margin">
                                    <strong class="text-xl">{{ $old_appointment_count }} OLD
                                        + {{ $new_appointment_count }} NEW</strong><br/>
                                    <span class="opacity-50">Appointments</span>
                                    <div class="stick-bottom-left-right">
                                        <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                </a>
                <!-- END ALERT - REVENUE -->

                <!-- BEGIN ALERT - BOUNCE RATES -->
                <a href="{{ url('client') }}" target="_blank">
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-danger no-margin">
                                    <strong class="text-xl">{{ $old_client_count }} OLD + {{ $new_client_count }}
                                        NEW</strong><br/>
                                    <span class="opacity-50">Clients</span>
                                    <div class="stick-bottom-left-right">
                                        <div class="progress progress-hairline no-margin">
                                            <div class="progress-bar progress-bar-danger" style="width:43%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                </a>
                <!-- END ALERT - BOUNCE RATES -->

                <!-- BEGIN ALERT - TIME ON SITE -->
            {{--                <div class="col-md-3 col-sm-6">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body no-padding">--}}
            {{--                            <div class="alert alert-callout alert-success no-margin">--}}
            {{--                                <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>--}}
            {{--                                <strong class="text-xl">54 sec.</strong><br/>--}}
            {{--                                <span class="opacity-50">Avg. time on site</span>--}}
            {{--                            </div>--}}
            {{--                        </div><!--end .card-body -->--}}
            {{--                    </div><!--end .card -->--}}
            {{--                </div><!--end .col -->--}}
            <!-- END ALERT - TIME ON SITE -->

            </div><!--end .row -->

            <div class="row">
                <!-- BEGIN SITE ACTIVITY -->
                <div class="col-md-8">
                    <div class="card ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
                                    </figure>
                                </div><!--end .card-body -->
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END SITE ACTIVITY -->

                <!-- BEGIN REGISTRATION HISTORY -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-head">
                            <header>Todays Appointments</header>
                            <div class="tools">
                                <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                            </div>
                        </div><!--end .card-head -->
                        <div class="card-body no-padding height-9">
                            <ul class="list divider-full-bleed">
                                @foreach($appointments as $appointment)
                                    <li class="tile">
                                        <div class="tile-content">
                                            <div class="tile-icon">
                                            </div>
                                            <div class="tile-text">{{ $appointment->client->name }}</div>
                                        </div>
                                        <a class="btn btn-flat ink-reaction">
                                            {{ $appointment->time }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END REGISTRATION HISTORY -->

            </div><!--end .row -->

            <div class="row">


            </div><!--end .row -->
        </div><!--end .section-body -->
    </section>
@endsection

@push('styles')
    <style>
        .highcharts-figure, .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{--    <script src="https://code.highcharts.com/modules/series-label.js"></script>--}}
    {{--    <script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
    {{--    <script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
    {{--    <script src="https://code.highcharts.com/modules/accessibility.js"></script>--}}

    <script type="text/javascript">
        var keys = [{{ implode(',', $appointment_keys) }}];
        var amount = [{{ implode(',', $appointment_price) }}];

        Highcharts.chart('container', {
            title: {
                text: 'Weekly Service'
            },
            subtitle: {
                text: 'Weekly Sales'
            },
            xAxis: {
                categories: keys
            },
            yAxis: {
                title: {
                    text: 'Daily Amount'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Amount',
                data: amount
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
@endpush
