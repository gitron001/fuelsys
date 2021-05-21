@extends('adminlte::page')

@section('content')


<!--<div class="invoice">
    <div class="dataTables_wrapper form-inline dt-bootstrap text-center">
        <div class="form-group">
            <label for="Start Date:">Start Date:</label>
            <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate"
                value="{{ request()->get("fromDate") }}">
        </div>
        &nbsp;

        <div class="form-group">
            <label for="End Date:">End Date:</label>
            <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate"
                value="{{ request()->get("toDate") }}">
        </div>
        &nbsp;

        <div class="form-group">
            <label for="User:">Company:</label>
            <select class="selectpicker form-control" id="company" name="company" data-live-search="true"
                data-style="btn-dropdownSelectNew">
                <option value="">Choose a Company</option>
                @foreach($companies as $id => $name)
                <option value="{{ $id }}" {{ ( request()->get("company") == $id ? "selected":"") }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        &nbsp;

        <a href="{{ route('generate_invoice/invoice', ['company' => request()->get("company"),'user' => request()->get("user"),'fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'inc_transactions' => request()->get("inc_transactions"),'exc_balance' => request()->get("exc_balance"),'bonus_user' => request()->get("bonus_user")] ) }}" data-toggle="tooltip" class="btn btn-primary" title="Show Invoice"><i class="fas fa-search"></i> Search</a>
    </div>
</div>-->


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Invoice
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
                <small class="pull-right">Date: {{ date('Y-m-d')}} </small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
            <address>
                <strong>{{ $from_company->name }}</strong><br>
                {{ $from_company->address .', '. $from_company->city .', '. $from_company->country }}<br>
                Phone: {{ $from_company->tel_number }}<br>
                Email: {{ $from_company->email }}<br>
                Bus.Nr.: {{ $from_company->bis_number }}<br>
                Fiscal Nr.: {{ $from_company->fis_number }}<br>
                TVSH Nr.: {{ $from_company->tax_number }}
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col" style="text-align: right">
            <address>
                <strong>{{ $to_company->name }}</strong><br>
                {{ $to_company->address .', '. $to_company->city .', '. $to_company->country }}<br>
                Phone: {{ $to_company->tel_number }}<br>
                Email: {{ $to_company->email }}<br>
                Fiscal Nr.: {{ $from_company->fis_number }}
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
                        <th style="text-align: center;">Artikulli</th>
                        <th style="text-align: center;">Sasia</th>
                        <th style="text-align: center;">Çmimi pa TVSH</th>
                        <th style="text-align: center;">TVSH</th>
                        <th style="text-align: center;">Çmimi</th>
                        <th style="text-align: center;">Shuma me TVSH</th>
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
            <p class="lead">Bankat:</p>
            <p>BKT: 100200300400</p>
            <p>RBKO: 100200300400</p>
            <p>PBC: 100200300400</p>

            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                PAGUAR
            </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Totali</p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Vlera e Tatueshme:</th>
                        <td>€ {{ number_format(($total / (1 + 0.18)), 2) }}</td>
                    </tr>
                    <tr>
                        <th>TVSH (18%)</th>
                        <td>€ {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</td>
                    </tr>
                    <tr>
                        <th>Shuma:</th>
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
            <a href="{{ route('generate_invoice_pdf/invoice_pdf', ['company' => request()->get("company"),'user' => request()->get("user"),'fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'inc_transactions' => request()->get("inc_transactions"),'exc_balance' => request()->get("exc_balance"),'bonus_user' => request()->get("bonus_user")] ) }}" target="_blank" data-toggle="tooltip" class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="return confirmation(event)"><i class="fa fa-download"></i> Generate PDF</a>
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
