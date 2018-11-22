@extends('adminlte::page')

@section('content')
	<h1>Create new branch</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['BranchController@store']]) !!}
		
		<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
			{!! Form::label('name', 'Name:'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
			{!! $errors->first('name','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
			{!! Form::label('address', 'Address:'); !!}
			{!! Form::text('address',null,['class'=>'form-control']); !!} 
			{!! $errors->first('address','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('city') ? 'has-error' :'' }}">
			{!! Form::label('city', 'City:'); !!}
			{!! Form::text('city',null,['class'=>'form-control']); !!}
			{!! $errors->first('city','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
			{!! Form::label('status', 'Status:'); !!}
			{!! Form::number('status',null,['class'=>'form-control']); !!} 
			{!! $errors->first('status','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create new branch', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection