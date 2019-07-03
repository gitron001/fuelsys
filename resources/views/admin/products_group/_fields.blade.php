@extends('adminlte::page')

@section('content')
	<h1>Create new product group</h1>
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
				{!! Form::label('name', 'Name:'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!} 
				{!! $errors->first('name','<span class="help-block">:message</span>') !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('state_code') ? 'has-error' :'' }}">
				{!! Form::label('state_code', 'State Code:'); !!}
				{!! Form::number('state_code',null,['class'=>'form-control']); !!} 
				{!! $errors->first('state_code','<span class="help-block">:message</span>') !!}
			</div>
		</div>

	</div>

	<div class="form-group">
		{!! Form::submit('Create new product group', ['class'=>'btn btn-block btn-success']); !!}
	</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection