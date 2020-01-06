(function (namespace, $) {
    "use strict";

    var OrderDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });
    };
    var p = OrderDataTable.prototype;

    p.initialize = function () {
        this._initDataTables();
    };

    p._initDataTables = function () {
        if (!$.isFunction($.fn.dataTable)) {
            return;
        }

        this.createDataTable();
    };

    p.createDataTable = function () {
        var $dt_appointment_report = $("#dt_appointment_report");

        var table = $dt_appointment_report.DataTable({
            "dom": "rBftip",
            "language": {
                "processing": "<h2 id='dt_loading'><span class='fa fa-spinner fa-pulse'></span> Loading...</h2>"
            },
            "buttons": [
                'pageLength', 'colvis',
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
            "colVis": {
                exclude: [ ]
            },
            "processing": true,
            "serverSide": false,
            "ajax": {
                "type": "POST",
                "url": $dt_appointment_report.data("source")
            },
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            "pageLength": "50",
            "order": [ ],
            "columns": [
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
            ]
        });
    };

    window.materialadmin.OrderDataTable = new OrderDataTable;
}(this.materialadmin, jQuery));
