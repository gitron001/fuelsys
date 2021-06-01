<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fuel System - {{ trans('adminlte::adminlte.staff_details.totalizers') }}</title>

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
            background-color: lightgray
        }

        .information {
            background-color: lightgray;
        }

        #table_design {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        #table_design td,
        #table_design th {
            border: 1px solid #ddd;
            padding: 2px;
        }

        #table_design tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table_design tr:hover {
            background-color: #ddd;
        }

        #table_design th {
            padding-top: 2px;
            padding-bottom: 2px;
            background-color: #3c8dbc;
            color: white;
        }

    </style>

</head>

<body>

    <table width="100%" class="information" id="table_design">
        <thead>
            <tr>
                <th align="center" style="width: 50%;">
                    Fuel System - {{ trans('adminlte::adminlte.staff_details.totalizers') }} &nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;
                    {{ date('d-m-Y H:i:s', time()) }}
                </th>
            </tr>
        </thead>
    </table>
    <br>

    <h4>{{ trans('adminlte::adminlte.staff_details.totalizers') }}</h4>
    <table width="100%" id="table_design">
        <thead>
            <tr>
                <th>Channel Id</th>
                <th>Sl No</th>
                <th>Dis totalizer last</th>
            </tr>
        </thead>
        <tbody>
            @foreach($totalizers as $totalizer)
            <tr>
                <td>{{ $totalizer->channel_id }}</td>
                <td>{{ $totalizer->sl_no }}</td>
                <td>{{ $totalizer->dis_tot_last }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>

</html>
