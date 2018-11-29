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

		<div class="form-group {{ $errors->has('sl_no') ? 'has-error' :'' }}">
			{!! Form::label('sl_no', 'Sl_No:'); !!}
			{!! Form::text('sl_no',null,['class'=>'form-control']); !!} 
			{!! $errors->first('sl_no','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('tn_no') ? 'has-error' :'' }}">
			{!! Form::label('tn_no', 'Tn_No:'); !!}
			{!! Form::text('tn_no',null,['class'=>'form-control']); !!} 
			{!! $errors->first('tn_no','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('sts') ? 'has-error' :'' }}">
			{!! Form::label('sts', 'Sts:'); !!}
			{!! Form::text('sts',null,['class'=>'form-control']); !!} 
			{!! $errors->first('sts','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('price') ? 'has-error' :'' }}">
			{!! Form::label('price', 'Price:'); !!}
			{!! Form::text('price',null,['class'=>'form-control']); !!} 
			{!! $errors->first('price','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('lit') ? 'has-error' :'' }}">
			{!! Form::label('lit', 'Lit:'); !!}
			{!! Form::text('lit',null,['class'=>'form-control']); !!} 
			{!! $errors->first('lit','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('money') ? 'has-error' :'' }}">
			{!! Form::label('money', 'Money:'); !!}
			{!! Form::text('money',null,['class'=>'form-control']); !!} 
			{!! $errors->first('money','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('ctot') ? 'has-error' :'' }}">
			{!! Form::label('ctot', 'Ctot:'); !!}
			{!! Form::text('ctot',null,['class'=>'form-control']); !!} 
			{!! $errors->first('ctot','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('mtot') ? 'has-error' :'' }}">
			{!! Form::label('mtot', 'Mtot:'); !!}
			{!! Form::text('mtot',null,['class'=>'form-control']); !!} 
			{!! $errors->first('mtot','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('~status') ? 'has-error' :'' }}">
			{!! Form::label('~status', '~Status:'); !!}
			{!! Form::text('~status',null,['class'=>'form-control']); !!} 
			{!! $errors->first('~status','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('card') ? 'has-error' :'' }}">
			{!! Form::label('card', 'Card:'); !!}
			{!! Form::text('card',null,['class'=>'form-control']); !!} 
			{!! $errors->first('card','<span class="help-block">:message</span>') !!}
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
			{!! Form::text('bill_no',null,['class'=>'form-control']); !!} 
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