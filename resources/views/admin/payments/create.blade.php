@extends('adminlte::page')

@section('content')
	<h1>Create new payment</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['PaymentsController@store']]) !!}
		
		<div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
			{!! Form::label('date', 'Date:'); !!}
			{!! Form::text('date',null,['class'=>'form-control datepicker','autocomplete'=>'off']); !!} 
			{!! $errors->first('date','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
			{!! Form::label('amount', 'Amount:'); !!}
			{!! Form::number('amount',null,['class'=>'form-control','step'=>'any']); !!} 
			{!! $errors->first('amount','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
			{!! Form::label('user_id', 'User:'); !!}
			{!! Form::select('user_id',['Select a User'] + $users,null,['class'=>'form-control']); !!} 
			{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}">
			{!! Form::label('company_id', 'Company:'); !!}
			{!! Form::select('company_id',['Select a Company'] + $companies,null,['class'=>'form-control']); !!} 
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
</script>

@endsection