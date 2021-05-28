@extends('adminlte::page')

@section('content')

@include('includes/alert_info')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">{{ trans('adminlte::adminlte.expenses') }}</h3>
    </div>
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/expenses') }}">
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
                    <label for="User:">{{ trans('adminlte::adminlte.user') }}:</label>
                    <select class="users-dropdown form-control" name="user[]" multiple="multiple" id="user">
                        @foreach($users as $id => $name)
                        <option value="{{ $id }}" @if(!empty( request()->get("user")))
                            @foreach( request()->get("user") as $us)
                            {{ $us == $id ? 'selected' : '' }}
                            @endforeach
                            @endif > {{ $name }} </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search"><i
                        class="fa fa-search"></i> Search</button>
                <a data-toggle="tooltip" class="btn btn-danger" id="delsel" title="{{ trans('adminlte::adminlte.expenses_details.delete_all') }}"><i
                        class="fa fa-trash"></i> {{ trans('adminlte::adminlte.delete') }}</a>
                <a href="{{ url('admin/expenses/create') }}" data-toggle="tooltip" class="btn btn-success" title="{{ trans('adminlte::adminlte.expenses_details.create_new') }}"><i class="fa fa-plus"></i> {{ trans('adminlte::adminlte.new') }}</a>
            </form>

            <br>

            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <th style="text-align:center;"><input type="checkbox" id="checkall" class="checkbox-select-all">
                        </th>
                        <th class="sorting" data-sorting_type="asc" data-column_name="date">{{ trans('adminlte::adminlte.date') }} <span id="date_icon"
                                class="removePrevIcon sortIcon"><span
                                    class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                        <th class="sorting" data-sorting_type="asc" data-column_name="user_id">{{ trans('adminlte::adminlte.user') }} <span
                                id="user_id_icon" class="removePrevIcon sortIcon"><span
                                    class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                        <th class="sorting" data-sorting_type="asc" data-column_name="amount">{{ trans('adminlte::adminlte.amount') }} <span
                                id="amount_icon" class="removePrevIcon sortIcon"><span
                                    class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                        <th class="sorting" data-sorting_type="asc" data-column_name="created_by">{{ trans('adminlte::adminlte.expenses_details.created_by') }} <span
                                id="created_at_icon" class="removePrevIcon sortIcon"><span
                                    class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                        <th class="sorting" data-sorting_type="asc" data-column_name="created_at">{{ trans('adminlte::adminlte.created_at') }} <span
                                id="created_at_icon" class="removePrevIcon sortIcon"><span
                                    class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                        <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">{{ trans('adminlte::adminlte.updated_at') }} <span
                                id="updated_at_icon" class="removePrevIcon sortIcon"><span
                                    class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                        <th class="text-center">{{ trans('adminlte::adminlte.options') }}</th>
                    </thead>
                    <tbody>
                        @include('admin.expenses.table_data')
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
