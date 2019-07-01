@extends('adminlte::page')

@section('content')
	<h1>Edit Tank</h1>
	{!! Form::model($tank,['method'=>'PATCH','action'=>['TankController@update',$tank->id]]) !!}
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('name', 'Name'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('product_id', 'Product_Id'); !!}
				{!! Form::select('product_id',$products,null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('capacity', 'Capacity'); !!}
				{!! Form::text('capacity',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('status', 'Status'); !!}
				{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!} 
			</div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::submit('Edit Tank', ['class'=>'btn btn-block btn-primary']); !!}
	</div>

	{!! Form::close() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection