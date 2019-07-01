@extends('adminlte::page')

@section('content')
	<h1>Edit PFC</h1>
	{!! Form::model($pfc,['method'=>'PATCH', 'action'=>['PFCController@update',$pfc->id]]) !!}
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('name', 'Name'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('ip', 'IP'); !!}
				{!! Form::text('ip',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('port', 'Port'); !!}
				{!! Form::number('port',null,['class'=>'form-control']); !!} 
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
		{!! Form::submit('Edit PFC', ['class'=>'btn btn-block btn-primary']); !!}
	</div>

	{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
