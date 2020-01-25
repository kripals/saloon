var $dt_appointment_report = $("#dt_appointment_report");

$('#dt_appointment_report').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        type: 'POST',
        url: $dt_appointment_report.data("source")
    },
    dom: 'Blfrtip',
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible'
            },
            orientation: 'landscape',
            pageSize: 'LEGAL'
        },
        {
            extend: 'print',
            exportOptions: {
                columns: ':visible'
            }
        }
    ],
    lengthMenu: [[50, 100, -1], [50, 100, "All"]],
    pageLength: "50",
    columns: [
        {
            "data": "client_name",
            "name": "client_name"
        },
        {
            "data": "employee",
            "name": "employee"
        },
        {
            "data": "service",
            "name": "service"
        },
        {
            "data": "date",
            "name": "date"
        },
        {
            "data": "time",
            "name": "time"
        },
        {
            "data": "duration",
            "name": "duration",
        },
        {
            "data": "branch",
            "name": "branch",
        },
    ],
    order: [[0, 'desc']]
});
