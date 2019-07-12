@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Products</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/products/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new product</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="sorting" data-sorting_type="asc" data-column_name="name">Name <span id="name_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="price">Price <span id="price_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="product_group_id">Product Group <span id="product_group_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="vat">Vat <span id="vat_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="pfc_id">PFC <span id="pfc_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @include('admin.products.table_data')
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
