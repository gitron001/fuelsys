@extends('adminlte::page')

@section('content')
	<h1>Create new company</h1>

	@include('includes/form_error')
	
	<div class="col-md-12">
		<div class="row">
			{!! Form::open(['method'=>'POST', 'action'=>['CompaniesController@store']]) !!}
			
			<div class="form-group">
				{!! Form::label('title', 'Title:'); !!}
				{!! Form::text('title',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::label('website', 'Website:'); !!}
				{!! Form::text('website',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::label('phone', 'Phone:'); !!}
				{!! Form::text('phone',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::label('address', 'Address:'); !!}
				{!! Form::text('address',null,['class'=>'form-control']); !!} 
			</div>

			<div class="form-group">
				{!! Form::submit('Create new company', ['class'=>'btn btn-block btn-success']); !!}
			</div>

			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection