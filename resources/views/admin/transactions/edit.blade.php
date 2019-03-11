@extends('adminlte::page')

@section('content')
	<h1>Edit Transaction</h1>
		{!! Form::model($transaction,['method'=>'PATCH', 'action'=>['TransactionController@update',$transaction->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('status', 'Status'); !!}
			{!! Form::text('status',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('locker', 'Locker'); !!}
			{!! Form::text('locker',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('tr_no', 'Tr_No'); !!}
			{!! Form::number('tr_no',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('sl_no', 'Sl_No'); !!}
			{!! Form::text('sl_no',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('product_id', 'Product'); !!}
			{!! Form::select('product_id',['Choose a Product'] + $products,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('dis_status', 'Dis_Status'); !!}
			{!! Form::text('dis_status',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('price', 'Price'); !!}
			{!! Form::number('price',null,['class'=>'form-control','step'=>'any']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('lit', 'Lit'); !!}
			{!! Form::number('lit',null,['class'=>'form-control','step'=>'any']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('money', 'Money'); !!}
			{!! Form::number('money',null,['class'=>'form-control','step'=>'any']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('dis_tot', 'Dis_Tot'); !!}
			{!! Form::text('dis_tot',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('pfc_tot', 'Pfc_Tot'); !!}
			{!! Form::text('pfc_tot',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('tr_status', 'Tr_Status'); !!}
			{!! Form::text('tr_status',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('rfid_id', 'RFID'); !!}
			{!! Form::number('rfid_id',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('ctype', 'CType'); !!}
			{!! Form::text('ctype',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('method', 'Method'); !!}
			{!! Form::text('method',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('bill_no', 'Bill_No'); !!}
			{!! Form::number('bill_no',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Update Transaction', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection