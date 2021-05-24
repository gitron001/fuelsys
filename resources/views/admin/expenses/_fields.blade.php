<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($expenses) ? 'Create new expense' : 'Edit expense'}}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
					{!! Form::label('date', 'Date:'); !!}
					@if(!isset($expenses))
						{!! Form::text('date',null,['class'=>'form-control','autocomplete'=>'off','id' => 'datetimepicker']); !!}
					@else
						<input type="text" id="datetimepickerF" value="{{ date('m/d/Y H:i:s', $expenses->date) }}" name="date" class="form-control" autocomplete="off">
					@endif
					{!! $errors->first('date','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
					{!! Form::label('amount', 'Amount:'); !!}
					{!! Form::number('amount',null,['class'=>'form-control','step'=>'any']); !!}
					{!! $errors->first('amount','<span class="help-block">:message</span>') !!}
				</div>
			</div>
		</div>
		<div class="col-12">
            @if(!isset($expenses))
					<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
				@else
					<div class="form-group" id="user">
				@endif
					{!! Form::label('user_id', 'User:'); !!}
					{!! Form::select('user_id',['' => 'Select a User'] + $users,null,['class'=>'selectpicker form-control','id'=>'userDropdown','data-live-search'=>'true','data-style'=>'btn-dropdownSelectNew']); !!}
					{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
				</div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                {!! Form::label('description', 'Description:'); !!}
                {!! Form::textarea('description',null,['class'=>'form-control','rows' => 3]); !!}
                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
            </div>
        </div>
	</div>


	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="expenses-save-btn">
            <i class="fas fa-save"></i> Save
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> Cancel </a>
	</div>

</div>
