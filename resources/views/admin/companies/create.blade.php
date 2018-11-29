@extends('adminlte::page')

@section('content')
	<h1>Create new company</h1>
	
		{!! Form::open(['method'=>'POST', 'action'=>['CompaniesController@store']]) !!}
		
		<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
			{!! Form::label('name', 'Name:'); !!}
			{!! Form::text('name',null,['class'=>'form-control']); !!} 
			{!! $errors->first('name','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('fis_number') ? 'has-error' :'' }}">
			{!! Form::label('fis_number', 'Fis.Number:'); !!}
			{!! Form::number('fis_number',null,['class'=>'form-control']); !!} 
			{!! $errors->first('fis_number','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('bis_number') ? 'has-error' :'' }}">
			{!! Form::label('bis_number', 'Bis.Number:'); !!}
			{!! Form::number('bis_number',null,['class'=>'form-control']); !!}
			{!! $errors->first('bis_number','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('tax_number') ? 'has-error' :'' }}">
			{!! Form::label('tax_number', 'Tax.Number:'); !!}
			{!! Form::number('tax_number',null,['class'=>'form-control']); !!} 
			{!! $errors->first('tax_number','<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('res_number') ? 'has-error' :'' }}">
			{!! Form::label('res_number', 'Res.Number:'); !!}
			{!! Form::number('res_number',null,['class'=>'form-control']); !!}
			{!! $errors->first('res_number','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('tel_number') ? 'has-error' :'' }}">
			{!! Form::label('tel_number', 'Tel.Number:'); !!}
			{!! Form::number('tel_number',null,['class'=>'form-control']); !!}
			{!! $errors->first('tel_number','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
			{!! Form::label('email', 'Email:'); !!}
			{!! Form::text('email',null,['class'=>'form-control']); !!}
			{!! $errors->first('email','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
			{!! Form::label('address', 'Address:'); !!}
			{!! Form::text('address',null,['class'=>'form-control']); !!}
			{!! $errors->first('address','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('city') ? 'has-error' :'' }}">
			{!! Form::label('city', 'City:'); !!}
			{!! Form::text('city',null,['class'=>'form-control']); !!}
			{!! $errors->first('city','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('country') ? 'has-error' :'' }}">
			{!! Form::label('country', 'Country:'); !!}
			{!! Form::text('country',null,['class'=>'form-control']); !!}
			{!! $errors->first('country','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
			{!! Form::label('type', 'Type:'); !!}
			{!! Form::text('type',null,['class'=>'form-control']); !!}
			{!! $errors->first('type','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
			{!! Form::label('status', 'Status:'); !!}
			{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
			{!! $errors->first('status','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group {{ $errors->has('limit') ? 'has-error' :'' }}">
			{!! Form::label('limit', 'Limit:'); !!}
			{!! Form::number('limit',null,['class'=>'form-control']); !!}
			{!! $errors->first('limit','<span class="help-block">:message</span>') !!} 
		</div>

		<div class="form-group">
			{!! Form::submit('Create new company', ['class'=>'btn btn-block btn-success']); !!}
		</div>


		{!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection