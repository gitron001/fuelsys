@extends('adminlte::page')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('adminlte::adminlte.invoice') }}
    </h1>
</section>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <img src="{{ file_exists((asset('/images/company/'.$from_company->images))) ? (asset('/images/company/'.$from_company->images)) : (asset('/images/company/fs-icon_1610107943.ico')) }}"
                    style="height: 50px; width: 50px;">{{ $from_company->name }}
                <small class="pull-right">{{ trans('adminlte::adminlte.date') }}: {{ date('Y-m-d')}} </small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
            <address>
                <strong>{{ trans('adminlte::adminlte.company') }}: {{ $from_company->name }}</strong><br>
                {{ trans('adminlte::adminlte.address') }}: {{ $from_company->address .', '. $from_company->city .', '. $from_company->country }}<br>
                {{ trans('adminlte::adminlte.phone') }}: {{ $from_company->tel_number }}<br>
                {{ trans('adminlte::adminlte.email') }}: {{ $from_company->email }}<br>
                {{ trans('adminlte::adminlte.bis_number') }}: {{ $from_company->bis_number }}<br>
                {{ trans('adminlte::adminlte.fis_number') }}: {{ $from_company->fis_number }}<br>
                {{ trans('adminlte::adminlte.tax_number') }}: {{ $from_company->tax_number }}
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col" style="text-align: right">
            <address>
                <strong>{{ trans('adminlte::adminlte.company') }}:{{ $to_company ? $to_company->name : '_________________________' }}</strong><br>
                {{ trans('adminlte::adminlte.address') }}: {{ $to_company ? $to_company->address .', '. $to_company->city .', '. $to_company->country : '_________________________'}}<br>
                {{ trans('adminlte::adminlte.phone') }}: {{ $to_company ? $to_company->tel_number : '_________________________' }}<br>
                {{ trans('adminlte::adminlte.email') }}: {{ $to_company ? $to_company->email : '_________________________' }}<br>
                {{ trans('adminlte::adminlte.fis_number') }}: {{ $to_company ? $to_company->fis_number : '_________________________' }}
            </address>
        </div>
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive" style="text-align: center;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center;">{{ trans('adminlte::adminlte.product') }}</th>
                        <th style="text-align: center;">{{ trans('adminlte::adminlte.lit') }}</th>
                        <th style="text-align: center;">{{ trans('adminlte::adminlte.price_without_tax') }}</th>
                        <th style="text-align: center;">{{ trans('adminlte::adminlte.tax') }}</th>
                        <th style="text-align: center;">{{ trans('adminlte::adminlte.price') }}</th>
                        <th style="text-align: center;">{{ trans('adminlte::adminlte.total_with_tax') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach($total_transactions as $transactions)
                    <tr>
                        <td>{{ $transactions['product_name'] }}</td>
                        <td>{{ $transactions['lit'] }} litra</td>
                        <td>€ {{ number_format(($transactions['price'] / (1 + 0.18)), 2) }}</td>
                        <td>€
                            {{ number_format(( $transactions['price'] - ( $transactions['price'] / (1 + 0.18) ) ), 2) }}
                        </td>
                        <td>€ {{ $transactions['price'] }}</td>
                        <td>€ {{ $transactions['money'] }}</td>
                    </tr>
                    @php $total += $transactions['money'] @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="lead">{{ trans('adminlte::adminlte.banks') }}:</p>
            @foreach($banks as $bank)
                <p>{{ $bank->name }}: {{ $bank->bank_number }}</p>
            @endforeach

            <!--<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                PAGUAR
            </p>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">{{ trans('adminlte::adminlte.total') }}</p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">{{ trans('adminlte::adminlte.taxable_value') }}:</th>
                        <td>€ {{ number_format(($total / (1 + 0.18)), 2) }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('adminlte::adminlte.tax') }} (18%)</th>
                        <td>€ {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('adminlte::adminlte.total') }}:</th>
                        <td>€ {{ $total }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <!--<a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
            <!--<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>-->
            <a href="{{ route('generate_invoice_pdf/invoice_pdf', ['company' => request()->get("company"),'user' => request()->get("user"),'fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'inc_transactions' => request()->get("inc_transactions"),'exc_balance' => request()->get("exc_balance"),'bonus_user' => request()->get("bonus_user"), 'id' => request()->get("id")] ) }}" target="_blank" data-toggle="tooltip" class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="return confirmation(event)"><i class="fa fa-file-invoice"></i> {{ trans('adminlte::adminlte.generate_bill') }}</a>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>


@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
