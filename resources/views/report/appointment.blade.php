@extends('layouts.master')

@section('title', 'Appointment Report')

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            {{ Form::open(['route' =>'report.appointment','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            <div class="card">
                <div class="card-body">
                    <p class="text-bold">
                    <h2>Appointment Report</h2>
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ Form::select('search_key', $search, old('search_key'), ['class'=>'form-control select2-list']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ Form::text('search_value',old('search_value'), ['class'=>'form-control','placeholder'=>'Type the search key']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-datetime input-group" id="date-range">
                                    <div class="input-group-content">
                                        {{ Form::text('start_date', null,['class'=>'form-control date-picker','placeholder'=>'Select a date','id'=>'start_date']) }}
                                        <p class="help-block">yyyy-mm-dd</p>
                                        <div class="form-control-line"></div>
                                    </div>
                                    <span class="input-group-addon">to</span>
                                    <div class="input-group-content">
                                        {{ Form::text('end_date', null,['class'=>'form-control date-picker','placeholder'=>'Select a date','id'=>'end_date']) }}
                                        <p class="help-block">yyyy-mm-dd</p>
                                        <div class="form-control-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        {{ Form::checkbox('all', 1, old('all'), ['id'=>'all-date']) }}
                                        All
                                    </label>
                                </div>
                            </div>
                            <div class="card-actionbar">
                                <div class="card-actionbar-row">
                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">
                                        search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>


    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">appointment report</header>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_appointment_report"
                               class="table order-column hover"
                               data-source="{{ route('report.appointment.list', [
                                                    'search_key'    => $request->search_key,
                                                    'search_value'  => $request->search_value,
                                                    'sdate'         => $request->start_date ?: 0,
                                                    'edate'         => $request->end_date ?: 0,
                                                    'all'           => $request->all ?: 0,
                                            ]) }}">
                            <thead>
                            <tr>
                                <th>CLIENT NAME</th>
                                <th>EMPLOYEE</th>
                                <th>SERVICE</th>
                                <th>DATE</th>
                                <th>TIME</th>
                                <th>DURATION</th>
                                <th>BRANCH</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('styles')
    <link rel="stylesheet" href="{{ asset('material/css/libs/DataTables/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('material/css/libs/DataTables/TableTools.css') }}"/>
@endpush

@push('scripts')
    <script src="{{ asset('material/js/libs/jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('material/js/libs/jquery-validation/dist/additional-methods.js') }}"></script>
    <script src="{{ asset('material/js/libs/DataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/pages/dt_appointment_report.js') }}"></script>
@endpush
