@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::open( array( 'route' => ['pos-payments.index'], 'role' => 'form' ) ) }}
    @include('admin.pos_payments._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
	$(document).ready(function() {
		var date = new Date();
		$('#datetimepicker').datetimepicker({
            defaultDate:date
        });
	});
</script>

@endsection
