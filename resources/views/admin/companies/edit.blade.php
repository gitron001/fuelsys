@extends('adminlte::page')

@section('content')
	<h1>Edit Company</h1>
	<div class="col-md-10">
		<div class="row">
			{!! Form::model($company,['method'=>'PATCH', 'action'=>['CompaniesController@update',$company->id]]) !!}
			
			<div class="form-group">
				{!! Form::label('title', 'Title'); !!}
				{!! Form::text('title',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::label('website', 'Website'); !!}
				{!! Form::text('website',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::label('phone', 'Phone'); !!}
				{!! Form::text('phone',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::label('address', 'Address'); !!}
				{!! Form::text('address',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::submit('Edit Company', ['class'=>'btn btn-block btn-primary']); !!}
			</div>

			{!! Form::close() !!}

		</div>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection