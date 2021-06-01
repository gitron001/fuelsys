@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">{{ trans('adminlte::adminlte.nozzle') }}</h3></div>
              <div class="col-md-4">

                <form class="form-inline text-center pull-right" method="GET" action="{{ URL::to('/admin/nozzle') }}">
                  @include('includes.search_filter')
                  <a data-toggle="tooltip" class="btn btn-danger" id="delsel" title="{{ trans('adminlte::adminlte.nozzle_details.delete_all') }}"><i class="fa fa-trash"></i> {{ trans('adminlte::adminlte.delete') }}</a>
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
                    <th class="sorting" data-sorting_type="asc" data-column_name="tank_id">{{ trans('adminlte::adminlte.tank') }} <span id="tank_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="dispaneser_id">{{ trans('adminlte::adminlte.dispenser') }} <span id="dispaneser_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        			<th class="sorting" data-sorting_type="asc" data-column_name="status">{{ trans('adminlte::adminlte.nozzle_details.starting_totalizer') }} <span id="status_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        			<th class="sorting" data-sorting_type="asc" data-column_name="status">{{ trans('adminlte::adminlte.status') }} <span id="status_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
        			<th class="sorting" data-sorting_type="asc" data-column_name="created_at">{{ trans('adminlte::adminlte.created_at') }} <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">{{ trans('adminlte::adminlte.updated_at') }} <span id="updated_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="text-center">{{ trans('adminlte::adminlte.options') }}</th>
                </tr>
                </thead>
                <tbody>
                  @include('admin.nozzle.table_data')
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
