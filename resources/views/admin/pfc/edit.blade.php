@extends('adminlte::page')

@section('content')
	<h1>Edit PFC</h1>
		{!! Form::model($pfc,['method'=>'PATCH', 'action'=>['PFCController@update',$pfc->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('ip', 'IP'); !!}
			{!! Form::text('ip',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('port', 'Port'); !!}
			{!! Form::number('port',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit PFC', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
