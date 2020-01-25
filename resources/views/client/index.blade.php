@extends('layouts.master')

@section('title', 'Client')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all clients</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('client.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover"
                               id="dt_client"
                               data-source="{{ route('client.list', [
                                                    'user_branch' => auth()->user()->branch_id
                                            ]) }}">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Mobile Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
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

    <script>
        var $dt_client = $("#dt_client");

        $('#dt_client').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: 'POST',
                url: $dt_client.data("source")
            },
            dom: 'lfrtip',
            lengthMenu: [[50, 100, -1], [50, 100, "All"]],
            pageLength: "50",
            columns: [
                {
                    "data": "first_name",
                    "name": "first_name"
                },
                {
                    "data": "last_name",
                    "name": "last_name"
                },
                {
                    "data": "gender",
                    "name": "gender"
                },
                {
                    "data": "mobile_number",
                    "name": "mobile_number"
                },
                {
                    "data": "address",
                    "name": "address"
                },
                {
                    "data": "actions",
                    "name": "actions",
                },
            ],
            order: [[0, 'desc']]
        });

    </script>
@endpush
