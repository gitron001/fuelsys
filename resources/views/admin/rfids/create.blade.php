@extends('adminlte::page')

@section('content')
	<h1>Create new rfid</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['RfidController@store']]) !!}
		
		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}">
			{!! Form::label('ffid', 'FFID:'); !!}
			{!! Form::number('ffid',null,['class'=>'form-control']); !!} 
			{!! $errors->first('ffid','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
			{!! Form::label('user_id', 'User_id:'); !!}
			{!! Form::select('user_id',['Choose User'] + $users,null,['class'=>'form-control']); !!} 
			{!! $errors->first('user_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
			{!! Form::label('type', 'Type:'); !!}
			{!! Form::select('type',[0 => 'Staff',1=>'Company'],null,['class'=>'form-control', 'id' => 'discountSelected']); !!} 
			{!! $errors->first('type','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts" style="display:none;">
		{!! Form::label('discounts', 'Discounts:'); !!}

			<div class="row">
				<div class="col-md-1 text-center">
					<button type="button" class="btn btn-default btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
				</div>
				<div class="col-md-6">
					{!! Form::text('product',null,['class'=>'form-control','placeholder'=>'Product']); !!}
				</div>
				<div class="col-md-5">
					{!! Form::text('discount',null,['class'=>'form-control','placeholder'=>'0.01']); !!}
				</div>
			</div>

		</div>

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="limits" style="display:none;">
		{!! Form::label('limits', 'Limits:'); !!}

			<div class="row">
				<div class="col-md-1 text-center">
					<button type="button" class="btn btn-default btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
				</div>
				<div class="col-md-6">
					{!! Form::text('branch',null,['class'=>'form-control','placeholder'=>'Branch']); !!}
				</div>
				<div class="col-md-5">
					{!! Form::text('limit',null,['class'=>'form-control','placeholder'=>'0.01']); !!}
				</div>
			</div>

		</div>


		<div class="form-group">
			{!! Form::submit('Create new product', ['class'=>'btn btn-block btn-success']); !!}
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
	$(document).on('click','#discountSelected',function(){
	    var e = document.getElementById("discountSelected");
		var value = e.options[e.selectedIndex].value;

		if(value == 1){
			$("#discounts").show();
			$("#limits").show();
		}else {
			$("#discounts").hide();
			$("#limits").hide();
		}
	});

	//Append another div if button(discounts) + is clicked
	$(document).on('click','#addProduct',function(){
		$("#discounts").append('<br><div class="row"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button></div><div class="col-md-6"><input class="form-control" placeholder="Product" name="product" type="text"></div><div class="col-md-5"><input class="form-control" placeholder="0.01" name="discount" type="text"></div></div>');
	});

	//Append another div if button(limits) + is clicked
	$(document).on('click','#addBranch',function(){
		$("#limits").append('<br><div class="row"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button></div><div class="col-md-6"><input class="form-control" placeholder="Branch" name="branch" type="text"></div><div class="col-md-5"><input class="form-control" placeholder="0.01" name="limit" type="text"></div></div>');
	});

</script>

@endsection



