<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ !isset($product_group) ? trans('adminlte::adminlte.product_group_details.create_new') : trans('adminlte::adminlte.product_group_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', trans('adminlte::adminlte.name')); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('state_code') ? 'has-error' :'' }}">
					{!! Form::label('state_code', trans('adminlte::adminlte.state_code')); !!}
					{!! Form::number('state_code',null,['class'=>'form-control']); !!}
					{!! $errors->first('state_code','<span class="help-block">:message</span>') !!}
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

