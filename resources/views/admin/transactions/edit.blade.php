@extends('adminlte::page')

@section('content')
	<h1>Edit Transaction</h1>
		{!! Form::model($transaction,['method'=>'PATCH', 'action'=>['TransactionController@update',$transaction->id]]) !!}
		
		<div class="form-group">
			{!! Form::label('dispanser_id', 'Dispanser_Id'); !!}
			{!! Form::select('dispanser_id',$dispanesers,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('user_id', 'User_Id'); !!}
			{!! Form::select('user_id',$users,null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('total', 'Total'); !!}
			{!! Form::text('total',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::label('amount', 'Amount'); !!}
			{!! Form::text('amount',null,['class'=>'form-control']); !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Edit Transaction', ['class'=>'btn btn-block btn-primary']); !!}
		</div>

		{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection