@extends('adminlte::page')

@section('content')
	<h1>Edit User</h1>

	{!! Form::model($user,['method'=>'PATCH', 'action'=>['UsersController@update',$user->id] ,'autocomplete'=>'off']) !!}

	<div class="row">
		<div class="col-md-6">	
			<div class="form-group">
				{!! Form::label('rfid', 'RFID'); !!}
				{!! Form::text('rfid',null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('name', 'Name'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('email', 'Email'); !!}
				{!! Form::text('email',null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="pass" name="password" class="form-control" value="password">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('status', 'Status'); !!}
				{!! Form::select('status',[1 =>'Active',2 =>'No Active'],null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
				<label for="type">Type</label>
				<select name="type" class="form-control" id="showHide">
					<option value="1" @if ($user->type == 1) {{ 'selected' }} @endif>Staff</option>
					<option value="2" @if ($user->type == 2) {{ 'selected' }} @endif>Company</option>
					<option value="3" @if ($user->type == 3) {{ 'selected' }} @endif>Admin</option>
					<option value="4" @if ($user->type == 4) {{ 'selected' }} @endif>Client</option>
					<option value="5" @if ($user->type == 5) {{ 'selected' }} @endif>Manager</option>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('has_limit', 'Has Limit'); !!}
				{!! Form::select('has_limit',[0=>'NO',1=>'YES'],null,['class'=>'form-control','id'=>'showHideLimits']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="has_limits">
				{!! Form::label('limits', 'Limits'); !!}
				{!! Form::text('limits',null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="starting_balance">
				{!! Form::label('starting_balance', 'Starting Balance'); !!}
				{!! Form::text('starting_balance',null,['class'=>'form-control','id'=>'starting_balance']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="company" @if ($user->type != 2) echo style="display: none" @endif>
				{!! Form::label('company_id', 'Company'); !!}
				{!! Form::select('company_id',['Select a Company'] + $companies,null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="one_time_limit" @if ($user->type != 2) echo style="display: none" @endif>
				{!! Form::label('one_time_limit', 'One_Time_Limit'); !!}
				{!! Form::text('one_time_limit',null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="plates" @if ($user->type != 2) echo style="display: none" @endif>
				{!! Form::label('plates', 'Plates'); !!}
				{!! Form::text('plates',null,['class'=>'form-control']); !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="vehicle" @if ($user->type != 2) echo style="display: none" @endif>
				{!! Form::label('vehicle', 'Vehicle'); !!}
				{!! Form::text('vehicle',null,['class'=>'form-control']); !!}
			</div>
		</div>
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

	<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
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
		{!! Form::submit('Update User', ['class'=>'btn btn-block btn-primary']); !!}
	</div>

	{!! Form::close() !!}

@endsection

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@endsection


<!-- SCRIPT -->
@section('js')

	<script>

		$(document).ready(function() {
            var e = document.getElementById("showHideLimits");
            var value = e.options[e.selectedIndex].value;

            if(value == 1){
                $("#starting_balance").show();
                $("#has_limits").show();
            }else {
                $("#starting_balance").hide();
                $("#has_limits").hide();
            }
        });

        // Check has_limit field
        $(document).on('click','#showHideLimits',function(){
            var e = document.getElementById("showHideLimits");
            var value = e.options[e.selectedIndex].value;

            if(value == 1){
                $("#starting_balance").show();
                $("#has_limits").show();
            }else {
                $("#starting_balance").hide();
                $("#has_limits").hide();
            }
        });

        // Check if company is selected and show discount fields
        $(document).on('click','#showHide',function(){
            var e = document.getElementById("showHide");
            var value = e.options[e.selectedIndex].value;

            if(value == 2){
                $("#company").show();
                $("#one_time_limit").show();
                $("#plates").show();
                $("#vehicle").show();
            }else {
                $("#company").hide();
                $("#one_time_limit").hide();
                $("#plates").hide();
                $("#vehicle").hide();
            }
        });

        //Append another div if button(discounts) + is clicked
        $(document).on('click','#addProduct',function(){
            $("#discounts").append('<div class="row" id="products"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_product[]" required><option value="">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_discount[]" type="number" required></div></div><br>');
        });

        //Append another div if button(limits) + is clicked
        $(document).on('click','#addBranch',function(){
            $("#addlimits").append('<div class="row" id="branches"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_limit[]" type="number" required></div></div><br>');
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