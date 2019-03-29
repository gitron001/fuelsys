@extends('adminlte::page')

@section('content')
	<h1>Edit Company</h1>
		{!! Form::model($company,['method'=>'PATCH', 'action'=>['CompaniesController@update',$company->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('fis_number', 'Fis.Number'); !!}
			{!! Form::text('fis_number',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('bis_number', 'Bis.Number'); !!}
			{!! Form::text('bis_number',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('starting_balance', 'Starting Balance'); !!}
			{!! Form::text('starting_balance',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('contact_person', 'Contact Person:'); !!}
			{!! Form::text('contact_person',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('fis_number', 'Fis.Number'); !!}
			{!! Form::text('fis_number',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('tax_number', 'tax.Number'); !!}
			{!! Form::text('tax_number',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('res_number', 'Res.Number'); !!}
			{!! Form::text('res_number',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('tel_number', 'Phone'); !!}
			{!! Form::text('tel_number',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email'); !!}
			{!! Form::text('email',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('address', 'Address'); !!}
			{!! Form::text('address',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('city', 'City'); !!}
			{!! Form::text('city',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('country', 'Country'); !!}
			{!! Form::text('country',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('type', 'Type'); !!}
			{!! Form::text('type',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('status', 'Status'); !!}
			{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
		</div>

		<div class="form-group">
			{!! Form::label('has_limit', 'Has Limit'); !!}
			{!! Form::select('has_limit',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
		</div>

		<div class="form-group">
			{!! Form::label('has_receipt', 'Has Receipt'); !!}
			{!! Form::select('has_receipt',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
		</div>

		<div class="form-group">
			{!! Form::label('has_receipt_nr', 'Has Receipt Number'); !!}
			{!! Form::select('has_receipt_nr',[0=>'NO',1=>'YES'],null,['class'=>'form-control']); !!}
		</div>
		<!-- *** DISCOUNT *** -->

		@if(count($company_discounts) > 0)

		{!! Form::label('discount', 'Discounts'); !!}
		@foreach($company_discounts as $company_discount)
		<div class="form-group">
			
			<div class="row" id="discount">
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

		</div>
		@endforeach

		@endif

		<!-- *** END DISCOUNT *** -->

		<!-- *** NEW DISCOUNT *** -->

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
			@if(count($company_discounts) == 0)
			{!! Form::label('discount', 'New Discounts'); !!}
			@endif
			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
				</div>
				<div class="col-md-5">
					{!! Form::select('new_product[]',['Choose a Product'] + $products,null,['class'=>'form-control']); !!} 
				</div>
				<div class="col-md-6">
					{!! Form::number('new_discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
				</div>
			</div>
			<br>
		</div>

		<!-- *** END NEW LIMITS *** -->
		
		<!-- *** LIMITS *** -->

		@if(count($company_limits) > 0)

		{!! Form::label('limit', 'Limit'); !!}
		@foreach($company_limits as $company_limit)
		<div class="form-group">

			<div class="row" id="limit">
				<input type="hidden" name="hidden_input_branch[]" value="{{$company_limit->id}}">
				<div class="col-md-1">
					<button type="button" class="btn btn-danger btn-circle" id="deleteLimit"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteLimit[]" value="{{$company_limit->id}}"></button>
				</div>
				<div class="col-md-5">
					<select name="branch[]" class="form-control">
						@foreach($branches as $branch_id => $branch_name)
					     <option value="{{ $branch_id }}" {{$company_limit->branch_id == $branch_id  ? 'selected' : ''}}>{{ $branch_name }}</option>
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

		<!-- *** END LIMITS *** -->

		<!-- *** NEW LIMITS *** -->

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="limits">
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

		<!-- *** END NEW LIMITS *** -->

		<div class="form-group">
			{!! Form::label('limits', 'Limits'); !!}
			{!! Form::text('limits',null,['class'=>'form-control']); !!} 
		</div>
		

		<div class="form-group">
			{!! Form::submit('Edit Company', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

<!-- SCRIPT -->
@section('js')

<script>

	//Append another div if button(discounts) + is clicked
	$(document).on('click','#addProduct',function(){
		$("#discounts").append('<div class="row" id="products"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_product[]" required><option value="">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_discount[]" type="number" required></div></div><br>');
	});

	//Append another div if button(limits) + is clicked
	$(document).on('click','#addBranch',function(){
		$("#limits").append('<div class="row" id="branches"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_limit[]" type="number" required></div></div><br>');
	});

	$(document).on('click','#deleteDiscount',function(){
		$(this).closest("#discount").remove();
	});

	$(document).on('click','#deleteLimit',function(){
		$(this).closest("#limit").remove();
	});	

	$(document).on('click','#removeProduct',function(){
		$(this).closest("#products").remove();
	});

	$(document).on('click','#removeBranch',function(){
		$(this).closest("#branches").remove();
	});	


</script>

@endsection