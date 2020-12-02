@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $payment, ['route' => ['payments.update', $payment->id], 'method' => 'put', 'role' => 'form', 'class' => 'payment-form'] ) }}
    @include('admin.payments._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>

    $(document).ready(function(){
        $("form.payment-form").submit(function () {
            const button = document.getElementById('payment-save-btn');
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

		$(document).on('change', ".check_class", function () {
			$(".check_class").prop("checked", false);
			$(this).prop("checked", true);
		});
	});

	$(document).ready(function() {
    	$('input[type=checkbox]').on('click', function() {
		    if($(this).is(':checked'))
		        $checkboxValue = $(this).val();

		    	if($checkboxValue == 'user'){
					$("#companyDropdown").val('0').trigger('change');
		    		$("#company").hide();
		    		$("#user").show();
		    	}else{
					$("#userDropdown").val('0').trigger('change');
		    		$("#company").show();
		    		$("#user").hide();
		    	}
		});
	});

</script>

@endsection
