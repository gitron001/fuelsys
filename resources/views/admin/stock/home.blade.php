@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">Stock</h3></div>
              <div class="col-md-4">

                <form class="form-inline text-center pull-right" method="GET" action="{{ URL::to('/admin/stock') }}">
                  <a href="{{ url('admin/stock/create') }}" data-toggle="tooltip" class="btn btn-success pull-right" style="margin-left: 0.5em;" title="Create new tank"><i class="fa fa-plus"></i> New</a>
                  <a data-toggle="tooltip" class="btn btn-danger" id="delsel" title="Delete all selected tanks"><i class="fa fa-trash"></i> Delete</a>
                </form>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="checkall" class="checkbox-select-all"></th>
        			<th class="sorting" data-sorting_type="asc" data-column_name="date">Date <span id="date_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        			<th class="sorting" data-sorting_type="asc" data-column_name="tank_id">Tank | Product <span id="tank_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        			<th class="sorting" data-sorting_type="asc" data-column_name="amount">Amount <span id="amount_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        			<th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @include('admin.stock.table_data')
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