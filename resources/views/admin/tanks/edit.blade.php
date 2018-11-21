@extends('adminlte::page')

@section('content')
	<h1>Edit Tank</h1>
	{!! Form::model($tank,['method'=>'PATCH','action'=>['TankController@update',$tank->id]]) !!}
	
	<div class="form-group">
		{!! Form::label('name', 'Name'); !!}
		{!! Form::text('name',null,['class'=>'form-control']); !!} 
	</div>

	<div class="form-group">
		{!! Form::label('product_id', 'Product_Id'); !!}
		{!! Form::text('product_id',null,['class'=>'form-control']); !!} 
	</div>	

	<div class="form-group">
		{!! Form::label('capacity', 'Capacity'); !!}
		{!! Form::text('capacity',null,['class'=>'form-control']); !!} 
	</div>

	<div class="form-group">
		{!! Form::label('status', 'Status'); !!}
		{!! Form::text('status',null,['class'=>'form-control']); !!} 
	</div>

	<div class="form-group">
		{!! Form::submit('Edit Tank', ['class'=>'btn btn-block btn-primary']); !!}
	</div>

	{!! Form::close() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection