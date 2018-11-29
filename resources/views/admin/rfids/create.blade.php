@extends('adminlte::page')

@section('content')
	<h1>Create new rfid</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['RfidController@store']]) !!}
		
		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}">
			{!! Form::label('ffid', 'FFID:'); !!}
			{!! Form::number('ffid',null,['class'=>'form-control']); !!} 
			{!! $errors->first('ffid','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
			{!! Form::label('user_id', 'User_id:'); !!}
			{!! Form::select('user_id',['Choose User'] + $users,null,['class'=>'form-control']); !!} 
			{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create new product', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection