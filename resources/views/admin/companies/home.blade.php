@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Company</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/companies/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new company</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Fis.Number</th>
                  <th>Bis.Number</th>
                  <th>Tax.Number</th>
                  <th>Res.Number</th>
                  <th>Tel.Number</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Limit</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                <tr>
                  	<td>{{ $company->id }}</td>
                  	<td>{{ $company->name }}</td>
                  	<td>{{ $company->fis_number }}</td>
                    <td>{{ $company->bis_number }}</td>
                    <td>{{ $company->tax_number }}</td>
                    <td>{{ $company->res_number }}</td>
                    <td>{{ $company->tel_number }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->city }}</td>
                    <td>{{ $company->country }}</td>
                    <td>{{ $company->type }}</td>
                    <td>{{ $company->status == 1 ? 'Active' : 'No active'  }}</td>
                    <td>{{ $company->limit }}</td>
                  	<td>{{ $company->created_at->diffForHumans() }}</td>
                  	<td>{{ $company->updated_at->diffForHumans() }}</td>
                  	<td><a href="{{ url('admin/companies/'.$company->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['CompaniesController@destroy',$company->id]]) !!}
                        <div class="form-group">
                          {!! Form::submit('Delete', ['class'=>'btn btn-block btn-danger']); !!}
                        </div>
                     {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
