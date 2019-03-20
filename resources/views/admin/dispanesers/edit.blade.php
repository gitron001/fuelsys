@extends('adminlte::page')

@section('content')
	<h1>Edit Dispaneser</h1>
		{!! Form::model($dispaneser,['method'=>'PATCH', 'action'=>['DispaneserController@update',$dispaneser->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('pfc_id', 'PFC'); !!}
			{!! Form::select('pfc_id',['Select PFC'] + $pfc,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit Dispaneser', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection