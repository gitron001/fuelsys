@if(count($expenses) != 0)
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-book" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.expenses') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.date') }}</th>
                    <th>{{ trans('adminlte::adminlte.description') }}</th>
                    <th>{{ trans('adminlte::adminlte.user') }}</th>
                    <th>{{ trans('adminlte::adminlte.amount') }}</th>
                </tr>
            </thead>
            <tbody>
            @php ($total = 0) @endphp
            @foreach($expenses as $expense)
            <tr>
                <td>{{ date('m/d/Y H:i', $expense->date) }}</td>
                <td>{{ $expense->description ? $expense->description : '-' }}</td>
                <td>{{ $expense->name }}</td>
                <td>{{ $expense->total }} Euro</td>
            </tr>
            @php ($total += $expense->total) @endphp
            @endforeach
            <tr>
                <td colspan="3" style="text-align:right"><b>TOTAL:</b></td>
                <td><b>{{ number_format($total,2) }} Euro</b></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endif
