<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ !isset($product_group) ? 'Create new product group' : 'Edit product group'}}</h3>
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
				<div class="form-group {{ $errors->has('state_code') ? 'has-error' :'' }}">
					{!! Form::label('state_code', 'State Code:'); !!}
					{!! Form::number('state_code',null,['class'=>'form-control']); !!}
					{!! $errors->first('state_code','<span class="help-block">:message</span>') !!}
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

