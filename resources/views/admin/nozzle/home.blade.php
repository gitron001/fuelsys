@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans('adminlte::adminlte.nozzle') }}</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/nozzle') }}">
                    <div class="form-group">
                        <label for="Name:">{{ trans('adminlte::adminlte.name') }}:</label>
                        <input type="text" class="form-control" name="search" placeholder="Search" @if(request()->get("search")) value="{{ request()->get("search") }}" @endif>
                    </div>

                    <div class="form-group">
                        <label for="Tank:">{{ trans('adminlte::adminlte.tank') }}:</label>
                        <select class="form-control" id="tank" name="tank">
                            <option value="">Select tank</option>
                            @foreach($tanks as $tank)
                            <option value="{{ $tank->id }}" @if(request()->get("tank") == $tank->id) selected
                                @endif>{{ $tank->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Dispenser:">{{ trans('adminlte::adminlte.dispenser') }}:</label>
                        <select class="form-control" id="dispaneser" name="dispaneser">
                            <option value="">Select dispenser</option>
                            @foreach($dispanesers as $dispenser)
                            <option value="{{ $dispenser->id }}" @if(request()->get("dispaneser") == $dispenser->id) selected
                                @endif>{{ $dispenser->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search"><i
                        class="fa fa-search"></i> Search</button>
                        <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-warning" title="Clear All Filters"><i class="fa fa-recycle"></i> Clear All</a>
                </form>
                <br>
                <table id="example2 orders" class="table table-bordered table-hover text-center">
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
            <!-- /.box-body -->
        </div>
    </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
