<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($payment) ? 'Create new payment' : 'Edit payment'}}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
					{!! Form::label('date', 'Date:'); !!}
					@if(!isset($payment))
						{!! Form::text('date',null,['class'=>'form-control','autocomplete'=>'off','id' => 'datetimepicker']); !!}
					@else
						<input type="text" id="datetimepickerF" value="{{ date('m/d/Y H:i:s', $payment->date) }}" name="date" class="form-control" autocomplete="off">
					@endif
					{!! $errors->first('date','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('select') ? 'has-error' :'' }}">
					<label for="">Company / User: </label>
					<br>
					@if (!isset($payment))
					<label class="checkbox-inline" style="margin-top: 15px;"><input type="checkbox" class="check_class checkbox-select-all" name="checkbox"
						value="company" echo checked />Company</label>
					@endif

					@if (isset($payment))
					<label class="checkbox-inline" style="margin-top: 15px;"><input type="checkbox" class="check_class checkbox-select-all" name="checkbox"
						value="company" @if (isset($payment) && $payment->company_id != 0) echo checked @endif/>Company</label>
					@endif
					<label class="checkbox-inline" style="margin-top: 15px;"><input type="checkbox" class="check_class checkbox-select-all" name="checkbox"
						value="user" @if (isset($payment) && $payment->user_id != 0) echo checked @endif/>User</label>

				</div>

				<div class="form-group">
                    {!! Form::label('type', 'Type:'); !!}
					{!! Form::select('type',[''=>'Choose type','1'=>'Pagese','2'=>'Hyrje'],null,['class'=>'form-control']); !!}
					{!! $errors->first('type','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('print') ? 'has-error' :'' }}">
                    <label for="print">Print the bill: </label>
                    <br>
                    @if (!isset($payment))
                        <input type="radio" name="print" value="1"> Yes &nbsp;
                        <input type="radio" name="print" value="0" checked> No<br>
                    @else
                        <input type="radio" name="print" value="1" @if (isset($payment) && $payment->print == 1) checked @endif> Yes &nbsp;
                        <input type="radio" name="print" value="0" @if (isset($payment) && $payment->print == 0) checked @endif> No<br>
                    @endif
                </div>


			</div>

			<div class="col-md-6">

				<div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
					{!! Form::label('amount', 'Amount:'); !!}
					{!! Form::number('amount',null,['class'=>'form-control','step'=>'any']); !!}
					{!! $errors->first('amount','<span class="help-block">:message</span>') !!}
				</div>

				@if(!isset($payment))
					<div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company">
				@else
					<div class="form-group" id="company" @if ($payment->company_id == 0) echo style="display: none" @endif>
				@endif
					{!! Form::label('company_id', 'Company:'); !!}
					{!! Form::select('company_id',['' => 'Select a Company'] + $companies,null,['class'=>'selectpicker form-control','id'=>'companyDropdown','data-live-search'=>'true','data-style'=>'btn-dropdownSelectNew']); !!}
					{!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
				</div>

				@if(!isset($payment))
					<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}" id="user" style="display: none">
				@else
					<div class="form-group" id="user" @if ($payment->user_id == 0) echo style="display: none" @endif>
				@endif
					{!! Form::label('user_id', 'User:'); !!}
					{!! Form::select('user_id',['' => 'Select a User'] + $users,null,['class'=>'selectpicker form-control','id'=>'userDropdown','data-live-search'=>'true','data-style'=>'btn-dropdownSelectNew']); !!}
					{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
				</div>

				@if(count($branches) > 0)
				<div class="form-group">
                    {!! Form::label('branch_id', 'Branch:'); !!}
					{!! Form::select('branch_id',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!}
					{!! $errors->first('branch_id','<span class="help-block">:message</span>') !!}
				</div>
                @endif

			</div>
		</div>
		<div class="col-12">
            <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                {!! Form::label('description', 'Description:'); !!}
                {!! Form::textarea('description',null,['class'=>'form-control','rows' => 3]); !!}
                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
            </div>
        </div>
	</div>


	<div class="box-footer">
		<button type="submit" class="btn btn-primary" id="payment-save-btn">
            <i class="fas fa-save"></i> Save
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> Cancel </a>
	</div>

</div>
