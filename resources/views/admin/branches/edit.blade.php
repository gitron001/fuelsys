@extends('adminlte::page')

@section('content')
	<h1>Edit Branch</h1>
	{!! Form::model($branch,['method'=>'PATCH', 'action'=>['BranchController@update',$branch->id]]) !!}
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('name', 'Name'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!} 
			</div>
		</div>	

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('address', 'Address'); !!}
				{!! Form::text('address',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('city', 'City'); !!}
				{!! Form::text('city',null,['class'=>'form-control']); !!} 
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
		{!! Form::submit('Edit Branch', ['class'=>'btn btn-block btn-primary']); !!}
	</div>

	{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection