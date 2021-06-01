@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box box-primary">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">{{ trans('adminlte::adminlte.product_group') }}</h3></div>
              <div class="col-md-6">

                <form class="form-inline text-center pull-right" method="GET" action="{{ URL::to('/admin/products_group') }}">
                  @include('includes.search_filter')
                  <a href="{{ url('admin/products_group/create') }}" data-toggle="tooltip" class="btn btn-success pull-right" style="margin-left: 0.5em;" title="{{ trans('adminlte::adminlte.product_group_details.create_new') }}"><i class="fa fa-plus"></i> {{ trans('adminlte::adminlte.new') }}</a>
                  <a data-toggle="tooltip" class="btn btn-danger" id="delsel" title="{{ trans('adminlte::adminlte.product_group_details.delete_all') }}"><i class="fa fa-trash"></i> {{ trans('adminlte::adminlte.delete') }}</a>
                </form>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="checkall" class="checkbox-select-all"></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="name">{{ trans('adminlte::adminlte.name') }} <span id="name_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="state_code">{{ trans('adminlte::adminlte.state_code') }} <span id="state_code_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="created_at">{{ trans('adminlte::adminlte.created_at') }} <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">{{ trans('adminlte::adminlte.updated_at') }} <span id="updated_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="text-center">{{ trans('adminlte::adminlte.options') }}</th>
                </tr>
                </thead>
                <tbody>
                  @include('admin.products_group.table_data')
                </tbody>
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
