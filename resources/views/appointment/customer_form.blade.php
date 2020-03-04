<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
          type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/bootstrap.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/materialadmin.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/font-awesome.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/material-design-iconic-font.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link type="text/css" rel="stylesheet"
          href="{{ asset('material/css/material-design-iconic-font.min.css') }}"/>
    <link href="{{ asset('material/css/libs/select2/select2.css') }}" rel="stylesheet">
    <!-- END STYLESHEETS -->
</head>

<body>
<section>
    <div class="section-body">
        {{ Form::open(['route' =>'customer.appointment.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
        <div class="row">
            <div class="col-md-12">
                @include('partials.errors')
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <header><h2>Appointment Form</h2></header>
                        <div class="tools visible-xs">
                            <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Submit">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ Form::date('date', old('date'),['class'=>'form-control date-picker', 'required']) }}
                                    {{ Form::label('date','Date') }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ Form::text('time',old('time'),['class'=>'form-control time-picker', 'required']) }}
                                    {{ Form::label('time','Time') }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ Form::number('duration',old('duration'),['class'=>'form-control', 'required']) }}
                                    {{ Form::label('duration','Duration In Hrs') }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ Form::select('gender', [ 'MALE' => 'Male', 'FEMALE' => 'Female' ], old('gender'), ['class' => 'form-control', 'required']) }}
                                    {{ Form::label('gender', 'Gender') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::text('first_name',old('first_name'),['class'=>'form-control', 'required']) }}
                                    {{ Form::label('first_name','First Name') }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::text('last_name',old('last_name'),['class'=>'form-control', 'required']) }}
                                    {{ Form::label('last_name','Last Name') }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::text('mobile_number',old('mobile_number'),['class'=>'form-control', 'required']) }}
                                    {{ Form::label('mobile_number','Mobile Number') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::text('address',old('address'),['class'=>'form-control', 'required']) }}
                                    {{ Form::label('address','Address') }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::select('service[]', $services, isset($appointment) ? $appointment->service->pluck('id') : old('service'), ['class' => 'form-control select2-list', 'required', 'multiple' => 'multiple']) }}
                                    {{ Form::label('service', 'Service') }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::select('branch', $branch, isset($appointment) ? $appointment->branch->pluck('id') : old('branch'), ['class' => 'form-control select2-list', 'required']) }}
                                    {{ Form::label('branch', 'Branch') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                                <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    </div>
</section>
<script src="{{ asset('material/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('material/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('material/js/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('material/js/libs/spin.js/spin.min.js') }}"></script>
<script src="{{ asset('material/js/libs/autosize/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('material/js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
<script src="{{ asset('material/js/core/source/App.js') }}"></script>
<script src="{{ asset('material/js/core/source/AppNavigation.js') }}"></script>
<script src="{{ asset('material/js/core/source/AppOffcanvas.js') }}"></script>
<script src="{{ asset('material/js/core/source/AppCard.js') }}"></script>
<script src="{{ asset('material/js/core/source/AppForm.js') }}"></script>
<script src="{{ asset('material/js/core/source/AppNavSearch.js') }}"></script>
<script src="{{ asset('material/js/core/source/AppVendor.js') }}"></script>
<script src="{{ asset('material/js/core/demo/Demo.js') }}"></script>
<script src="{{ asset('material/js/core/demo/DemoLayouts.js') }}"></script>
<script src="{{ asset('material/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('material/js/libs/select2/select2.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script>
    $(document).ready(function () {
        // $(".date-picker").inputmask({
        //     mask: "y-1-2",
        //     placeholder: "yyyy-mm-dd",
        //     leapday: "-02-29",
        //     separator: "-",
        //     alias: "yyyy-mm-dd"
        // });

        $(".time-picker").inputmask({
            placeholder: "hh:mm",
            separator: "-",
            alias: "hh:mm"
        });

        $('.select2-list').select2();
    })
</script>
<!-- END JAVASCRIPT -->

<!-- BEGIN PAGE LEVEL JAVASCRIPT -->
@stack('scripts')
<!-- END PAGE LEVEL JAVASCRIPT -->

</body>
</html>
