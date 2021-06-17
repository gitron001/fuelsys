@extends('adminlte::page')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Invoice #{{$invoice->id}}
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
                <small class="pull-right">Date: {{ date('d/m/Y H:i', $invoice->date) }} </small>
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
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->product_name }}</td>
                        <td>{{ $transaction->lit }} litra</td>
                        <td>€ {{ number_format(($transaction->price / (1 + 0.18)), 2) }}</td>
                        <td>€
                            {{ number_format(( $transaction->price - ( $transaction->price / (1 + 0.18) ) ), 2) }}
                        </td>
                        <td>€ {{ $transaction->price }}</td>
                        <td>€ {{ $transaction->money }}</td>
                    </tr>
                    @php $total += $transaction->money @endphp
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
            @foreach($banks as $bank)
                <p>{{ $bank->name }}: {{ $bank->bank_number }}</p>
            @endforeach

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
            <a href="{{ route('invoice.pdf', [$invoice->id]) }}" type="button" class="btn btn-default pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Print
            </a>
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
