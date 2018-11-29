@extends('adminlte::page')

@section('content')
	<h1>Edit RFID</h1>
		{!! Form::model($rfid,['method'=>'PATCH', 'action'=>['RfidController@update',$rfid->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('ffid', 'FFID'); !!}
			{!! Form::text('ffid',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('user_id', 'User_id'); !!}
			{!! Form::select('user_id',$users,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit RFID', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection