<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>{{ $company->name }}</title>

    <style type="text/css">
        * {
            font-family: "Source Sans Pro", "Arial", sans-serif;
        }

        table {
            font-size: x-small;
        }

        th {
            color: white;
            border: 1px solid black;
        }

        tfoot tr td {
            font-size: x-small;
        }

        h4 {
            text-align: center;
        }

        .blue {
            background-color: white;
            border: 1px solid black;
        }

        .font-color {
            color: black;
        }

        #footer{
            height: 50px;
            position:fixed;
            margin:0px;
            bottom:10px;
        }

    </style>

</head>

<body>
    <div class="col-xs-12">
        <table width="100%">
            <tr>
                <td align="left">
                    <h1 class="page-header">{{ $company->name }}</h1>
                    <p style="line-height:1.2; font-size: 13px;">
                        <span><b>{{ trans('adminlte::adminlte.address') }}:</b> {{ $company->city }}, {{ $company->country }}</span><br />
                        <span><b>{{ trans('adminlte::adminlte.email') }}:</b> {{ $company->email }}</span><br />
                        <span><b>{{ trans('adminlte::adminlte.phone') }}:</b> {{ $company->tel_number }}</span><br />
                        @if($company->bis_number != 0){{ trans('adminlte::adminlte.bis_number') }}: {{ $company->bis_number }}<br>@endif
                        @if($company->fis_number != 0){{ trans('adminlte::adminlte.fis_number') }}: {{ $company->fis_number }}<br>@endif
                        @if($company->tax_number != 0){{ trans('adminlte::adminlte.tax_number') }}: {{ $company->tax_number }}@endif
                    </p>
                </td>

                <td align="right">
                    <h1 class="page-header">{{ strtoupper(trans('adminlte::adminlte.invoice')) }} {{ isset($invoice_id) ? '#'.$invoice_id : ''}}</h1>
                    <p style="line-height:1.2; font-size: 13px;">
                        <span><b>{{ trans('adminlte::adminlte.date') }}: </b> {{ isset($date) ? date('d-m-Y H:i', $date) : date('d-m-Y H:i') }}</span><br />
                        <span><b>{{ trans('adminlte::adminlte.company') }}:</b> {{ $to_company ? $to_company->name : '_________________________' }}</span><br/>
                        <span><b>{{ trans('adminlte::adminlte.address') }}:</b> {{ $to_company ? $to_company->city .','. $to_company->country : '_________________________'}}</span><br />
                        <span><b>{{ trans('adminlte::adminlte.email') }}:</b> {{ $to_company ? $to_company->email : '_________________________'}}</span><br/>
                        <span><b>{{ trans('adminlte::adminlte.phone') }}:</b> {{ $to_company ? $to_company->tel_number : '_________________________'}}</span><br/>
                    </p>
                </td>
            </tr>

        </table>
    </div>
    <br>

	<br>

	<!--<table width="100%">
        <thead style="background-color:#122E57;">
            <tr>
                <th align="center">{{ trans('adminlte::adminlte.product') }}</th>
                <th align="center">{{ trans('adminlte::adminlte.lit') }}</th>
                <th align="center">{{ trans('adminlte::adminlte.price_without_tax') }}</th>
                <th align="center">{{ trans('adminlte::adminlte.tax') }}</th>
                <th align="center">{{ trans('adminlte::adminlte.price') }}</th>
                <th align="center">{{ trans('adminlte::adminlte.total_with_tax') }}</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach($total_transactions as $transactions)
            <tr>
                <td align="center">{{ $transactions['product_name'] }}</td>
                <td align="center">{{ $transactions['lit'] }} litra</td>
                <td align="center">€ {{ number_format(($transactions['price'] / (1 + 0.18)), 2) }}</td>
                <td align="center">€
                    {{ number_format(( $transactions['price'] - ( $transactions['price'] / (1 + 0.18) ) ), 2) }}
                </td>
                <td align="center">€ {{ $transactions['price'] }}</td>
                <td align="right">€ {{ $transactions['money'] }}</td>
            </tr>
            @php $total += $transactions['money'] @endphp
            @endforeach
            <tr>
                <td colspan="4"></td>
                <td align="right">{{ trans('adminlte::adminlte.taxable_value') }}:</td>
                <td align="right" class="blue font-color"> <b>€
                    {{ number_format(($total / (1 + 0.18)), 2) }}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td align="right">{{ trans('adminlte::adminlte.tax') }} (18%)</td>
                <td align="right" class="blue font-color"> <b>€
                    {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td align="right">{{ trans('adminlte::adminlte.total') }}:</td>
                <td align="right" class="blue font-color"> <b>€ {{ $total }}</b></td>
            </tr>
        </tbody>
    </table>

    <!--<table width="50%;border: 1px black solid;margin-top:-4%;">
        <thead style="background-color: #122E57">
            <tr>
                <th align="left;">{{ strtoupper(trans('adminlte::adminlte.comment')) }}</th>
            </tr>
        </thead>
        <tr>
            <td>
                <p style="line-height:1.2">
                    <p style="line-height:1.2; font-size: 12px;"">
                    <span>1.{{ trans('adminlte::adminlte.payment_due_in_30_days') }}</span><br/>
                    <span>2.{{ trans('adminlte::adminlte.invoice_number_payment_method') }}</span><br/>
                </p>
            </td>
        </tr>
        <tr>
            <td align="left">
                <p style="line-height:1.2">
                    <p style="line-height:1.2; font-size: 12px;"">
                    @foreach($banks as $bank)
                        <span><b>{{ $bank->name }}:</b> {{ $bank->bank_number }}</span><br>
                    @endforeach
                </p>
            </td>
        </tr>
    </table>-->

    <!-- PAGE 2 -->
    <!--<div style="page-break-before: always;"></div>-->
    <div>
        <table width="100%">
            <thead>
                <tr style="border: 1pt solid black;">
                    <th align="center" style="color:black;">{{ trans('adminlte::adminlte.date') }}</th>
                    <th align="center" style="color:black;">{{ trans('adminlte::adminlte.product') }}</th>
                    <th align="center" style="color:black;">{{ trans('adminlte::adminlte.lit') }}</th>
                    <th align="center" style="color:black;">{{ trans('adminlte::adminlte.price_without_tax') }}</th>
                    <th align="center" style="color:black;">{{ trans('adminlte::adminlte.tax') }}</th>
                    <th align="center" style="color:black;">{{ trans('adminlte::adminlte.price') }}</th>
                    <th align="center" style="color:black;">{{ trans('adminlte::adminlte.total_with_tax') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach($all_transactions as $transactions)
                <tr>
                    <td align="center">{{ date('m/d/Y H:i', $transactions['date']) }}</td>
                    <td align="center">{{ $transactions['product_name'] }}</td>
                    <td align="center">{{ $transactions['lit'] }} litra</td>
                    <td align="center">€ {{ number_format(($transactions['price'] / (1 + 0.18)), 2) }}</td>
                    <td align="center">€
                        {{ number_format(( $transactions['price'] - ( $transactions['price'] / (1 + 0.18) ) ), 2) }}
                    </td>
                    <td align="center">€ {{ $transactions['price'] }}</td>
                    <td align="right">€ {{ $transactions['money'] }}</td>
                </tr>
                @php $total += $transactions['money'] @endphp
                @endforeach
                <tr>
                    <td colspan="5"></td>
                    <td align="right">{{ trans('adminlte::adminlte.taxable_value') }}:</td>
                    <td align="right" class="blue font-color"> <b>€
                        {{ number_format(($total / (1 + 0.18)), 2) }}</b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right">{{ trans('adminlte::adminlte.tax') }} (18%)</td>
                    <td align="right" class="blue font-color"> <b>€
                        {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right">{{ trans('adminlte::adminlte.total') }}:</td>
                    <td align="right" class="blue font-color"> <b>€ {{ $total }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--<table width="50%;border: 1px black solid;margin-top:-4%;">
        <thead style="background-color: #122E57">
            <tr>
                <th align="left;">{{ strtoupper(trans('adminlte::adminlte.comment')) }}</th>
            </tr>
        </thead>
        <tr>
            <td>
                <p style="line-height:1.2">
                    <p style="line-height:1.2; font-size: 12px;"">
                    <span>1.{{ trans('adminlte::adminlte.payment_due_in_30_days') }}</span><br/>
                    <span>2.{{ trans('adminlte::adminlte.invoice_number_payment_method') }}</span><br/>
                </p>
            </td>
        </tr>
        <tr>
            <td align="left">
                <p style="line-height:1.2">
                    <p style="line-height:1.2; font-size: 12px;"">
                    @foreach($banks as $bank)
                        <span><b>{{ $bank->name }}:</b> {{ $bank->bank_number }}</span><br>
                    @endforeach
                </p>
            </td>
        </tr>
    </table>-->


    <div id="footer">
        <p style="text-align:left; padding-left: 3%;">
            {{ trans('adminlte::adminlte.signature') }}
            <span style="text-align:center; padding-left: 32%;">
                M.P.
            </span>
            <span style="float:right; padding-right: 4%;">
            {{ trans('adminlte::adminlte.seal') }}
            </span>
        </p>

        <p style="text-align:left;">
            _______________
            <span style="float:right;">
            _______________
            </span>
        </p>
    </div>
</body>
</html>
