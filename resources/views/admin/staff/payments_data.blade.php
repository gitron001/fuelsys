@if(count($payments) != 0)
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-euro-sign" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.payments') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.date') }}</th>
                    <th>{{ trans('adminlte::adminlte.description') }}</th>
                    <th>{{ trans('adminlte::adminlte.user') }}</th>
                    <th>{{ trans('adminlte::adminlte.company') }}</th>
                    <th>{{ trans('adminlte::adminlte.created_by') }}</th>
                    <th>{{ trans('adminlte::adminlte.amount') }}</th>
                </tr>
            </thead>
            <tbody>
            @php ($total = 0) @endphp
            @foreach($payments as $payment)
            <tr>
                <td>{{ date('m/d/Y H:i', $payment->date) }}</td>
                <td>{{ $payment->description ? $payment->description : '-' }}</td>
                <td>{{ $payment->user ? $payment->user : '-' }}</td>
                <td>{{ $payment->company ? $payment->company : '-' }}</td>
                <td>{{ $payment->created_by }}</td>
                <td>{{ number_format($payment->total,2) }} Euro</td>
            </tr>
            @php ($total += $payment->total ) @endphp
            @endforeach
            <tr>
                <td colspan="5" style="text-align:right"><b>TOTAL:</b></td>
                <td><b>{{ number_format($total,2) }} Euro</b></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endif
