@extends('adminlte::page')

@section('content')
	<h1>Edit User</h1>
		{!! Form::model($user,['method'=>'PATCH', 'action'=>['UserController@update',$user->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email'); !!}
			{!! Form::text('email',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('branch_id', 'Branch'); !!}
			{!! Form::select('branch_id',$branch,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Role'); !!}
			{!! Form::select('role_id',$role,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('status', 'Status'); !!}
			{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit User', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection