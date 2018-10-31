@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			          <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Companies</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/companies/create') }}"><button type="button" class="btn btn-block btn-success">+ New company</button></a>
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
                  <th>Website</th>
                  <th>Phone</th>
                  <th>Address</th>
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
                  	<td>{{ $company->title }}</td>
                  	<td>{{ $company->website }}</td>
                    <td>{{ $company->phone }}</td>
                    <td>{{ $company->address }}</td>
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
