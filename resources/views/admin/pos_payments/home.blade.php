@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans('adminlte::adminlte.pos_sales') }}</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/pos-payments') }}">
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
                        <label for="End Date:">{{ trans('adminlte::adminlte.banks') }}:</label>
                        <select class="form-control" id="bank" name="bank">
                            <option value="">Select product</option>
                            @foreach($banks as $bank)
                            <option value="{{ $bank->id }}" @if(request()->get("bank") == $bank->id) selected
                                @endif>{{ $bank->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search"><i
                        class="fa fa-search"></i> Search</button>
                        <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-warning" title="Clear All Filters"><i class="fa fa-recycle"></i> Clear All</a>
                    <a href="{{ route('generate_pos_pdf', ['fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'bank' => request()->get("bank")] ) }}"
                            target="_blank" data-toggle="tooltip" class="btn btn-danger" title="Export PDF"><i
                                class="fas fa-file-pdf"></i> PDF</a>
                    <button type="button" data-toggle="tooltip" class="btn btn-success" id="export_pos_excel"
                            title="Export Excel"><i class="fas fa-file-excel"></i> Excel</button>

                    <a href="{{ url('admin/pos-payments/create') }}" data-toggle="tooltip"
                        class="btn btn-success pull-right" style="margin-left: 0.5em;"
                        title="{{ trans('adminlte::adminlte.pos_payment_details.create_new') }}"><i
                            class="fa fa-plus"></i> {{ trans('adminlte::adminlte.new') }}</a>
                </form>
                <br>
                <table id="example2 orders" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th style="text-align:center;"><input type="checkbox" id="checkall"
                                    class="checkbox-select-all"></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="date">
                                {{ trans('adminlte::adminlte.date') }} <span id="date_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="bank_id">
                                {{ trans('adminlte::adminlte.banks') }} <span id="bank_id_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="amount">
                                {{ trans('adminlte::adminlte.amount') }} <span id="amount_icon"
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
                        @include('admin.pos_payments.table_data')
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
