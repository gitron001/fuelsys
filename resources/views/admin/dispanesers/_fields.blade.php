@extends('adminlte::page')

@section('content')
	<h1>{{!isset($dispaneser) ? 'Create new dispaneser' : 'Edit dispaneser'}}</h1>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', 'Name:'); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!} 
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('pfc_id') ? 'has-error' :'' }}">
					{!! Form::label('pfc_id', 'PFC:'); !!}
					{!! Form::select('pfc_id',['Choose PFC'] + $pfc,null,['class'=>'form-control']); !!} 
					{!! $errors->first('pfc_id','<span class="help-block">:message</span>') !!}
				</div>
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit((!isset($dispaneser) ? 'Create new dispaneser' : 'Edit dispaneser'), ['class'=>'btn btn-block btn-success']); !!}
		</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection