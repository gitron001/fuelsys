@extends('adminlte::page')

@section('content')
	<h1>Edit Product</h1>
		{!! Form::model($product,['method'=>'PATCH', 'action'=>['ProductController@update',$product->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('price', 'Price'); !!}
			{!! Form::number('price',null,['class'=>'form-control','step'=>'any']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('pfc_id', 'PFC'); !!}
			{!! Form::select('pfc_id',['Select PFC'] + $pfc,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('vat', 'Vat'); !!}
			{!! Form::number('vat',null,['class'=>'form-control','step'=>'any']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit Product', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection