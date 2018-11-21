@extends('adminlte::page')

@section('content')
	<h1>Edit User</h1>
		{!! Form::model($user,['method'=>'PATCH', 'action'=>['UserController@update',$user->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('company_id', 'Company_Id'); !!}
			{!! Form::text('company_id',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email'); !!}
			{!! Form::text('email',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('b_id', 'B_Id'); !!}
			{!! Form::text('b_id',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('role', 'Role'); !!}
			{!! Form::text('role',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('one_time_limit', 'One_Time_Limit'); !!}
			{!! Form::text('one_time_limit',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('plates', 'Plates'); !!}
			{!! Form::text('plates',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('car_id', 'Car_Id'); !!}
			{!! Form::text('car_id',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('status', 'Status'); !!}
			{!! Form::text('status',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit User', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection