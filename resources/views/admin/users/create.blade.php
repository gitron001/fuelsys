@extends('adminlte::page')

@section('content')
	<h1>Create new user</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['UserController@store']]) !!}
		
		<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
			{!! Form::label('name', 'Name:'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
			{!! $errors->first('name','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}">
			{!! Form::label('company_id', 'Company Id:'); !!}
			{!! Form::number('company_id',null,['class'=>'form-control']); !!} 
			{!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
			{!! Form::label('email', 'Email:'); !!}
			{!! Form::text('email',null,['class'=>'form-control']); !!}
			{!! $errors->first('email','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('branch_id') ? 'has-error' :'' }}">
			{!! Form::label('branch_id', 'Branch_Id:'); !!}
			{!! Form::select('branch_id',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!} 
			{!! $errors->first('branch_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('role') ? 'has-error' :'' }}">
			{!! Form::label('role', 'Role:'); !!}
			{!! Form::number('role',null,['class'=>'form-control']); !!}
			{!! $errors->first('role','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('one_time_limit') ? 'has-error' :'' }}">
			{!! Form::label('one_time_limit', 'One_Time_Limit:'); !!}
			{!! Form::number('one_time_limit',null,['class'=>'form-control']); !!}
			{!! $errors->first('one_time_limit','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('plates') ? 'has-error' :'' }}">
			{!! Form::label('plates', 'Plates:'); !!}
			{!! Form::text('plates',null,['class'=>'form-control']); !!}
			{!! $errors->first('plates','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('car_id') ? 'has-error' :'' }}">
			{!! Form::label('car_id', 'Car_Id:'); !!}
			{!! Form::number('car_id',null,['class'=>'form-control']); !!}
			{!! $errors->first('car_id','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
			{!! Form::label('status', 'Status:'); !!}
			{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
			{!! $errors->first('status','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Create new user', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection