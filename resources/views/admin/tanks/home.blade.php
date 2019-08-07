@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">Tanks</h3></div>
              <div class="col-md-4">

                <form class="form-inline text-center pull-right" method="GET" action="{{ URL::to('/admin/tanks') }}">
                  @include('includes.search_filter')
                  <a href="{{ url('admin/tanks/create') }}" data-toggle="tooltip" class="btn btn-success pull-right" style="margin-left: 0.5em;" title="Create new tank"><i class="fa fa-plus"></i> New Tank</a>
                </form>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
        					<th class="sorting" data-sorting_type="asc" data-column_name="name">Name <span id="name_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="product_id">Product <span id="product_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="capacity">Capacity <span id="capacity_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="status">Status <span id="status_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        					<th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
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