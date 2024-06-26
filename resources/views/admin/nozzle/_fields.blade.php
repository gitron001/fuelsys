<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ !isset($pump) ? trans('adminlte::adminlte.nozzle_details.create_new') : trans('adminlte::adminlte.nozzle_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('name','Name:'); !!}
					{!! Form::text('name',null,['class'=>'form-control', 'disabled' => 'disabled']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('tank_id') ? 'has-error' : '' }}">
					{!! Form::label('tank_id','Tank:'); !!}
					{!! Form::select('tank_id',['' => 'Choose Tank'] + $tanks,null,['class'=>'form-control']); !!}
					{!! $errors->first('tank_id','<span class="help-block">:message</span>') !!}
				</div>
				<div class="form-group {{ $errors->has('dispaneser_id') ? 'has-error' : '' }}">
					{!! Form::label('starting_totalizer','Starting Totalizer:'); !!}
					{!! Form::text('starting_totalizer',null,['class'=>'form-control', 'disabled' => 'disabled']); !!}
                </div>
			</div>
			<div class="col-md-6">
                <div class="form-group {{ $errors->has('dispaneser_id') ? 'has-error' : '' }}">
					{!! Form::label('channel_id','Dispaneser:'); !!}
					{!! Form::select('channel_id',['' => 'Choose Dispaneser'] + $dispanesers,null,['class'=>'form-control']); !!}
					{!! $errors->first('channel_id','<span class="help-block">:message</span>') !!}
                </div>

				<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					{!! Form::label('status','Status:'); !!}
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
