<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($pos_payment) ? trans('adminlte::adminlte.pos_payment_details.create_new') : trans('adminlte::adminlte.pos_payment_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
					{!! Form::label('date', trans('adminlte::adminlte.date')); !!}
					@if(!isset($pos_payment))
						{!! Form::text('date',null,['class'=>'form-control','autocomplete'=>'off','id' => 'datetimepicker']); !!}
					@else
						<input type="text" id="datetimepickerF" value="{{ date('m/d/Y H:i:s', $pos_payment->date) }}" name="date" class="form-control" autocomplete="off">
					@endif
					{!! $errors->first('date','<span class="help-block">:message</span>') !!}
				</div>

			</div>

			<div class="col-md-6">

				<div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
					{!! Form::label('amount', trans('adminlte::adminlte.amount')); !!}
					{!! Form::number('amount',null,['class'=>'form-control','step'=>'any']); !!}
					{!! $errors->first('amount','<span class="help-block">:message</span>') !!}
				</div>
			</div>

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
					{!! Form::label('banks', trans('adminlte::adminlte.banks')); !!}
					{!! Form::select('banks',$banks,null,['class'=>'form-control']); !!}
					{!! $errors->first('banks','<span class="help-block">:message</span>') !!}
				</div>
            </div>
		</div>
	</div>


	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="payment-save-btn">
            <i class="fas fa-save"></i> {{ trans('adminlte::adminlte.save') }}
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> {{ trans('adminlte::adminlte.cancel') }} </a>
	</div>

</div>
