@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::open( array( 'route' => ['payments.index'], 'role' => 'form' ) ) }}
    @include('admin.payments._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>

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

    //Append another div if button(add another payment) + is clicked
    $(document).on('click','#addPayment',function(){
        $("#another_payment").append('<div class="row" id="another_payment" style="margin-top: 10px;"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removePayment"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="another_payment_user[]" required><option value="">Choose User</option><?php foreach($users as $key => $value){ ?><?php echo "<option value=".$key.">$value</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="Amount" name="another_payment_amount[]" type="number" required></div></div>');
    });

    $(document).on('click','#removePayment',function(){
        $(this).closest("#another_payment").remove();
    });

</script>

@endsection
