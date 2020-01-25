@extends('layouts.master')

@section('title', 'Appointment Report')

@section('content')
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
                                                    'sdate'         => $request->start_date ?: 0,
                                                    'edate'         => $request->end_date ?: 0,
                                                    'all'           => $request->all ?: 0,
                                                    'search_key'    => $request->search_key,
                                                    'search_value'  => $request->search_value,
                                                    'user_branch' => auth()->user()->branch_id
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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

    <script src="{{ asset('material/js/libs/jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('material/js/libs/jquery-validation/dist/additional-methods.js') }}"></script>
{{--    <script src="{{ asset('material/js/libs/DataTables/jquery.dataTables.js') }}"></script>--}}
    <script src="{{ asset('js/pages/dt_appointment_report.js') }}"></script>
@endpush
