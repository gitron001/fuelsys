@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">{{ trans('adminlte::adminlte.transactions_details.name') }}</h3>
    </div>
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/transactions') }}">

                <div class="form-group">
                    <label for="Start Date:">{{ trans('adminlte::adminlte.start_date') }}:</label>
                    <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate"
                        value="{{ request()->get("fromDate") }}">
                </div>

                <div class="form-group">
                    <label for="End Date:">{{ trans('adminlte::adminlte.end_date') }}:</label>
                    <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate"
                        value="{{ request()->get("toDate") }}">
                </div>

                <div class="form-group">
                    <label for="User:">{{ trans('adminlte::adminlte.user') }}:</label>
                    <select class="users-dropdown form-control" name="user[]" multiple="multiple" id="user">
                        @foreach($users as $id => $name)
                        <option value="{{ $id }}" @if(!empty( request()->get("user") ))
                            @foreach( request()->get("user") as $us)
                            {{ $us == $id ? 'selected' : '' }}
                            @endforeach
                            @endif > {{ $name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="User:">{{ trans('adminlte::adminlte.bonus_user') }}:</label>
                    <select class="bonus_user_select form-control" style="width:150px;" multiple="multiple"
                        name="bonus_user[]" id="bonus_user"></select>
                </div>

                <div class="form-group">
                    <label for="User:">{{ trans('adminlte::adminlte.company') }}:</label>
                    <select class="selectpicker form-control" id="company" name="company" data-live-search="true"
                        data-style="btn-dropdownSelectNew">
                        <option value="">Choose a Company</option>
                        @foreach($companies as $id => $name)
                        <option value="{{ $id }}" {{ ( request()->get("company") == $id ? "selected":"") }}>{{ $name }}
                        </option>
                        @endforeach
                    </select>
                </div>&nbsp;
                <a href="#" class="show_hide_transactions_filters"><i id="button-hide-show" class="fa fa-chevron-down"></i></a>
                <br>
                <div id="show_hide_filters" style="display: none;">
                <div class="form-group">
                    <input type="checkbox" name="last_payment" id="last_payment"
                        {{ request()->get("last_payment") == 'Yes' ? 'checked' : ''}}>
                    {{ trans('adminlte::adminlte.transactions_details.from_last_payment') }}<br>
                </div>&nbsp;

                <div class="form-group">
                    <input type="checkbox" name="inc_transactions" id="inc_transactions"
                        {{ request()->get("inc_transactions") == 'Yes' ? 'checked' : ''}}>
                    {{ trans('adminlte::adminlte.transactions_details.inc_transactions') }}<br>
                </div>&nbsp;

                <div class="form-group">
                    <input type="checkbox" name="exc_balance" id="exc_balance"
                        {{ request()->get("exc_balance") ? 'checked' : ''}}>
                    {{ trans('adminlte::adminlte.transactions_details.exc_balance') }}<br>
                </div>&nbsp;

                <div class="form-group">
                    <input type="checkbox" name="all_day" id="all_day"
                        {{ request()->get("all_day") == 'Yes' ? 'checked' : ''}}>
                    {{ trans('adminlte::adminlte.transactions_details.all_day') }}<br>
                </div>&nbsp;
                </div>
                <div class="form-group" style="padding-top: 5px;">
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" id="search" title="Search"><i
                            class="fa fa-search"></i></button>
                    <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-warning"
                        title="Clear All Filters"><i class="fa fa-trash"></i></a>
                    <button type="button" data-toggle="tooltip" class="btn btn-success" id="exportEXCEL"
                        title="Export Excel"><i class="fas fa-file-excel" id="btn-logo"></i><i id="spiner"
                            class="fa fa-spinner fa-spin" style="font-size:12px; display:none;"></i></button>
                    <a href="{{ route('generate_pdf/pdf', ['company' => request()->get("company"),'user' => request()->get("user"),'fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'inc_transactions' => request()->get("inc_transactions"),'exc_balance' => request()->get("exc_balance"),'bonus_user' => request()->get("bonus_user"),'last_payment' => request()->get("last_payment")] ) }}"
                        target="_blank" data-toggle="tooltip" class="btn btn-danger" title="Export PDF"><i
                            class="fas fa-file-pdf"></i></a>
                    <button type="button" data-toggle="tooltip" class="btn btn-info" id="dailyReport"
                        title="Daily Report"><i class="far fa-envelope"></i></button>
                    <button type="button" data-toggle="tooltip" class="btn bg-purple" id="sendReportToEmail"
                        title="Send raport to email"><i class="fas fa-paper-plane"></i></button>
                    <a href="{{ route('generate_invoice/invoice', ['company' => request()->get("company"),'user' => request()->get("user"),'fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'inc_transactions' => request()->get("inc_transactions"),'exc_balance' => request()->get("exc_balance"),'bonus_user' => request()->get("bonus_user"),'last_payment' => request()->get("last_payment")] ) }}"
                        target="_blank" data-toggle="tooltip" class="btn bg-maroon" title="Show Invoice"><i
                            class="fas fa-file-invoice"></i></a>
                </div>

            </form>

            <br>


            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="sorting" data-sorting_type="asc" data-column_name="user_id">
                                    {{ trans('adminlte::adminlte.user') }} <span id="user_id_icon"
                                        class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="company_id">
                                    {{ trans('adminlte::adminlte.company') }} <span id="company_id_icon"
                                        class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="#">
                                    {{ trans('adminlte::adminlte.transactions_details.bonus_driver_card') }} <span
                                        id="#" class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="product_id">
                                    {{ trans('adminlte::adminlte.product') }} <span id="product_id_icon"
                                        class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="price">
                                    {{ trans('adminlte::adminlte.price') }} <span id="price_icon"
                                        class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="lit">
                                    {{ trans('adminlte::adminlte.lit') }} <span id="lit_icon"
                                        class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="money">
                                    {{ trans('adminlte::adminlte.total') }} <span id="money_icon"
                                        class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="created_at">
                                    {{ trans('adminlte::adminlte.created_at') }} <span id="created_at_icon"
                                        class="removePrevIcon sortIcon"><span
                                            class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th>{{ trans('adminlte::adminlte.options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.transactions.table_data')
                        </tbody>
                    </table>
                    @include('includes.hidden_inputs')
                </div>
            </div>

            <div class="modal fade" id="show-transaction-history">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')

