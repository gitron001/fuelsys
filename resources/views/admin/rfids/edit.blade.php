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
			{!! Form::select('user_id',$users,null,['class'=>'form-control']); !!} 
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

		@if(count($rfid_discounts) > 0)
		<div class="form-group">
			{!! Form::label('discount', 'Discounts'); !!}
			@foreach($rfid_discounts as $rfid_discount)
			<div class="row">
				<input type="hidden" name="hidden_input_product[]" value="{{$rfid_discount->id}}">
				<div class="col-md-6">
					<select name="product[]" class="form-control">
						@foreach($products as $product)
					     <option value="{{ $product->id }}" {{$rfid_discount->product_id == $product->id  ? 'selected' : ''}}>{{ $product->name }}</option>
					    @endforeach
					</select> 
				</div>
				<div class="col-md-6">
					{!! Form::text('discount[]',$rfid_discount->discount,['class'=>'form-control','step'=>'any']); !!}
				</div>
			</div>
			<br>
			@endforeach
		</div>
		@endif
		
		@if(count($rfid_limits) > 0)
		<div class="form-group">
			{!! Form::label('limit', 'Limit'); !!}
			@foreach($rfid_limits as $rfid_limit)
			<div class="row">
				<input type="hidden" name="hidden_input_branch[]" value="{{$rfid_limit->id}}">
				<div class="col-md-6">
					<select name="branch[]" class="form-control">
						@foreach($branches as $branch)
					     <option value="{{ $branch->id }}" {{$rfid_limit->branch_id == $branch->id  ? 'selected' : ''}}>{{ $branch->name }}</option>
					    @endforeach
					</select> 
				</div>
				<div class="col-md-6">
					{!! Form::number('limit[]',$rfid_limit->limit,['class'=>'form-control','step'=>'any']); !!}
				</div>
			</div>
			<br>
			@endforeach
		</div>
		@endif
		
		<div class="form-group">
			{!! Form::submit('Edit RFID', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection