<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($pfc) ? trans('adminlte::adminlte.pfc_details.create_new') : trans('adminlte::adminlte.pfc_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', trans('adminlte::adminlte.name')); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('ip') ? 'has-error' :'' }}">
					{!! Form::label('ip', trans('adminlte::adminlte.ip')); !!}
					{!! Form::text('ip',null,['class'=>'form-control']); !!}
					{!! $errors->first('ip','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('port') ? 'has-error' :'' }}">
					{!! Form::label('port', trans('adminlte::adminlte.port')); !!}
					{!! Form::number('port',null,['class'=>'form-control']); !!}
					{!! $errors->first('port','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
					{!! Form::label('status', trans('adminlte::adminlte.status')); !!}
					{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>
			</div>
		</div>
	</div>

	<div class="box-footer">
		<button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> {{ trans('adminlte::adminlte.save') }}
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> {{ trans('adminlte::adminlte.cancel') }} </a>
	</div>

</div>
