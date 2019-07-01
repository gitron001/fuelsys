@extends('adminlte::page')

@section('content')
	<h1>Company</h1>
	
	{!! Form::model($company,['method'=>'PATCH', 'action'=>['SettingsController@update',$company->id]]) !!}
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('name', 'Name'); !!}
				{!! Form::text('name',null,['class'=>'form-control']); !!} 
			</div>
		</div>
	
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('fis_number', 'Fis.Number'); !!}
				{!! Form::text('fis_number',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('bis_number', 'Bis.Number'); !!}
				{!! Form::text('bis_number',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('starting_balance', 'Starting Balance'); !!}
				{!! Form::text('starting_balance',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('contact_person', 'Contact Person:'); !!}
				{!! Form::text('contact_person',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('fis_number', 'Fis.Number'); !!}
				{!! Form::text('fis_number',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('tax_number', 'tax.Number'); !!}
				{!! Form::text('tax_number',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('res_number', 'Res.Number'); !!}
				{!! Form::text('res_number',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('tel_number', 'Phone'); !!}
				{!! Form::text('tel_number',null,['class'=>'form-control']); !!} 
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
				{!! Form::label('address', 'Address'); !!}
				{!! Form::text('address',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('city', 'City'); !!}
				{!! Form::text('city',null,['class'=>'form-control']); !!} 
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('country', 'Country'); !!}
				{!! Form::text('country',null,['class'=>'form-control']); !!} 
			</div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::submit('Update Company', ['class'=>'btn btn-block btn-primary']); !!}
	</div>

	{!! Form::close() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
