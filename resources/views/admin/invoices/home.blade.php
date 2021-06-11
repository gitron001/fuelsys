@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <div class="col-md-8">
                    <h3 class="box-title">{{ trans('adminlte::adminlte.invoices') }}</h3>
                </div>
                <div class="col-md-4">

                    <form class="form-inline text-center pull-right" method="GET"
                        action="{{ URL::to('/admin/invoices') }}">
                        @include('includes.search_filter')
                    </form>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="sorting" data-sorting_type="asc" data-column_name="id">
                                ID <span id="id_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="date">
                                {{ trans('adminlte::adminlte.date') }} <span id="date_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="user_id">
                                {{ trans('adminlte::adminlte.user') }} <span id="user_id_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="company_id">
                                {{ trans('adminlte::adminlte.company') }} <span id="company_id_icon"
                                    class="removePrevIcon sortIcon"><span
                                        class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="paid">
                                {{ trans('adminlte::adminlte.paid') }} <span id="paid_icon"
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
                        @include('admin.invoices.table_data')
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
