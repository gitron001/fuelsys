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
			{!! Form::label('sl_no', 'Sl_No'); !!}
			{!! Form::text('sl_no',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('tn_no', 'Tn_No'); !!}
			{!! Form::text('tn_no',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('sts', 'Sts'); !!}
			{!! Form::text('sts',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('price', 'Price'); !!}
			{!! Form::text('price',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('lit', 'Lit'); !!}
			{!! Form::text('lit',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('money', 'Money'); !!}
			{!! Form::text('money',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('ctot', 'Ctot'); !!}
			{!! Form::text('ctot',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('mtot', 'Mtot'); !!}
			{!! Form::text('mtot',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('~status', '~Status'); !!}
			{!! Form::text('~status',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('card', 'Card'); !!}
			{!! Form::text('card',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('ctype', 'Ctype'); !!}
			{!! Form::text('ctype',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('method', 'Method'); !!}
			{!! Form::text('method',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('bill_no', 'Bill_No'); !!}
			{!! Form::text('bill_no',null,['class'=>'form-control']); !!} 
		</div>

		


		<div class="form-group">
			{!! Form::submit('Edit Transaction', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection