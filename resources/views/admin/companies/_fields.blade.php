<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($company) ? trans('adminlte::adminlte.company_details.create_new') : trans('adminlte::adminlte.company_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', trans('adminlte::adminlte.name')); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('fis_number') ? 'has-error' :'' }}">
					{!! Form::label('fis_number', trans('adminlte::adminlte.fis_number')); !!}
					{!! Form::number('fis_number',null,['class'=>'form-control']); !!}
					{!! $errors->first('fis_number','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('bis_number') ? 'has-error' :'' }}">
					{!! Form::label('bis_number', trans('adminlte::adminlte.bis_number')); !!}
					{!! Form::number('bis_number',null,['class'=>'form-control']); !!}
					{!! $errors->first('bis_number','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('contact_person') ? 'has-error' :'' }}">
					{!! Form::label('contact_person', trans('adminlte::adminlte.contact_person')); !!}
					{!! Form::text('contact_person',null,['class'=>'form-control']); !!}
					{!! $errors->first('contact_person','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('tax_number') ? 'has-error' :'' }}">
					{!! Form::label('tax_number', trans('adminlte::adminlte.tax_number')); !!}
					{!! Form::number('tax_number',null,['class'=>'form-control']); !!}
					{!! $errors->first('tax_number','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('res_number') ? 'has-error' :'' }}">
					{!! Form::label('res_number', trans('adminlte::adminlte.res_number')); !!}
					{!! Form::number('res_number',null,['class'=>'form-control']); !!}
					{!! $errors->first('res_number','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('tel_number') ? 'has-error' :'' }}">
					{!! Form::label('tel_number', trans('adminlte::adminlte.tel_number')); !!}
					{!! Form::number('tel_number',null,['class'=>'form-control']); !!}
					{!! $errors->first('tel_number','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('limits') ? 'has-error' :'' }}" id="has_limits" style="display: none">
					{!! Form::label('limits', trans('adminlte::adminlte.limits')); !!}
					{!! Form::number('limits',null,['class'=>'form-control']); !!}
					{!! $errors->first('limits','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
					{!! Form::label('email', trans('adminlte::adminlte.email')); !!}
					{!! Form::text('email',null,['class'=>'form-control']); !!}
					{!! $errors->first('email','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group email_settings {{ $errors->has('on_transaction') ? 'has-error' :'' }}">
					{!! Form::label('on_transaction', trans('adminlte::adminlte.company_fields.on_transaction')); !!}
					{!! Form::select('on_transaction',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
					{!! $errors->first('on_transaction','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group email_settings {{ $errors->has('monthly_report') ? 'has-error' :'' }}">
					{!! Form::label('monthly_report', trans('adminlte::adminlte.company_fields.monthly_report')); !!}
					{!! Form::select('monthly_report',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
					{!! $errors->first('monthly_report','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group">
					{!! Form::label('photo', trans('adminlte::adminlte.photo')); !!}
						@if (isset($company) && $company->images)
							<br>
							<img class="img-responsive img-thumbnail" src="{{asset('/images/company/'.$company->images)}}" height="100" width="100">
						@endif
					{!! Form::file('image',['class'=>'form-control']); !!}
				</div>

			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
					{!! Form::label('address', trans('adminlte::adminlte.address')); !!}
					{!! Form::text('address',null,['class'=>'form-control']); !!}
					{!! $errors->first('address','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('city') ? 'has-error' :'' }}">
					{!! Form::label('city', trans('adminlte::adminlte.city')); !!}
					{!! Form::text('city',null,['class'=>'form-control']); !!}
					{!! $errors->first('city','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('country') ? 'has-error' :'' }}">
					{!! Form::label('country', trans('adminlte::adminlte.country')); !!}
					{!! Form::text('country',null,['class'=>'form-control']); !!}
					{!! $errors->first('country','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
					{!! Form::label('status', trans('adminlte::adminlte.status')); !!}
					{!! Form::select('status',[1=>'Active',2=>'No Active',],null,['class'=>'form-control']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('has_receipt') ? 'has-error' :'' }}">
					{!! Form::label('has_receipt', trans('adminlte::adminlte.company_fields.has_receipt')); !!}
					{!! Form::select('has_receipt',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('has_receipt_nr') ? 'has-error' :'' }}">
					{!! Form::label('has_receipt_nr', trans('adminlte::adminlte.company_fields.has_receipt_number')); !!}
					{!! Form::select('has_receipt_nr',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('has_limit') ? 'has-error' :'' }}">
					{!! Form::label('has_limit', trans('adminlte::adminlte.company_fields.has_limit')); !!}
					{!! Form::select('has_limit',[0=>'NO',1=>'YES'],null,['class'=>'form-control','id' => 'showHide']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('starting_balance') ? 'has-error' :'' }}" id="starting_balance" style="display: none">
					{!! Form::label('starting_balance', trans('adminlte::adminlte.company_fields.starting_balance')); !!}
					{!! Form::number('starting_balance',null,['class'=>'form-control']); !!}
					{!! $errors->first('starting_balance','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('send_email') ? 'has-error' :'' }}">
					{!! Form::label('send_email', trans('adminlte::adminlte.company_fields.send_email')); !!}
					{!! Form::select('send_email',[0=>'NO',1=>'YES'],null,['class'=>'form-control','id' => 'showHideEmail']); !!}
					{!! $errors->first('send_email','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group email_settings {{ $errors->has('daily_at') ? 'has-error' :'' }}">
					{!! Form::label('daily_at', trans('adminlte::adminlte.company_fields.daily_at')); !!}
					{!! Form::select('daily_at',[0=>'NO', 24=>'00:00',1=>'01:00',2=>'02:00',3=>'03:00',4=>'04:00',5=>'05:00',6=>'06:00',7=>'07:00',8=>'08:00',9=>'09:00',10=>'10:00',11=>'11:00',12=>'12:00',13=>'13:00'
					,14=>'14:00',15=>'15:00',16=>'16:00',17=>'17:00',18=>'18:00',19=>'19:00',20=>'20:00',21=>'21:00',22=>'22:00',23=>'23:00'],null,['class'=>'form-control']); !!}
					{!! $errors->first('daily_at','<span class="help-block">:message</span>') !!}
				</div>

			</div>
		</div>

	@if(!isset($company))
	<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
		{!! Form::label('discounts', trans('adminlte::adminlte.discounts')); !!}

		<div class="row">
			<div class="col-md-1">
				<button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
			</div>
			<div class="col-md-5">
				{!! Form::select('product[]',['Choose Product'] + $products,null,['class'=>'form-control']); !!}
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
				{!! Form::select('branch[]',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!}
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
	{!! Form::label('discount', 'Discounts'); !!}
    <div class="form-group"  id="discounts">
	@if(count($company_discounts) > 0)

		@foreach($company_discounts as $company_discount)
			<div class="row" id="discount" style="margin-top: 10px;">
				<input type="hidden" name="hidden_input_product[]" value="{{$company_discount->id}}">
				<div class="col-md-1">
					<button type="button" class="btn btn-danger btn-circle" id="deleteDiscount"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteDiscount[]" value="{{$company_discount->id}}"></button>
				</div>
				<div class="col-md-5">
					<select name="product[]" class="form-control">
						@foreach($products as $product_id => $product_name)
							<option value="{{ $product_id }}" {{$company_discount->product_id == $product_id  ? 'selected' : ''}}>{{ $product_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6">
					{!! Form::text('discount[]',$company_discount->discount,['class'=>'form-control','step'=>'any']); !!}
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
				<button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i> Add discount</button>
			</div>
		</div>
	</div>

	<!-- *** END NEW LIMITS *** -->

	<!-- *** LIMITS *** -->
    <!--
	@if(count($company_limits) > 0)

		{!! Form::label('limit', 'Limit'); !!}
		@foreach($company_limits as $company_limit)
			<div class="form-group" id="addlimits">

				<div class="row" id="limit">
					<input type="hidden" name="hidden_input_branch[]" value="{{$company_limit->id}}">
					<div class="col-md-1">
						<button type="button" class="btn btn-danger btn-circle" id="deleteLimit"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteLimit[]" value="{{$company_limit->id}}"></button>
					</div>
					<div class="col-md-5">
						<select name="branch[]" class="form-control">
							@foreach($branches as $branch_id => $branch_name)
								<option value="{{{-- $branch_id --}}}" {{{-- $company_limit->branch_id == $branch_id  ? 'selected' : '' --}}}>{{{-- $branch_name --}}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						{!! Form::number('limit[]',$company_limit->limit,['class'=>'form-control','step'=>'any']); !!}
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
		@if(count($company_limits) == 0)
			{!! Form::label('limits', 'New Limits:'); !!}
		@endif

		<div class="row">
			<div class="col-md-1">
				<button type="button" class="btn btn-success btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
			</div>
			<div class="col-md-5">
				{!! Form::select('new_branch[]',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!}
			</div>
			<div class="col-md-6">
				{!! Form::number('new_limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
			</div>
		</div>
		<br>

	</div>
	-->
	<!-- *** END NEW LIMITS *** -->
	@endif
	</div>


	<!-- *** END NEW LIMITS *** -->
	<div class="box-footer">
		<button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> {{ trans('adminlte::adminlte.save') }}
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> {{ trans('adminlte::adminlte.cancel') }} </a>
	</div>


</div>
