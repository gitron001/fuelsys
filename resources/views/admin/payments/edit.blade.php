@extends('adminlte::page')

@section('content')
	<h1>Edit Payment</h1>
		{!! Form::model($payment,['method'=>'PATCH', 'action'=>['PaymentsController@update',$payment->id]]) !!}
		
		<div class="form-group">
			<label for="Date:">Date:</label>
			<input type="text" value="{{ date('m/d/Y', $payment->date) }}" name="date" class="form-control datepicker" autocomplete="off"> 
		</div>

		<div class="form-group">
			{!! Form::label('amount', 'Amount'); !!}
			{!! Form::number('amount',null,['class'=>'form-control','step'=>'any']); !!} 
		</div>

		<div class="form-group" @if ($payment->user_id == 0) echo style="display: none" @endif>
			{!! Form::label('user_id', 'User'); !!}
			{!! Form::select('user_id',['Select a User'] + $users,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group" @if ($payment->company_id == 0) echo style="display: none" @endif>
			{!! Form::label('company_id', 'Company'); !!}
			{!! Form::select('company_id',['Select a Company'] + $companies,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit Payment', ['class'=>'btn btn-block btn-primary']); !!}
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
</script>

@endsection