<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ !isset($product) ? trans('adminlte::adminlte.product_details.create_new') : trans('adminlte::adminlte.product_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', trans('adminlte::adminlte.name')); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('price') ? 'has-error' :'' }}">
					{!! Form::label('price', trans('adminlte::adminlte.price')); !!}
					{!! Form::number('price',null,['class'=>'form-control','step'=>'any']); !!}
					{!! $errors->first('price','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
					{!! Form::label('product_group', trans('adminlte::adminlte.product_group')); !!}
					{!! Form::select('product_group_id',['Select product group'] + $product_group,null,['class'=>'form-control','id'=>'user']); !!}
					{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('pfc_id') ? 'has-error' :'' }}">
					{!! Form::label('pfc_id', trans('adminlte::adminlte.pfc')); !!}
					{!! Form::select('pfc_id',['' => 'Choose PFC'] + $pfc,null,['class'=>'form-control']); !!}
					{!! $errors->first('pfc_id','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('vat') ? 'has-error' :'' }}">
					{!! Form::label('vat', trans('adminlte::adminlte.vat')); !!}
					{!! Form::number('vat',null,['class'=>'form-control','step'=>'any']); !!}
					{!! $errors->first('vat','<span class="help-block">:message</span>') !!}
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
