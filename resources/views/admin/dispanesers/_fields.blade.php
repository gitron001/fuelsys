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
				<div class="form-group {{ $errors->has('price_division') ? 'has-error' :'' }}">
					{!! Form::label('price_division', 'Price Division:'); !!}
					{!! Form::select('price_division',[1=>'1', 10=>'10',100=>'100',1000=>'1000',10000=>'10000'],null,['class'=>'form-control']); !!}
					{!! $errors->first('price_division','<span class="help-block">:message</span>') !!}
				</div>
				<div class="form-group {{ $errors->has('price_division') ? 'has-error' :'' }}">
					{!! Form::label('lit_division', 'Liter Division:'); !!}
					{!! Form::select('lit_division',[1=>'1', 10=>'10',100=>'100',1000=>'1000',10000=>'10000'],null,['class'=>'form-control']); !!}
					{!! $errors->first('lit_division','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('pfc_id') ? 'has-error' :'' }}">
					{!! Form::label('pfc_id', 'PFC:'); !!}
					{!! Form::select('pfc_id',['Choose PFC'] + $pfc,null,['class'=>'form-control']); !!}
					{!! $errors->first('pfc_id','<span class="help-block">:message</span>') !!}
				</div>			
				<div class="form-group {{ $errors->has('money_division') ? 'has-error' :'' }}">
					{!! Form::label('money_division', 'Money Division:'); !!}
					{!! Form::select('money_division',[1=>'1', 10=>'10',100=>'100',1000=>'1000',10000=>'10000'],null,['class'=>'form-control']); !!}
					{!! $errors->first('money_division','<span class="help-block">:message</span>') !!}
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

