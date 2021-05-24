@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $expenses, ['route' => ['expenses.update', $expenses->id], 'method' => 'put', 'role' => 'form', 'class' => 'expenses-form'] ) }}
    @include('admin.expenses._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>

    $(document).ready(function(){
        $("form.expenses-form").submit(function () {
            const button = document.getElementById('expenses-save-btn');
            button.disabled = true;
        });
    });

	$(function() {
		$(".datepicker" ).datepicker();
	});

	$('#datetimepickerF').datetimepicker();

	$(document).ready(function() {

		var date = new Date();
		$('#datetimepicker').datetimepicker({
            defaultDate:date
        });

	});

</script>

@endsection
