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
                  <th>{{ trans('adminlte::adminlte.companyName') }}</th>
                  <th>Fis.Number</th>
                  <th>Tel.Number</th>
                  <th>Contact Person</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Limit Left</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                <tr>
                  	<td>{{ $company->name }}</td>
                  	<td>{{ $company->fis_number }}</td>
                    <td>{{ $company->tel_number }}</td>
                    <td>{{ $company->contact_person }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->status == 1 ? 'Active' : 'No active'  }}</td>
                    <td>{{ $company->limit_left }}</td>
                  	<td>{{ $company->created_at->diffForHumans() }}</td>
                  	<td>{{ $company->updated_at->diffForHumans() }}</td>
                    <td class="text-center" width="8%">
                      <a href="{{ url('admin/companies/'.$company->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                      <a href="{{ route('company.delete', $company->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $companies->links() }}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
