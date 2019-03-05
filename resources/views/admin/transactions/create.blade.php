@extends('adminlte::page')

@section('content')
	<h1>Create new transaction</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['TransactionController@store']]) !!}
		
		<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
			{!! Form::label('status', 'Status:'); !!}
			{!! Form::text('status',null,['class'=>'form-control']); !!} 
			{!! $errors->first('status','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('locker') ? 'has-error' :'' }}">
			{!! Form::label('locker', 'Locker:'); !!}
			{!! Form::text('locker',null,['class'=>'form-control']); !!} 
			{!! $errors->first('locker','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('tr_no') ? 'has-error' :'' }}">
			{!! Form::label('tr_no', 'Tr_No:'); !!}
			{!! Form::number('tr_no',null,['class'=>'form-control']); !!} 
			{!! $errors->first('tr_no','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('sl_no') ? 'has-error' :'' }}">
			{!! Form::label('sl_no', 'Sl_No:'); !!}
			{!! Form::text('sl_no',null,['class'=>'form-control']); !!} 
			{!! $errors->first('sl_no','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('product_id') ? 'has-error' :'' }}">
			{!! Form::label('product_id', 'Product:'); !!}
			{!! Form::number('product_id',null,['class'=>'form-control']); !!} 
			{!! $errors->first('product_id','<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-group {{ $errors->has('dis_status') ? 'has-error' :'' }}">
			{!! Form::label('dis_status', 'Dis_Status:'); !!}
			{!! Form::text('dis_status',null,['class'=>'form-control']); !!} 
			{!! $errors->first('dis_status','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('price') ? 'has-error' :'' }}">
			{!! Form::label('price', 'Price:'); !!}
			{!! Form::number('price',null,['class'=>'form-control','step'=>'any']); !!} 
			{!! $errors->first('price','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('lit') ? 'has-error' :'' }}">
			{!! Form::label('lit', 'Lit:'); !!}
			{!! Form::number('lit',null,['class'=>'form-control','step'=>'any']); !!} 
			{!! $errors->first('lit','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('money') ? 'has-error' :'' }}">
			{!! Form::label('money', 'Money:'); !!}
			{!! Form::number('money',null,['class'=>'form-control','step'=>'any']); !!} 
			{!! $errors->first('money','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('dis_tot') ? 'has-error' :'' }}">
			{!! Form::label('dis_tot', 'Dis_Tot:'); !!}
			{!! Form::text('dis_tot',null,['class'=>'form-control']); !!} 
			{!! $errors->first('dis_tot','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('pfc_tot') ? 'has-error' :'' }}">
			{!! Form::label('pfc_tot', 'Pfc_Tot:'); !!}
			{!! Form::text('pfc_tot',null,['class'=>'form-control']); !!} 
			{!! $errors->first('pfc_tot','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('tr_status') ? 'has-error' :'' }}">
			{!! Form::label('tr_status', 'Tr_Status:'); !!}
			{!! Form::text('tr_status',null,['class'=>'form-control']); !!} 
			{!! $errors->first('tr_status','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('rfid_id') ? 'has-error' :'' }}">
			{!! Form::label('rfid_id', 'RFID:'); !!}
			{!! Form::number('rfid_id',null,['class'=>'form-control']); !!} 
			{!! $errors->first('rfid_id','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('ctype') ? 'has-error' :'' }}">
			{!! Form::label('ctype', 'CType:'); !!}
			{!! Form::text('ctype',null,['class'=>'form-control']); !!} 
			{!! $errors->first('ctype','<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-group {{ $errors->has('method') ? 'has-error' :'' }}">
			{!! Form::label('method', 'Method:'); !!}
			{!! Form::text('method',null,['class'=>'form-control']); !!} 
			{!! $errors->first('method','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('bill_no') ? 'has-error' :'' }}">
			{!! Form::label('bill_no', 'Bill_No:'); !!}
			{!! Form::number('bill_no',null,['class'=>'form-control']); !!} 
			{!! $errors->first('bill_no','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create new transaction', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection