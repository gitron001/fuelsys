<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ !isset($tank) ? 'Create new tank' : 'Edit tank'}}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('name','Name:'); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
					{!! Form::label('product_id','Product:'); !!}
					{!! Form::select('product_id',['Choose Product'] + $products,null,['class'=>'form-control']); !!}
					{!! $errors->first('product_id','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('capacity') ? 'has-error' : '' }}">
					{!! Form::label('capacity','Capacity:'); !!}
					{!! Form::number('capacity',null,['class'=>'form-control']); !!}
					{!! $errors->first('capacity','<span class="help-block">:message</span>') !!}
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
			<i class="fas fa-save"></i> Save
		</button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> Cancel </a>
	</div>

</div>
