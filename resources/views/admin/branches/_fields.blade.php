<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($branch) ? 'Create new branch' : 'Edit branch'}}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', 'Name:'); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
					{!! Form::label('address', 'Address:'); !!}
					{!! Form::text('address',null,['class'=>'form-control']); !!}
					{!! $errors->first('address','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('city') ? 'has-error' :'' }}">
					{!! Form::label('city', 'City:'); !!}
					{!! Form::text('city',null,['class'=>'form-control']); !!}
					{!! $errors->first('city','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
					{!! Form::label('status', 'Status:'); !!}
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
