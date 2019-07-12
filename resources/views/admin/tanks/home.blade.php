@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Tanks</h3></div>
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
        					<th class="sorting" data-sorting_type="asc" data-column_name="name">Name <span id="name_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="product_id">Product <span id="product_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="capacity">Capacity <span id="capacity_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="status">Status <span id="status_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @include('admin.tanks.table_data')
                </tbody>
              </table>
              @include('includes.hidden_inputs')
            </div>
        </div>
	</div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')