@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $stock, ['route' => ['stock.update', $stock->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.stock._fields')
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
