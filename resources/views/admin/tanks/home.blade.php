@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Tank</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/tanks/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new tank</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
        					<th>Name</th>
        					<th>Product_Id</th>
        					<th>Capacity</th>
        					<th>Status</th>
        					<th>Created At</th>
        					<th>Updated At</th>
        					<th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tanks as $tank)
                <tr>
          					<td>{{ $tank->name }}</td>
          					<td>{{ $tank->product->name }}</td>
          					<td>{{ $tank->capacity }}</td>
          					<td>{{ $tank->status == 1 ? 'Active' : 'No active' }}</td>
          					<td>{{ $tank->created_at->diffForHumans() }}</td>
          					<td>{{ $tank->updated_at->diffForHumans() }}</td>
                  	
                  	<td><a href="{{ url('admin/tanks/'.$tank->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['TankController@destroy',$tank->id]]) !!}
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
        </div>
	</div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection