@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">Users</h3></div>
				<div class="col-md-12">
			
                <form class="form-inline text-center pull-right" method="GET" action="{{ URL::to('/admin/users') }}">
                  @include('includes.search_filter')
                  <a href="{{ url('admin/uploadExcel') }}" data-toggle="tooltip" class="btn btn-success pull-right" style="margin-left: 0.5em;" title="Upload Excel"><i class="fa fa-upload"></i> Upload Excel</a>
				  <a href="{{ url('admin/users/create') }}" data-toggle="tooltip" class="btn btn-success pull-right" style="margin-left: 0.5em;" title="Create new user"><i class="fa fa-plus"></i> New User</a>
                </form>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="sorting" data-sorting_type="asc" data-column_name="name">Name <span id="name_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="email">Email <span id="email_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="rfid">RFID <span id="rfid_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="company_id">Company <span id="company_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="one_time_plate">One time limit <span id="one_time_limit_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="plates">Plates <span id="plates_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="vehicle">Vehicle <span id="vehicle_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @include('admin.users.table_data')
                </tfoot>
              </table>
              @include('includes.hidden_inputs')
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
