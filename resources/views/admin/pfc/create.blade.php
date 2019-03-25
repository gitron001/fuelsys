@extends('adminlte::page')

@section('content')
	<h1>Create new PFC</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['PFCController@store']]) !!}
		
		<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
			{!! Form::label('name', 'Name:'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
			{!! $errors->first('name','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('ip') ? 'has-error' :'' }}">
			{!! Form::label('ip', 'IP:'); !!}
			{!! Form::text('ip',null,['class'=>'form-control']); !!} 
			{!! $errors->first('ip','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('port') ? 'has-error' :'' }}">
			{!! Form::label('port', 'Port:'); !!}
			{!! Form::number('port',null,['class'=>'form-control']); !!} 
			{!! $errors->first('port','<span class="help-block">:message</span>') !!}
		</div>
		<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
			{!! Form::label('status', 'Status:'); !!}
			{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
			{!! $errors->first('status','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create new PFC', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection