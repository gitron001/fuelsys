<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ !isset($tank) ? trans('adminlte::adminlte.tank_details.create_new') : trans('adminlte::adminlte.tank_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('name',trans('adminlte::adminlte.name')); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
					{!! Form::label('product_id',trans('adminlte::adminlte.product')); !!}
					{!! Form::select('product_id',['' => 'Choose Product'] + $products,null,['class'=>'form-control']); !!}
					{!! $errors->first('product_id','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('high_level_water') ? 'has-error' : '' }}">
					{!! Form::label('high_level_water',trans('adminlte::adminlte.tank_details.high_level_water')); !!}
					{!! Form::number('high_level_water',isset($tank) ? null : 7,['class'=>'form-control']); !!}
					{!! $errors->first('high_level_water','<span class="help-block">:message</span>') !!}
				</div>

                <div class="form-group">
                    <label>{{ trans('adminlte::adminlte.tank_fields.excel_file') }}</label>
                    <input type="file" name="excel_file">
                    @if(isset($excel_file))<i class="fa fa-file-excel" aria-hidden="true"></i>@endif
                </div>

			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('capacity') ? 'has-error' : '' }}">
					{!! Form::label('capacity',trans('adminlte::adminlte.capacity')); !!}
					{!! Form::number('capacity',null,['class'=>'form-control']); !!}
					{!! $errors->first('capacity','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					{!! Form::label('status',trans('adminlte::adminlte.status')); !!}
					{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>

                <div class="form-group {{ $errors->has('alarm_email_water_level') ? 'has-error' : '' }}">
					{!! Form::label('alarm_email_water_level',trans('adminlte::adminlte.tank_details.alarm_email_water_level')); !!}
					{!! Form::select('alarm_email_water_level',[0=>'No',1=>'Yes'],null,['class'=>'form-control']); !!}
					{!! $errors->first('alarm_email_water_level','<span class="help-block">:message</span>') !!}
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
