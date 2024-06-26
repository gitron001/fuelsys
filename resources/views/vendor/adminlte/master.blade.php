<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Dynamic web title -->
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
    @section('title', 'Fuel System')
    @yield('title', config('app.name'))
    @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- End Dynamic web title -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/fs-icon2.ico') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/ajax/libs/bootstrap-select/1.13.9/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css') }}">


    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/ui/1.11.4/themes/smoothness/jquery-ui.css') }}">


    <link rel="script/javascript" href="{{ asset('js/bootstrap.js') }}">


    @if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/ajax/libs/select2/css/select2.css') }}">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    <!-- Custom style -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >


    @if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/datatables.min.css') }}">
    @endif

    @yield('adminlte_css')

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery-1.10.2.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery-ui.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/font-awesome/js/all.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/ajax/libs/moment.js/2.13.0/moment.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/ajax/libs/bootstrap-select/1.13.9/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/sweetalert/dist/sweetalert.min.js') }}"></script>
<script>
// Hide alert message after few seconds (We use this script for the alert message that shows after we create or update fields)
    $(".alert").delay(4500).slideUp(200, function() {
      $(this).alert('close');
    });
</script>

@if(config('adminlte.plugins.select2'))
<!-- Select2 -->
<script src="{{ asset('vendor/adminlte/vendor/ajax/libs/select2/js/select2.min.js') }}"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <!--<script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>-->
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="{{ asset('vendor/adminlte/vendor/ajax/libs/chart/chart.bundle.min.js') }}"></script>
@endif

@yield('adminlte_js')

</body>
</html>
