<div class="box box-primary">
    <div class="box-header with-border">
		<h3 class="box-title">{{!isset($user) ? trans('adminlte::adminlte.users_details.create_new') : trans('adminlte::adminlte.users_details.edit') }}</h3>
	</div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rfid') ? 'has-error' :'' }}">
                    {!! Form::label('rfid', trans('adminlte::adminlte.users_fields.rfid')); !!}
                    {!! Form::number('rfid',null,['class'=>'form-control']); !!}
                    {!! $errors->first('rfid','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                    {!! Form::label('name', trans('adminlte::adminlte.name')); !!}
                    {!! Form::text('name',null,['class'=>'form-control']); !!}
                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('surname') ? 'has-error' :'' }}">
                    {!! Form::label('surname', trans('adminlte::adminlte.surname')); !!}
                    {!! Form::text('surname',null,['class'=>'form-control']); !!}
                    {!! $errors->first('surname','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
                    {!! Form::label('status', trans('adminlte::adminlte.status')); !!}
                    {!! Form::select('status',[1=>'Active',2=>'No Active'],null,['class'=>'form-control']); !!}
                    {!! $errors->first('status','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
                    {!! Form::label('type', trans('adminlte::adminlte.type')); !!}
                    {!! Form::select('type',['' => 'Select', 1 => 'Staff',2=> 'Company',3=> 'Administrator', 4=>'Double Authorization', 9=>'Driver',10=>'Branch Manager',5=>'Manager',6=>'Bonus Member',7=>'Bonus Klient',8=>'Bonus Korporate'],null,['class'=>'form-control', 'id' => 'showHide']); !!}
                    {!! $errors->first('type','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company" style="display: none">
                    {!! Form::label('company_id', trans('adminlte::adminlte.company')); !!}
					{!! Form::select('company_id',['' => 'Select a Company'] + $companies,null,['class'=>'selectpicker form-control','id'=>'companyDropdown','data-live-search'=>'true','data-style'=>'btn-dropdownSelectNew']); !!}
                    {!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('has_limit') ? 'has-error' :'' }}">
                    {!! Form::label('has_limit', trans('adminlte::adminlte.users_fields.has_limit')); !!}
                    {!! Form::select('has_limit',[0=>'No',1=>'Yes',],null,['class'=>'form-control','id'=>'showHideLimits']); !!}
                    {!! $errors->first('status','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('one_time_limit') ? 'has-error' :'' }}" id="one_time_limit">
                    {!! Form::label('one_time_limit', trans('adminlte::adminlte.users_fields.one_time_limit')); !!}
                    {!! Form::number('one_time_limit',null,['class'=>'form-control', 'id'=> 'one_time_limit']); !!}
                    {!! $errors->first('one_time_limit','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('starting_balance') ? 'has-error' :'' }}" id="starting_balance" style="display: none">
                    {!! Form::label('starting_balance', trans('adminlte::adminlte.users_fields.starting_balance')); !!}
                    {!! Form::number('starting_balance',null,['class'=>'form-control']); !!}
                    {!! $errors->first('starting_balance','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group email_settings {{ $errors->has('on_transaction') ? 'has-error' :'' }}">
					{!! Form::label('on_transaction', trans('adminlte::adminlte.users_fields.on_transaction')); !!}
					{!! Form::select('on_transaction',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
					{!! $errors->first('on_transaction','<span class="help-block">:message</span>') !!}
				</div>

            </div>

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                    {!! Form::label('email', trans('adminlte::adminlte.email')); !!}
                    {!! Form::text('email',null,['class'=>'form-control']); !!}
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                    {!! Form::label('password', trans('adminlte::adminlte.password')); !!}
                    {!! Form::password('password',['class'=>'form-control','autocomplete'=>'new-password']); !!}
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('contact_number') ? 'has-error' :'' }}">
                    {!! Form::label('contact_number', trans('adminlte::adminlte.users_fields.contact_number')); !!}
                    {!! Form::text('contact_number',null,['class'=>'form-control']); !!}
                    {!! $errors->first('contact_number','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('application_date') ? 'has-error' :'' }}">
                    {!! Form::label('application_date', trans('adminlte::adminlte.users_fields.application_date')); !!}
                    {!! Form::text('application_date',null,['class'=>'form-control','autocomplete'=>'off','id'=>'datetimepicker']); !!}
                    {!! $errors->first('application_date','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('residence') ? 'has-error' :'' }}">
                    {!! Form::label('residence', trans('adminlte::adminlte.users_fields.residence')); !!}
                    {!! Form::text('residence',null,['class'=>'form-control']); !!}
                    {!! $errors->first('residence','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('plates') ? 'has-error' :'' }}" id="plates">
                    {!! Form::label('plates', trans('adminlte::adminlte.users_fields.plates')); !!}
                    {!! Form::text('plates',null,['class'=>'form-control']); !!}
                    {!! $errors->first('plates','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('send_email') ? 'has-error' :'' }}">
                    {!! Form::label('send_email', trans('adminlte::adminlte.users_fields.send_email')); !!}
                    {!! Form::select('send_email',[0=>'No',1=>'Yes',],null,['class'=>'form-control','id' => 'showHideEmail']); !!}
                    {!! $errors->first('status','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('vehicle') ? 'has-error' :'' }}" id="vehicle" style="display: none">
                    {!! Form::label('vehicle', trans('adminlte::adminlte.users_fields.vehicle')); !!}
                    {!! Form::text('vehicle',null,['class'=>'form-control']); !!}
                    {!! $errors->first('vehicle','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('limits') ? 'has-error' :'' }}" id="has_limits" style="display: none">
                    {!! Form::label('limits', trans('adminlte::adminlte.users_fields.limit')); !!}
                    {!! Form::number('limits',null,['class'=>'form-control']); !!}
                    {!! $errors->first('limits','<span class="help-block">:message</span>') !!}
                </div>

            </div>
        </div>

        @if(!isset($user))

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
            {!! Form::label('discounts', trans('adminlte::adminlte.discounts')); !!}

            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div class="col-md-5">
                    <select name="product[]" class="form-control">
						<option value="">Choose Product</option>
						@foreach($products as $pr)
							<option value="{{ $pr->pfc_pr_id }}">{{ $pr->name }}</option>
						@endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    {!! Form::number('discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
                </div>
            </div>
        </div>
		<!--
        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
            {!! Form::label('limits', 'Limits:'); !!}

            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div class="col-md-5">
					<select name="branch[]" class="form-control">
						@foreach($branches as $branch)
							<option value="{{{-- $branch->id --}}}">{{{-- $branch->name --}}}</option>
						@endforeach
					</select>
                </div>
                <div class="col-md-6">
                    {!! Form::number('limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
                </div>
            </div>
            <br>
        </div>
		-->
        @else
        <!-- *** DISCOUNT *** -->
        {!! Form::label('discount', trans('adminlte::adminlte.discounts')); !!}
        <div class="form-group"  id="discounts">
        @if(count($rfid_discounts) > 0)

			@foreach($rfid_discounts as $rfid_discount)
                <div class="row" id="discount" style="margin-top: 10px;">
                    <input type="hidden" name="hidden_input_product[]" value="{{$rfid_discount->id}}">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-circle deleteDiscount"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteDiscount[]" value="{{$rfid_discount->id}}"></button>
                    </div>
                    <div class="col-md-5">
                        <select name="product[]" class="form-control">
							<option value="">Choose Product</option>
                            @foreach($products as $pr)
                                <option value="{{ $pr->pfc_pr_id }}" {{$rfid_discount->product_id == $pr->pfc_pr_id  ? 'selected' : ''}}>{{ $pr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('discount[]',$rfid_discount->discount,['class'=>'form-control','step'=>'any']); !!}
                    </div>
                </div>
			@endforeach
        @endif
		</div>
        <!-- *** END DISCOUNT *** -->

        <!-- *** NEW DISCOUNT *** -->

        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}">
        <div class="row">
            <div class="col-md-1">
                <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i> {{ trans('adminlte::adminlte.users_fields.add_discount') }}</button>
            </div>
        </div>
        <br>
        </div>

        <!-- *** END NEW LIMITS *** -->

        <!-- *** LIMITS *** -->
		<!--
        @if(count($rfid_limits) > 0)

        {!! Form::label('limit', 'Limit'); !!}
        @foreach($rfid_limits as $rfid_limit)
            <div class="form-group">

                <div class="row" id="limit">
                    <input type="hidden" name="hidden_input_branch[]" value="{{$rfid_limit->id}}">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-circle" id="deleteLimit"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteLimit[]" value="{{$rfid_limit->id}}"></button>
                    </div>
                    <div class="col-md-5">
                        <select name="branch[]" class="form-control">
                            @foreach($branches as $branch)
                                <option value="{{{-- $branch->id --}}}" {{{-- $rfid_limit->branch_id == $branch->id  ? 'selected' : ''--}}}>{{{--} $branch->name --}}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        {!! Form::number('limit[]',$rfid_limit->limit,['class'=>'form-control','step'=>'any']); !!}
                    </div>
                </div>

            </div>
        @endforeach

        @endif
		-->
        <!-- *** END LIMITS *** -->

        <!-- *** NEW LIMITS *** -->
		<!--
        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
        @if(count($rfid_limits) == 0)
            {!! Form::label('limits', 'New Limits:'); !!}
        @endif

        <div class="row">
            <div class="col-md-1">
                <button type="button" class="btn btn-success btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="col-md-5">
				<select name="branch[]" class="form-control">
					@foreach($branches as $branch)
						<option value="{{{-- $branch->id --}}}" {{{-- $rfid_limit->branch_id == $branch->id  ? 'selected' : '' --}}}>{{{-- $branch->name --}}}</option>
					@endforeach
				</select>
            </div>
            <div class="col-md-6">
                {!! Form::number('new_limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
            </div>
        </div>
        <br>
-->
        </div>
        @endif

    <div class="box-footer">
		<button type="submit" class="btn btn-primary">
			<i class="fas fa-save"></i> {{ trans('adminlte::adminlte.save') }}
		</button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> {{ trans('adminlte::adminlte.cancel') }} </a>
	</div>

</div>
