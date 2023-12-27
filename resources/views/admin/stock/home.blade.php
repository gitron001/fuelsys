@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans('adminlte::adminlte.stock') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/stock') }}">
                    <div class="form-group">
                        <label for="Start Date:">{{ trans('adminlte::adminlte.start_date') }}:</label>
                        <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate"
                            value="{{ request()->get('fromDate')}}">
                    </div>

                    <div class="form-group">
                        <label for="End Date:">{{ trans('adminlte::adminlte.end_date') }}:</label>
                        <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate"
                            value="{{ request()->get('toDate')}}">
                    </div>

                    <div class="form-group">
                        <label for="End Date:">{{ trans('adminlte::adminlte.products') }}:</label>
                        <select class="form-control" id="product" name="product">
                            <option value="">Select product</option>
                            @foreach($products as $product)
                            <option value="{{ $product->pfc_pr_id }}" @if(request()->get("product") == $product->pfc_pr_id) selected
                                @endif>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Reference Number:">{{ trans('adminlte::adminlte.reference_number') }}:</label>
                        <input class="form-control" id="reference_number" autocomplete="off" type="text" name="reference_number"
                            value="{{ request()->get('reference_number')}}" placeholder="Reference number">
                    </div>
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search"><i
                            class="fa fa-search"></i> Search</button>
                    <a href="{{ route('generate_stock_pdf', ['fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'product' => request()->get("product"),'reference_number' => request()->get("reference_number")] ) }}"
                        target="_blank" data-toggle="tooltip" class="btn btn-danger" title="Export PDF"><i
                            class="fas fa-file-pdf"></i></a>
                    <button type="button" data-toggle="tooltip" class="btn btn-success" id="export_stock_excel"
                        title="Export Excel"><i class="fas fa-file-excel"></i></button>
                    <a data-toggle="tooltip" class="btn btn-danger" id="delsel"
                        title="{{ trans('adminlte::adminlte.stock_details.delete_all') }}"><i class="fa fa-trash"></i>
                        {{ trans('adminlte::adminlte.delete') }}</a>
                    <a href="{{ url('admin/stock/create') }}" data-toggle="tooltip" class="btn btn-success"
                        title="{{ trans('adminlte::adminlte.stock_details.create_new') }}"><i class="fa fa-plus"></i>
                        {{ trans('adminlte::adminlte.new') }}</a>
                </form>
                <br>
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th style="text-align:center;"><input type="checkbox" id="checkall"
                                    class="checkbox-select-all"></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="date">
                                {{ trans('adminlte::adminlte.date') }} <span id="date_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="tank_id">
                                {{ trans('adminlte::adminlte.stock_details.tank_product') }} <span id="tank_id_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="amount">
                                {{ trans('adminlte::adminlte.amount') }} <span id="amount_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="reference_number">
                                {{ trans('adminlte::adminlte.reference_number') }} <span id="reference_number_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="created_at">
                                {{ trans('adminlte::adminlte.created_at') }} <span id="created_at_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">
                                {{ trans('adminlte::adminlte.updated_at') }} <span id="updated_at_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="text-center">{{ trans('adminlte::adminlte.options') }}</th>
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
