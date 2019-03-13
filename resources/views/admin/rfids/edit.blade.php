@extends('adminlte::page')

@section('content')
	<h1>Edit RFID</h1>
		{!! Form::model($rfid,['method'=>'PATCH', 'action'=>['RfidController@update',$rfid->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('rfid', 'RFID'); !!}
			{!! Form::text('rfid',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('rfid_name', 'RFID Name'); !!}
			{!! Form::text('rfid_name',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('user_id', 'User'); !!}
			{!! Form::select('user_id',['Select a User'] + $users,null,['class'=>'form-control']); !!} 
		</div>
		
		<div class="form-group">
			{!! Form::label('company_id', 'Company'); !!}
			{!! Form::select('company_id',['Select a Company'] + $companies,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('one_time_limit', 'One_Time_Limit'); !!}
			{!! Form::text('one_time_limit',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('plates', 'Plates'); !!}
			{!! Form::text('plates',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('vehicle', 'Vehicle'); !!}
			{!! Form::text('vehicle',null,['class'=>'form-control']); !!} 
		</div>
	
		<!-- *** DISCOUNT *** -->

		@if(count($rfid_discounts) > 0)

		{!! Form::label('discount', 'Discounts'); !!}
		@foreach($rfid_discounts as $rfid_discount)
		<div class="form-group">
			
			<div class="row" id="discount">
				<input type="hidden" name="hidden_input_product[]" value="{{$rfid_discount->id}}">
				<div class="col-md-1">
					<button type="button" class="btn btn-danger btn-circle" id="deleteDiscount"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteDiscount[]" value="{{$rfid_discount->id}}"></button>
				</div>
				<div class="col-md-5">
					<select name="product[]" class="form-control">
						@foreach($products as $product_id => $product_name)
					     <option value="{{ $product_id }}" {{$rfid_discount->product_id == $product_id  ? 'selected' : ''}}>{{ $product_name }}</option>
					    @endforeach
					</select> 
				</div>
				<div class="col-md-6">
					{!! Form::text('discount[]',$rfid_discount->discount,['class'=>'form-control','step'=>'any']); !!}
				</div>
			</div>

		</div>
		@endforeach

		@endif

		<!-- *** END DISCOUNT *** -->

		<!-- *** NEW DISCOUNT *** -->

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
			@if(count($rfid_discounts) == 0)
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
						@foreach($branches as $branch_id => $branch_name)
					     <option value="{{ $branch_id }}" {{$rfid_limit->branch_id == $branch_id  ? 'selected' : ''}}>{{ $branch_name }}</option>
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

		<!-- *** END LIMITS *** -->

		<!-- *** NEW LIMITS *** -->

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="limits">
		@if(count($rfid_limits) == 0)
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
			{!! Form::submit('Update RFID', ['class'=>'btn btn-block btn-primary']); !!}
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