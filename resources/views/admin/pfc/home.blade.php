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
                  <th>Import Channels</th>
                  <th>Update Prices</th>
                  <th>Import Prices</th>
                  <th>Options</th>
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
                    <td>
                        {!! Form::open(['method' => 'ImportChannel', 'route' => ['admin/pfc/import_data',$p->id, '2']]) !!}
                            <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-block btn-success">Import Channels</button>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'UpdatePrice', 'route' => ['admin/pfc/import_data',$p->id, '4']]) !!}
                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-block btn-success">Update Prices</button>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'ImportPrice', 'route' => ['admin/pfc/import_data',$p->id, '3']]) !!}
                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-block btn-success">Import Prices</button>
                        {!! Form::close() !!}
                    </td>
                    <td width="12%">
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Options</button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li class="text-center"><a href="{{ url('admin/pfc/'.$p->id.'/edit') }}"><i class="fa fa-edit"></i></button>Edit</a></li>
                          <li class="divider"></li>
                          <li>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['PFCController@destroy',$p->id]]) !!}
                              {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete',['class'=>'btn btn-block btn-danger delete-item']); !!}
                            {!! Form::close() !!}
                          </li>
                        </ul>
                      </div>
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
