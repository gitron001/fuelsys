@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($dispaneser) ? 'Create new dispaneser' : 'Edit dispaneser'}}</h3>
	</div>

	<div class="box-body">
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
	</div>

	<div class="box-footer">
		<button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Save
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> Cancel </a>
	</div>

</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
