@extends('adminlte::page')

@section('content')
	<h1>Create new rfid</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['RfidController@store']]) !!}
		
		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}">
			{!! Form::label('rfid', 'RFID:'); !!}
			{!! Form::number('rfid',null,['class'=>'form-control']); !!} 
			{!! $errors->first('rfid','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}">
			{!! Form::label('rfid_name', 'RFID Name:'); !!}
			{!! Form::number('rfid_name',null,['class'=>'form-control']); !!} 
			{!! $errors->first('rfid_name','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
			{!! Form::label('user_id', 'User_id:'); !!}
			{!! Form::select('user_id',['Choose User'] + $users,null,['class'=>'form-control']); !!} 
			{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
			{!! Form::label('type', 'Type:'); !!}
			{!! Form::select('type',[0 => 'Staff',1=>'Company'],null,['class'=>'form-control', 'id' => 'showHide']); !!} 
			{!! $errors->first('type','<span class="help-block">:message</span>') !!}
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

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="limits">
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

		<div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company" style="display: none">
			{!! Form::label('company_id', 'Company:'); !!}
			{!! Form::select('company_id',['Choose Company'] + $companies,null,['class'=>'form-control']); !!} 
			{!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('one_time_limit') ? 'has-error' :'' }}" id="one_time_limit" style="display: none">
			{!! Form::label('one_time_limit', 'One_Time_Limit:'); !!}
			{!! Form::number('one_time_limit',null,['class'=>'form-control']); !!}
			{!! $errors->first('one_time_limit','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('plates') ? 'has-error' :'' }}" id="plates" style="display: none">
			{!! Form::label('plates', 'Plates:'); !!}
			{!! Form::text('plates',null,['class'=>'form-control']); !!}
			{!! $errors->first('plates','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('car_id') ? 'has-error' :'' }}" id="car_id" style="display: none">
			{!! Form::label('car_id', 'Car_Id:'); !!}
			{!! Form::number('car_id',null,['class'=>'form-control']); !!}
			{!! $errors->first('car_id','<span class="help-block">:message</span>') !!} 
		</div>


		<div class="form-group">
			{!! Form::submit('Create RFID', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection


<!-- SCRIPT -->
@section('js')
    
<script>
	
	// Check if company is selected and show discount fields
	$(document).on('click','#showHide',function(){
	    var e = document.getElementById("showHide");
		var value = e.options[e.selectedIndex].value;

		if(value == 1){
			$("#company").show();
			$("#one_time_limit").show();
			$("#plates").show();
			$("#car_id").show();
		}else {
			$("#company").hide();
			$("#one_time_limit").hide();
			$("#plates").hide();
			$("#car_id").hide();
		}
	});

	//Append another div if button(discounts) + is clicked
	$(document).on('click','#addProduct',function(){
		$("#discounts").append('<div class="row" id="products"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-6"><select class="form-control" name="product[]"><option value="0">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-5"><input class="form-control" step="any" placeholder="0.01" name="discount[]" type="number"></div></div>');
	});

	//Append another div if button(limits) + is clicked
	$(document).on('click','#addBranch',function(){
		$("#limits").append('<div class="row" id="branches"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-6"><select class="form-control" name="branch[]"><option value="0">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-5"><input class="form-control" step="any" placeholder="0.01" name="limit[]" type="number"></div></div>');
	});

	$(document).on('click','#removeProduct',function(){
		$(this).closest("#products").remove();
	});

	$(document).on('click','#removeBranch',function(){
		$(this).closest("#branches").remove();
	});
	


</script>

@endsection



