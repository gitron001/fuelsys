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
                  <th colspan="2">Prices</th>
                  <th>Channels</th>
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
                    <td align="center">
                        <a href="{{ route('pfc.command', [$p->id, '3']) }}" data-toggle="tooltip" title="Import Prices" onclick="return confirm('Are you sure?');">
                            <i class="fa fa-arrow-circle-down"></i>
                        </a>
                    </td>
                    <td align="center">
                        <a href="{{ route('pfc.command', [$p->id, '4']) }}" data-toggle="tooltip" title="Upload Prices" onclick="return confirm('Are you sure?');">
                            <i class="fa fa-arrow-circle-up"></i>
                        </a>
                    </td>
                    <td align="center">
                        <a href="{{ route('pfc.command', [$p->id, '2']) }}" data-toggle="tooltip" title="Import Channels" onclick="return confirm('Are you sure?');">
                            <i class="fa fa-arrow-circle-down"></i>
                        </a>
                    </td>
                    <td class="text-center" width="8%">
                        <a href="{{ route('pfc.command', [$p->id, '5']) }}" data-toggle="tooltip" title="Restart PFC" onclick="return confirm('Are you sure?');">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                      <a href="{{ url('admin/pfc/'.$p->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                      <a href="{{ route('pfc.delete', $p->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
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

@include('includes/footer')
