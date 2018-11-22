@extends('adminlte::page')

@section('content')
	<h1>Edit Branch</h1>
		{!! Form::model($branch,['method'=>'PATCH', 'action'=>['BranchController@update',$branch->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('address', 'Address'); !!}
			{!! Form::text('address',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('city', 'City'); !!}
			{!! Form::text('city',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('status', 'Status'); !!}
			{!! Form::text('status',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit Branch', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection