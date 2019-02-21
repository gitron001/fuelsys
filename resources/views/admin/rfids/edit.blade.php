@extends('adminlte::page')

@section('content')
	<h1>Edit RFID</h1>
		{!! Form::model($rfid,['method'=>'PATCH', 'action'=>['RfidController@update',$rfid->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('rfid', 'RFID'); !!}
			{!! Form::text('rfid',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('rfid_name', 'RFID Name'); !!}
			{!! Form::text('rfid_name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('user_id', 'User'); !!}
			{!! Form::select('user_id',$users,null,['class'=>'form-control']); !!} 
		</div>
		
		<div class="form-group">
			{!! Form::label('company_id', 'Company'); !!}
			{!! Form::select('company_id',['Select a Company'] + $companies,null,['class'=>'form-control']); !!} 
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
			{!! Form::label('vehicle', 'Vehicle'); !!}
			{!! Form::text('vehicle',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit RFID', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection