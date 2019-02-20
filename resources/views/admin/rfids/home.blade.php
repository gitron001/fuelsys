@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">RFIDS</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/rfids/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new RFID</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>RFID</th>
                  <th>User</th>
                  <th>Company</th>
                  <th>One time limit</th>
                  <th>Plates</th>
                  <th>Car_id</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rfids as $rfid)
                <tr>
                  	<td>{{ $rfid->rfid }}</td>
                  	<td>{{ $rfid->user->name }}</td>
                    <td>{{ $rfid->company->name }}</td>
                    <td>{{ $rfid->one_time_limit }}</td>
                    <td>{{ $rfid->plates }}</td>
                    <td>{{ $rfid->car_id }}</td>
                    <td>{{ $rfid->created_at->diffForHumans() }}</td>
                  	<td>{{ $rfid->updated_at->diffForHumans() }}</td>
                  	<td><a href="{{ url('admin/rfids/'.$rfid->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['RfidController@destroy',$rfid->id]]) !!}
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
