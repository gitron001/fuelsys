@extends('adminlte::page')

@section('content')
	<h1>{{!isset($branch) ? 'Create new branch' : 'Edit branch'}}</h1>
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
				{!! Form::label('name', 'Name:'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!} 
				{!! $errors->first('name','<span class="help-block">:message</span>') !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
				{!! Form::label('address', 'Address:'); !!}
				{!! Form::text('address',null,['class'=>'form-control']); !!} 
				{!! $errors->first('address','<span class="help-block">:message</span>') !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('city') ? 'has-error' :'' }}">
				{!! Form::label('city', 'City:'); !!}
				{!! Form::text('city',null,['class'=>'form-control']); !!}
				{!! $errors->first('city','<span class="help-block">:message</span>') !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
				{!! Form::label('status', 'Status:'); !!}
				{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!} 
				{!! $errors->first('status','<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::submit((!isset($branch) ? 'Create new branch' : 'Edit branch'), ['class'=>'btn btn-block btn-success']); !!}
	</div>


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection