@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">PFC</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/pfc/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new PFC</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>IP</th>
                  <th>Port</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Import Pumps</th>
                  <th>Update Prices</th>
                  <th>Import Prices</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pfc as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->ip }}</td>
                    <td>{{ $p->port }}</td>
                    <td>{{ $p->created_at->diffForHumans() }}</td>
                    <td>{{ $p->updated_at->diffForHumans() }}</td>
                    <td><a href="{{ url('admin/pfc/'.$p->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                        {!! Form::open(['method'=>'/admin/pfc/import_prices', 'action'=>['PFCController@import_data',$p->id, '2']]) !!}
                        <div class="form-group">
                            {!! Form::button('Import Channels', ['class'=>'btn btn-block btn-success']); !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method'=>'/admin/pfc/import_prices', 'action'=>['PFCController@import_data',$p->id, '3']]) !!}
                        <div class="form-group">
                            {!! Form::button('Update Prices', ['class'=>'btn btn-block btn-success']); !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method'=>'/admin/pfc/import_prices', 'action'=>['PFCController@import_data',$p->id, '4']]) !!}
                        <div class="form-group">
                            {!! Form::button('Import Prices', ['class'=>'btn btn-block btn-success']); !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['PFCController@destroy',$p->id]]) !!}
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
                {{ $pfc->links() }}
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
