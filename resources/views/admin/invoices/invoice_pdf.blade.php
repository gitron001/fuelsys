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

        .black {
            background-color: #000;
        }

        .font-color {
            color: black;
        }

        .top {
            height: 45%;
            margin-bottom: 10px;
        }

        .bottom {
            height: 48%;
            margin-top: 3%;
        }
    </style>

</head>

<body>
    <div class="top">
        <div class="col-xs-12">
            <table width="100%">
                <tr>
                    <td align="left">
                        <h1 class="page-header">{{ $company->name }}</h1>
                        <p style="line-height:1.2; font-size: 13px;">
                            <span><b>{{ trans('adminlte::adminlte.address') }}:</b> {{ $company->city }}, {{ $company->country }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.email') }}:</b> {{ $company->email }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.phone') }}:</b> {{ $company->tel_number }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.bis_number') }}:</b> {{ $company->bis_number }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.tax_number') }}:</b> {{ $company->tax_number }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.fis_number') }}:</b> {{ $company->fis_number }}</span><br />
                        </p>
                    </td>

                    <td align="right">
                        <h1 class="page-header">{{ strtoupper(trans('adminlte::adminlte.invoice')) }} {{ isset($invoice_id) ? '#'.$invoice_id : ''}}</h1>
                        <p style="line-height:1.2; font-size: 13px;">
                            <span><b>{{ trans('adminlte::adminlte.date') }}: </b> {{ isset($date) ? date('d-m-Y H:i', $date) : date('d-m-Y H:i') }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.company') }}:</b> {{ $to_company ? $to_company->name : '_________________________' }}</span><br/>
                            <span><b>{{ trans('adminlte::adminlte.email') }}:</b> {{ $to_company ? $to_company->email : '_________________________'}}</span><br/>
                            <span><b>{{ trans('adminlte::adminlte.phone') }}:</b> {{ $to_company ? $to_company->tel_number : '_________________________'}}</span><br/>
                            <span><b>{{ trans('adminlte::adminlte.fis_number') }}:</b> {{ $to_company ? $to_company->fis_number : '_________________________'}}</span>
                        </p>
                    </td>
                </tr>

            </table>
        </div>
        <br>
        <br>

        <table width="100%">
            <thead style="background-color:#000;">
                <tr>
                    <th align="center">{{ trans('adminlte::adminlte.date') }}</th>
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
                    <td align="right"><b>{{ trans('adminlte::adminlte.taxable_value') }}:</b></td>
                    <td align="right" class="font-color"> <b>€
                        {{ number_format(($total / (1 + 0.18)), 2) }}</b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right"><b>{{ trans('adminlte::adminlte.tax') }} (18%)</b></td>
                    <td align="right" class="font-color"> <b>€
                        {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right"><b>{{ trans('adminlte::adminlte.total') }}:</b></td>
                    <td align="right" class="font-color"> <b>€ {{ $total }}</b></td>
                </tr>
            </tbody>
        </table>

        <table width="50%;border: 1px black solid;margin-top:-4%;">
            @if($invoice->paid == 0)
            <thead>
                <tr>
                    <th align="left;" style="color: black;">{{ strtoupper(trans('adminlte::adminlte.comment')) }}</th>
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
            @else
            <thead>
                <tr>
                    <th align="center;"  style="line-height: 1.2;color: black;font-size: 1.5rem">{{ strtoupper(trans('adminlte::adminlte.paid')) }}</th>
                </tr>
            </thead>
            @endif
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
        </table>
      <div>
        <div style="float:left">
            <p>{{ trans('adminlte::adminlte.delivered') }}:</p>
            <p>_________________________</p>
        </div>
        <div style="float: right" class="pull-right">
            <p>{{ trans('adminlte::adminlte.received') }}:</p>
            <p>_________________________</p>
        </div>
      </div>

    </div>




    @if(count($all_transactions) == 1)
    <!-- PART 2 -->
    <hr>

    <div class="bottom">
        <div class="col-xs-12">
            <table width="100%">
                <tr>
                    <td align="left">
                        <h1 class="page-header">{{ $company->name }}</h1>
                        <p style="line-height:1.2; font-size: 13px;">
                            <span><b>{{ trans('adminlte::adminlte.address') }}:</b> {{ $company->city }}, {{ $company->country }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.email') }}:</b> {{ $company->email }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.phone') }}:</b> {{ $company->tel_number }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.bis_number') }}:</b> {{ $company->bis_number }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.tax_number') }}:</b> {{ $company->tax_number }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.fis_number') }}:</b> {{ $company->fis_number }}</span><br />
                        </p>
                    </td>

                    <td align="right">
                        <h1 class="page-header">{{ strtoupper(trans('adminlte::adminlte.invoice')) }} {{ isset($invoice_id) ? '#'.$invoice_id : ''}}</h1>
                        <p style="line-height:1.2; font-size: 13px;">
                            <span><b>{{ trans('adminlte::adminlte.date') }}: </b> {{ isset($date) ? date('d-m-Y H:i', $date) : date('d-m-Y H:i') }}</span><br />
                            <span><b>{{ trans('adminlte::adminlte.company') }}:</b> {{ $to_company ? $to_company->name : '_________________________' }}</span><br/>
                            <span><b>{{ trans('adminlte::adminlte.email') }}:</b> {{ $to_company ? $to_company->email : '_________________________'}}</span><br/>
                            <span><b>{{ trans('adminlte::adminlte.phone') }}:</b> {{ $to_company ? $to_company->tel_number : '_________________________'}}</span><br/>
                            <span><b>{{ trans('adminlte::adminlte.fis_number') }}:</b> {{ $to_company ? $to_company->fis_number : '_________________________'}}</span>
                        </p>
                    </td>
                </tr>

            </table>
        </div>
        <br>
        <br>
        <table width="100%">
            <thead style="background-color:#000;">
                <tr>
                    <th align="center">{{ trans('adminlte::adminlte.date') }}</th>
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
                    <td align="right"><b>{{ trans('adminlte::adminlte.taxable_value') }}:</b></td>
                    <td align="right" class="font-color"> <b>€
                        {{ number_format(($total / (1 + 0.18)), 2) }}</b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right"><b>{{ trans('adminlte::adminlte.tax') }} (18%)</b></td>
                    <td align="right" class="font-color"> <b>€
                        {{ number_format(( $total - ( $total / (1 + 0.18) ) ), 2) }}</b></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td align="right"><b>{{ trans('adminlte::adminlte.total') }}:</b></td>
                    <td align="right" class="font-color"> <b>€ {{ $total }}</b></td>
                </tr>
            </tbody>
        </table>

        <table width="50%;border: 1px black solid;margin-top:-4%;">
            @if($invoice->paid == 0)
            <thead>
                <tr>
                    <th align="left;" style="color: black;">{{ strtoupper(trans('adminlte::adminlte.comment')) }}</th>
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
            @else
            <thead>
                <tr>
                    <th align="center;"  style="line-height: 1.2;color: black;font-size: 1.5rem">{{ strtoupper(trans('adminlte::adminlte.paid')) }}</th>
                </tr>
            </thead>
            @endif
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
        </table>

        <div>
            <div style="float:left">
                <p>{{ trans('adminlte::adminlte.delivered') }}:</p>
                <p>_________________________</p>
            </div>
            <div style="float: right" class="pull-right">
                <p>{{ trans('adminlte::adminlte.received') }}:</p>
                <p>_________________________</p>
            </div>
          </div>
    </div>


    @endif


</body>
</html>
