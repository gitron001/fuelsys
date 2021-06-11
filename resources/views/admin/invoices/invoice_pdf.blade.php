<!Doctype html>
<?php if(!isset($bonus_user)){ $bonus_user = NULL; } ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
        }

        tfoot tr td {
            font-size: x-small;
        }

        h4 {
            text-align: center;
        }

        .blue {
            background-color: #122E57;
        }

        .font-color {
            color: white;
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
                        <span><b>Lokacioni:</b> {{ $company->city }}, {{ $company->country }}</span><br />
                        <span><b>Email:</b> {{ $company->email }}</span><br />
                        <span><b>Tel.:</b> {{ $company->tel_number }}</span><br />
                        <span><b>Nr.Biz.:</b> {{ $company->bis_number }}</span><br />
                        <span><b>Tax.Nr.:</b> {{ $company->tax_number }}</span><br />
                        <span><b>Nr.Fis.:</b> {{ $company->fis_number }}</span><br />
                    </p>
                </td>

                <td align="right">
                    <h1 class="page-header">INVOICE {{ isset($invoice_id) ? '#'.$invoice_id : ''}}</h1>
                    <p style="line-height:1.2; font-size: 13px;">
                        <span><b>Data: </b> {{ isset($date) ? date('d-m-Y H:i', $date) : date('d-m-Y H:i') }}</span><br />
                        <span><b>Kompania:</b> {{ $to_company->name }}</span><br/>
                        <span><b>Tel.:</b> {{ $to_company->tel_number }}</span>
                    </p>
                </td>
            </tr>

        </table>
    </div>
    <br>

	<br>

	<table width="100%">
        <thead style="background-color:#122E57;">
            <tr>
                <th align="center">Artikulli</th>
                <th align="center">Sasia</th>
                <th align="center">Çmimi pa TVSH</th>
                <th align="center">TVSH</th>
                <th align="center">Çmimi</th>
                <th align="center">Shuma me TVSH</th>
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
                <td align="right">Vlera e Tatueshme:</td>
                <td align="right" class="blue font-color"> <b>€
                    {{ number_format(($total / (1 + 0.18)), 2) }}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td align="right">TVSH (18%)</td>
                <td align="right" class="blue font-color"> <b>€
                    {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td align="right">Shuma:</td>
                <td align="right" class="blue font-color"> <b>€ {{ $total }}</b></td>
            </tr>
        </tbody>
    </table>

    <table width="50%;border: 1px black solid;margin-top:-4%;">
        <thead style="background-color: #122E57">
            <tr>
                <th align="left;">KOMENT</th>
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
                    <span><b>BKT :</b> 00000000000</span><br/>
                    <span><b>RBKO :</b> 00000000000</span><br/>
                    <span><b>PBC :</b> 00000000000</span><br/>
                </p>
            </td>
        </tr>
    </table>

    <!-- PAGE 2 -->
    <div style="page-break-before: always;"></div>

    <table width="100%">
        <thead style="background-color:#122E57;">
            <tr>
                <th align="center">Data</th>
                <th align="center">Artikulli</th>
                <th align="center">Sasia</th>
                <th align="center">Çmimi pa TVSH</th>
                <th align="center">TVSH</th>
                <th align="center">Çmimi</th>
                <th align="center">Shuma me TVSH</th>
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
                <td align="right">Vlera e Tatueshme:</td>
                <td align="right" class="blue font-color"> <b>€
                    {{ number_format(($total / (1 + 0.18)), 2) }}</b></td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td align="right">TVSH (18%)</td>
                <td align="right" class="blue font-color"> <b>€
                    {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</b></td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td align="right">Shuma:</td>
                <td align="right" class="blue font-color"> <b>€ {{ $total }}</b></td>
            </tr>
        </tbody>
    </table>

    <table width="50%;border: 1px black solid;margin-top:-4%;">
        <thead style="background-color: #122E57">
            <tr>
                <th align="left;">KOMENT</th>
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
                    <span><b>BKT :</b> 00000000000</span><br/>
                    <span><b>RBKO :</b> 00000000000</span><br/>
                    <span><b>PBC :</b> 00000000000</span><br/>
                </p>
            </td>
        </tr>
    </table>


</body>
</html>
