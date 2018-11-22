@extends('adminlte::page')

@section('content')
	<h1>Create new transaction</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['TransactionController@store']]) !!}
		
		<div class="form-group {{ $errors->has('dispaneser_id') ? 'has-error' :'' }}">
			{!! Form::label('dispaneser_id', 'Dispanser_Id:'); !!}
			{!! Form::select('dispaneser_id',['Choose Dispaneser'] + $dispanesers,null,['class'=>'form-control']); !!} 
			{!! $errors->first('dispaneser_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
			{!! Form::label('user_id', 'User_Id:'); !!}
			{!! Form::select('user_id',['Choose User'] + $users,null,['class'=>'form-control']); !!} 
			{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('total') ? 'has-error' :'' }}">
			{!! Form::label('total', 'Total:'); !!}
			{!! Form::number('total',null,['class'=>'form-control']); !!} 
			{!! $errors->first('total','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
			{!! Form::label('amount', 'Amount:'); !!}
			{!! Form::number('amount',null,['class'=>'form-control']); !!}
			{!! $errors->first('amount','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Create new transaction', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection