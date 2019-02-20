@extends('adminlte::page')

@section('content')
	<h1>Create new product</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['ProductController@store']]) !!}
		
		<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
			{!! Form::label('name', 'Name:'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
			{!! $errors->first('name','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('price') ? 'has-error' :'' }}">
			{!! Form::label('price', 'Price:'); !!}
			{!! Form::number('price',null,['class'=>'form-control','step'=>'any']); !!} 
			{!! $errors->first('price','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('vat') ? 'has-error' :'' }}">
			{!! Form::label('vat', 'Vat:'); !!}
			{!! Form::number('vat',null,['class'=>'form-control','step'=>'any']); !!}
			{!! $errors->first('vat','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Create new product', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection