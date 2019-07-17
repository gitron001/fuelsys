@extends('adminlte::page')

@section('content')
	<h1>{{ !isset($tank) ? 'Create new tank' : 'Edit tank'}}</h1>
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				{!! Form::label('name','Name:'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!}
				{!! $errors->first('name','<span class="help-block">:message</span>') !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
				{!! Form::label('product_id','Product:'); !!}
				{!! Form::select('product_id',['Choose Product'] + $products,null,['class'=>'form-control']); !!}
				{!! $errors->first('product_id','<span class="help-block">:message</span>') !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('capacity') ? 'has-error' : '' }}">
				{!! Form::label('capacity','Capacity:'); !!}
				{!! Form::number('capacity',null,['class'=>'form-control']); !!}
				{!! $errors->first('capacity','<span class="help-block">:message</span>') !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
				{!! Form::label('status','Status:'); !!}
				{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
				{!! $errors->first('status','<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::submit((!isset($tank) ? 'Create new tank' : 'Edit tank'), ['class'=>'btn btn-block btn-success']); !!}
	</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection