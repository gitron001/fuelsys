@extends('adminlte::page')

@section('content')
	<h1>Create new company</h1>

	{!! Form::open(['method'=>'POST', 'action'=>['CompaniesController@store']]) !!}

	<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
		{!! Form::label('name', 'Name:'); !!}
		{!! Form::text('name',null,['class'=>'form-control']); !!}
		{!! $errors->first('name','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('fis_number') ? 'has-error' :'' }}">
		{!! Form::label('fis_number', 'Fis.Number:'); !!}
		{!! Form::number('fis_number',null,['class'=>'form-control']); !!}
		{!! $errors->first('fis_number','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('bis_number') ? 'has-error' :'' }}">
		{!! Form::label('bis_number', 'Bis.Number:'); !!}
		{!! Form::number('bis_number',null,['class'=>'form-control']); !!}
		{!! $errors->first('bis_number','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('contact_person') ? 'has-error' :'' }}">
		{!! Form::label('contact_person', 'Contact Person:'); !!}
		{!! Form::text('contact_person',null,['class'=>'form-control']); !!}
		{!! $errors->first('contact_person','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('tax_number') ? 'has-error' :'' }}">
		{!! Form::label('tax_number', 'Tax.Number:'); !!}
		{!! Form::number('tax_number',null,['class'=>'form-control']); !!}
		{!! $errors->first('tax_number','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('res_number') ? 'has-error' :'' }}">
		{!! Form::label('res_number', 'Res.Number:'); !!}
		{!! Form::number('res_number',null,['class'=>'form-control']); !!}
		{!! $errors->first('res_number','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('tel_number') ? 'has-error' :'' }}">
		{!! Form::label('tel_number', 'Tel.Number:'); !!}
		{!! Form::number('tel_number',null,['class'=>'form-control']); !!}
		{!! $errors->first('tel_number','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
		{!! Form::label('email', 'Email:'); !!}
		{!! Form::text('email',null,['class'=>'form-control']); !!}
		{!! $errors->first('email','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
		{!! Form::label('address', 'Address:'); !!}
		{!! Form::text('address',null,['class'=>'form-control']); !!}
		{!! $errors->first('address','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('city') ? 'has-error' :'' }}">
		{!! Form::label('city', 'City:'); !!}
		{!! Form::text('city',null,['class'=>'form-control']); !!}
		{!! $errors->first('city','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('country') ? 'has-error' :'' }}">
		{!! Form::label('country', 'Country:'); !!}
		{!! Form::text('country',null,['class'=>'form-control']); !!}
		{!! $errors->first('country','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
		{!! Form::label('status', 'Status:'); !!}
		{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
		{!! $errors->first('status','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('has_receipt') ? 'has-error' :'' }}">
		{!! Form::label('has_receipt', 'Has Receipt:'); !!}
		{!! Form::select('has_receipt',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
		{!! $errors->first('status','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('has_receipt_nr') ? 'has-error' :'' }}">
		{!! Form::label('has_receipt_nr', 'Has Receipt Number:'); !!}
		{!! Form::select('has_receipt_nr',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
		{!! $errors->first('status','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('has_limit') ? 'has-error' :'' }}">
		{!! Form::label('has_limit', 'Has Limit:'); !!}
		{!! Form::select('has_limit',[0=>'NO',1=>'YES'],null,['class'=>'form-control','id' => 'showHide']); !!}
		{!! $errors->first('status','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('starting_balance') ? 'has-error' :'' }}" id="starting_balance" style="display: none">
		{!! Form::label('starting_balance', 'Starting Balance:'); !!}
		{!! Form::number('starting_balance',null,['class'=>'form-control']); !!}
		{!! $errors->first('starting_balance','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('limits') ? 'has-error' :'' }}" id="has_limits" style="display: none">
		{!! Form::label('limits', 'Limit:'); !!}
		{!! Form::number('limits',null,['class'=>'form-control']); !!}
		{!! $errors->first('limits','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
		{!! Form::label('discounts', 'Discounts:'); !!}

		<div class="row">
			<div class="col-md-1 text-center">
				<button type="button" class="btn btn-default btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
			</div>
			<div class="col-md-6">
				{!! Form::select('product[]',['Choose Product'] + $products,null,['class'=>'form-control']); !!}
			</div>
			<div class="col-md-5">
				{!! Form::number('discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
			</div>
		</div>
	</div>

	<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
		{!! Form::label('limits', 'Limits:'); !!}

		<div class="row">
			<div class="col-md-1 text-center">
				<button type="button" class="btn btn-default btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
			</div>
			<div class="col-md-6">
				{!! Form::select('branch[]',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!}
			</div>
			<div class="col-md-5">
				{!! Form::number('limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
			</div>
		</div>

	</div>



	<div class="form-group">
		{!! Form::submit('Create new company', ['class'=>'btn btn-block btn-success']); !!}
	</div>


	{!! Form::close() !!}


@endsection

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

	<script>

		// Check has_limit field
        $(document).on('click','#showHide',function(){
            var e = document.getElementById("showHide");
            var value = e.options[e.selectedIndex].value;

            if(value == 1){
            	$("#starting_balance").show();
                $("#has_limits").show();
            }else {
            	$("#starting_balance").hide();
                $("#has_limits").hide();
            }
        });

        //Append another div if button(discounts) + is clicked
        $(document).on('click','#addProduct',function(){
            $("#discounts").append('<div class="row" id="products"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-6"><select class="form-control" name="product[]" required><option value="">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-5"><input class="form-control" step="any" placeholder="0.01" name="discount[]" type="number"></div></div>');
        });

        //Append another div if button(limits) + is clicked
        $(document).on('click','#addBranch',function(){
            $("#addlimits").append('<div class="row" id="branches"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-6"><select class="form-control" name="branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-5"><input class="form-control" step="any" placeholder="0.01" name="limit[]" type="number"></div></div>');
        });

        $(document).on('click','#removeProduct',function(){
            $(this).closest("#products").remove();
        });

        $(document).on('click','#removeBranch',function(){
            $(this).closest("#branches").remove();
        });

	</script>

@endsection