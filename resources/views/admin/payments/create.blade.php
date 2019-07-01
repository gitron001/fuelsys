@extends('adminlte::page')

@section('content')

	@include('includes/alert_info')

	<h1>Create new payment</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['PaymentsController@store']]) !!}
		
		<div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
			{!! Form::label('date', 'Date:'); !!}
			{!! Form::text('date',null,['class'=>'form-control','autocomplete'=>'off','id' => 'datetimepicker']); !!} 
			{!! $errors->first('date','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
			{!! Form::label('amount', 'Amount:'); !!}
			{!! Form::number('amount',null,['class'=>'form-control','step'=>'any']); !!} 
			{!! $errors->first('amount','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('select') ? 'has-error' :'' }}">
			<label class="checkbox-inline"><input type="checkbox" class="check_class" value="company" checked/>Company</label>
			<label class="checkbox-inline"><input type="checkbox" class="check_class" value="user" />User</label>
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}" id="user" style="display: none">
			{!! Form::label('user_id', 'User:'); !!}
			{!! Form::select('user_id',['Select a User'] + $users,null,['class'=>'form-control','id'=>'user']); !!} 
			{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company">
			{!! Form::label('company_id', 'Company:'); !!}
			{!! Form::select('company_id',['Select a Company'] + $companies,null,['class'=>'form-control','id'=>'company']); !!} 
			{!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create new payment', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>

	$(function() {
		$(".datepicker" ).datepicker();
	});

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