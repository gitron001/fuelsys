@extends('adminlte::page')

@section('content')

	@include('includes/alert_info')

	<h1>{{!isset($payment) ? 'Create new payment' : 'Edit payment'}}</h1>
	
		<div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
			{!! Form::label('date', 'Date:'); !!}
			@if(!isset($payment))
				{!! Form::text('date',null,['class'=>'form-control','autocomplete'=>'off','id' => 'datetimepicker']); !!}
			@else
				<input type="text" id="datetimepickerF" value="{{ date('m/d/Y H:i:s', $payment->date) }}" name="date" class="form-control" autocomplete="off">
			@endif 
			{!! $errors->first('date','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
			{!! Form::label('amount', 'Amount:'); !!}
			{!! Form::number('amount',null,['class'=>'form-control','step'=>'any']); !!} 
			{!! $errors->first('amount','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('select') ? 'has-error' :'' }}">
			<label class="checkbox-inline"><input type="checkbox" class="check_class" name="checkbox" value="company" 
				@if (isset($payment) && $payment->company_id != 0) echo checked @endif/>Company</label>
			<label class="checkbox-inline"><input type="checkbox" class="check_class" name="checkbox" value="user" 
				@if (isset($payment) && $payment->user_id != 0) echo checked @endif/>User</label>
		</div>
		
		@if(!isset($payment))
		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}" id="user" style="display: none">
		@else
		<div class="form-group" id="user" @if ($payment->user_id == 0) echo style="display: none" @endif>
		@endif
			{!! Form::label('user_id', 'User:'); !!}
			{!! Form::select('user_id',['Select a User'] + $users,null,['class'=>'form-control','id'=>'user']); !!} 
			{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
		</div>

		@if(!isset($payment))
		<div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company">
		@else
		<div class="form-group" id="company" @if ($payment->company_id == 0) echo style="display: none" @endif>
		@endif
			{!! Form::label('company_id', 'Company:'); !!}
			{!! Form::select('company_id',['Select a Company'] + $companies,null,['class'=>'form-control','id'=>'company']); !!} 
			{!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::submit((!isset($payment) ? 'Create new payment' : 'Edit payment'), ['class'=>'btn btn-block btn-success']); !!}
		</div>

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
    	$('input[type=checkbox]').on('change', function() {
		    if($(this).is(':checked'))
		        $checkboxValue = $(this).val();

		    	if($checkboxValue == 'user'){
		    		$('#company option:first').prop('selected',true);
		    		$("#company").hide();
		    		$("#user").show();
		    	}else{
		    		$('#user option:first').prop('selected',true);
		    		$("#company").show();
		    		$("#user").hide();
		    	}
		});
	});

</script>

@endsection