<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ !isset($product_group) ? trans('adminlte::adminlte.banks_details.create_new') : trans('adminlte::adminlte.banks_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', trans('adminlte::adminlte.name')); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

                <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
					{!! Form::label('status', trans('adminlte::adminlte.status')); !!}
					{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('bank_number') ? 'has-error' :'' }}">
					{!! Form::label('bank_number', trans('adminlte::adminlte.bank_number')); !!}
					{!! Form::number('bank_number',null,['class'=>'form-control']); !!}
					{!! $errors->first('bank_number','<span class="help-block">:message</span>') !!}
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

