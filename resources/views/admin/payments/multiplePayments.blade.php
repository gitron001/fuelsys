@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<form action="/admin/payments/multiple" method="post">
{{ csrf_field() }}
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Create multiple payments</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
					{!! Form::label('date', 'Date:'); !!}
						{!! Form::text('date',null,['class'=>'form-control','autocomplete'=>'off','id' => 'datetimepicker']); !!}
					{!! $errors->first('date','<span class="help-block">:message</span>') !!}
				</div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('type', 'Type:'); !!}
					{!! Form::select('type',[''=>'Choose type','1'=>'Pagese','2'=>'Hyrje'],null,['class'=>'form-control']); !!}
					{!! $errors->first('type','<span class="help-block">:message</span>') !!}
                </div>
            </div>

		</div>

        <div class="form-group" id="another_payment">
            {!! Form::label('another_payment', 'Add payment:'); !!}

            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle" id="addPayment"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div class="col-md-5">
                    {!! Form::select('another_payment_user[]',['' => 'Select a User'] + $users,null,['class'=>'form-control','id'=>'userDropdown','data-live-search'=>'true','data-style'=>'btn-dropdownSelectNew']); !!}
                </div>
                <div class="col-md-6">
                    {!! Form::number('another_payment_amount[]',null,['class'=>'form-control','placeholder'=>'Amount','step'=>'any']); !!}
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                {!! Form::label('description', 'Description:'); !!}
                {!! Form::textarea('description',null,['class'=>'form-control','rows' => 3]); !!}
                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
            </div>
        </div>
	</div>


	<div class="box-footer">
		<button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Save
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> Cancel </a>
	</div>

</div>

</form>

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
