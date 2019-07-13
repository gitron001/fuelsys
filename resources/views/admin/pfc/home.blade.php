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
                  <th class="sorting" data-sorting_type="asc" data-column_name="name">Name <span id="name_icon" style="float:right;" class="removePrevIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="ip">IP <span id="ip_icon" style="float:right;" class="removePrevIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="port">Port <span id="port_icon" style="float:right;" class="removePrevIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" style="float:right;" class="removePrevIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon" style="float:right;" class="removePrevIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th colspan="2" class="text-center">Prices</th>
                  <th class="text-center">Channels</th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                    @include('admin.pfc.table_data')
                </tbody>
              </table>
              @include('includes.hidden_inputs')
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
@endsection

@include('includes/footer')
