<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="hairnshanti">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
          type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/bootstrap.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/materialadmin.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/font-awesome.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('material/css/material-design-iconic-font.min.css') }}"/>
    <link type="text/css" rel="stylesheet"
          href="{{ asset('material/css/material-design-iconic-font.min.css') }}"/>
    <link href="{{ asset('material/css/libs/select2/select2.css') }}" rel="stylesheet">
    <!-- END STYLESHEETS -->

    <!-- PAGE LEVEL STYLESHEETS -->
    @stack('styles')
    <!-- END PAGE LEVEL STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('material/js/libs/utils/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('material/js/libs/utils/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Page Level Styles -->
    @stack('styles')
</head>
<body class="menubar-hoverable header-fixed menubar-pin ">

@if (auth()->guest())
    @yield('guest')
@else
    @include('layouts.header')

    <!-- BEGIN BASE-->
    <div id="base">
        <!-- BEGIN CONTENT-->
        <div id="content">
            @yield('content')
        </div><!--end #content-->
        <!-- END CONTENT -->

        @include('layouts.menubar')

    </div><!--end #base-->
    <!-- END BASE -->
@endif

<!-- BEGIN JAVASCRIPT -->
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
