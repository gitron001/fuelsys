@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Branch</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/branches/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new branch</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($branches as $branch)
                <tr>
                  	<td>{{ $branch->name }}</td>
                  	<td>{{ $branch->address }}</td>
                    <td>{{ $branch->city }}</td>
                    <td>{{ $branch->status == 1 ? 'Active' : 'No active' }}</td>
                  	<td>{{ $branch->created_at->diffForHumans() }}</td>
                  	<td>{{ $branch->updated_at->diffForHumans() }}</td>
                    <td class="text-center" width="8%">
                      <a href="{{ url('admin/branches/'.$branch->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                      <a href="{{ route('branch.delete', $branch->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $branches->links() }}
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
