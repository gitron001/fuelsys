@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">User</h3></div>
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
        					<th>Branch</th>
        					<th>Role</th>
        					<th>Status</th>
        					<th>Created At</th>
        					<th>Updated At</th>
        					<th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
          					<td>{{ $user->name }}</td>
          					<td>{{ $user->email }}</td>
          					<td>{{ $user->branch->name }}</td>
          					<td>{{ $user->role->name }}</td>
          					<td>{{ $user->status == 1 ? 'Active' : 'No Active' }}</td>
          					<td>{{ $user->created_at->diffForHumans() }}</td>
          					<td>{{ $user->updated_at->diffForHumans() }}</td>
                  	
                  	<td><a href="{{ url('admin/users/'.$user->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['UserController@destroy',$user->id]]) !!}
                        <div class="form-group">
                          {!! Form::button('Delete', ['class'=>'btn btn-block btn-danger delete-item']); !!}
                        </div>
                     {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $users->links() }}
              </div>
            </div>
        </div>
	</div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/delete_confirm')