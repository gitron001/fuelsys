@extends('adminlte::page')

@section('content')
<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('/images/nesim-bakija.png')}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $company->name}}</h3>

              <p class="text-muted text-center">{{ $company->city }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Phone Number</b> <a class="pull-right">{{ $company->tel_number }}</a>
				</li>
				<li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $company->email }}</a>
				</li>
				<li class="list-group-item">
                  <b>Address</b> <a class="pull-right">{{ $company->address }}</a>
				</li>
				<li class="list-group-item">
                  <b>Country</b> <a class="pull-right">{{ $company->country }}</a>
				</li>
				<li class="list-group-item">
                  <b>Fis.Number</b> <a class="pull-right">{{ $company->fis_number }}</a>
				</li>
				<li class="list-group-item">
                  <b>Contact Person</b> <a class="pull-right">{{ $company->contact_person }}</a>
				</li>
                <li class="list-group-item">
                  <b>Starting Balance</b> <a class="pull-right">{{ $company->starting_balance }}</a>
				</li>
				<li class="list-group-item">
                  <b>Tax.Number</b> <a class="pull-right">{{ $company->tax_number }}</a>
				</li>
				<li class="list-group-item">
                  <b>Res.Number</b> <a class="pull-right">{{ $company->res_number }}</a>
				</li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
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
							{!! Form::label('tax_number', 'Tax.Number'); !!}
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
					<button type="submit" class="btn btn-block btn-primary">
						<i class="fas fa-save"></i> Save
					</button>
				</div>

				{!! Form::close() !!}
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
