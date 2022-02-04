<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $company->name }}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-size: x-small;
        }

        h4 {
            text-align: center;
        }

        .gray {
            background-color: f2f2f2
        }

        .information {
            background-color: #fff;
            border: 1px solid black;
        }

        #table_design {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        #table_design td,
        #table_design th {
            border: 1px solid black;
            padding: 2px;
        }

        #table_design tr:nth-child(even) {
            background-color: #fff;
        }

        #table_design tr:hover {
            background-color: #fff;
        }

        #table_design th {
            padding-top: 2px;
            padding-bottom: 2px;
            background-color: white;
            color: black;
        }

    </style>

</head>

<body>

    <table width="100%" class="information" id="table_design">
        <tr>
            <td align="center" style="width: 50%;">
                {{ trans('adminlte::adminlte.transactions_pdf.report') }} - {{ $company->name }} &nbsp;&nbsp; &nbsp;|
                &nbsp;&nbsp; {{ date('d-m-Y H:i:s', time()) }}
            </td>
        </tr>
    </table>

    <h4>{{ trans('adminlte::adminlte.stock') }}</h4>
    @if($from_date && $to_date)
    <p style="line-height:1; text-align:center;font-size: 14px;">
        <span style="font-size: 16px;"></span><br/>
            {{  trans('adminlte::adminlte.staff_details.selected_date') .': '. date('d-m-Y H:i:s', $from_date) .' - '. date('d-m-Y H:i:s', $to_date) }}
    </p>
    @endif
    <table width="100%" id="table_design">
        <thead style="background-color: lightgray;">
            <tr>
                <th>{{ trans('adminlte::adminlte.date') }}</th>
                <th>{{ trans('adminlte::adminlte.stock_details.tank_product') }}</th>
                <th>{{ trans('adminlte::adminlte.amount') }}</th>
                <th>{{ trans('adminlte::adminlte.reference_number') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stock as $data)
            <tr>
                <td>{{ date('m/d/Y H:i', $data->date) }}</td>
                <td>{{ $data->tank->name }} | {{ $data->tank->product->name }}</td>
                <td>{{ $data->amount }}</td>
                <td>{{ $data->reference_number ? $data->reference_number : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
