@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Users</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/users/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new user</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>RFID</th>
                  <th>Company</th>
                  <th>One time limit</th>
                  <th>Plates</th>
                  <th>Vehicle</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                  	<td>{{ $user->email }}</td>
                    <td>{{ $user->rfid }}</td>
                    <td>{{ $user->company->name ? $user->company->name : 'No Company' }}</td>
                    <td>{{ $user->one_time_limit }}</td>
                    <td>{{ $user->plates }}</td>
                    <td>{{ $user->vehicle }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                  	<td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td class="text-center" width="8%">
                      <a href="{{ url('admin/users/'.$user->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                      <a href="{{ route('user.delete', $user->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
                    </td>    
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $users->links() }}
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
