@php $total_transactions = 0 @endphp
@foreach($staffData as $staff)
    @php $total_transactions += $staff['totalMoney'] @endphp
@endforeach

@php $total_payments = 0 @endphp
@foreach ($payments as $payment)
    @php $total_payments += $payment->total @endphp
@endforeach

@php $total_expenses = 0 @endphp
@foreach ($expenses as $expense)
    @php $total_expenses += $expense->total @endphp
@endforeach

<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.total') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.transactions') }}</th>
                    <th>{{ trans('adminlte::adminlte.payments') }}</th>
                    <th>{{ trans('adminlte::adminlte.expenses') }}</th>
                    <th>{{ trans('adminlte::adminlte.total') }}</th>
                </tr>
            </thead>
            <tbody>
				<tr>
					<td> {{ number_format($total_transactions,2) }} Euro</td>
                    <td> {{ number_format($total_payments,2) }} Euro</td>
                    <td> {{ number_format($total_expenses,2) }} Euro</td>
                    <td><b> {{ number_format(($total_transactions + $total_payments  - $total_expenses),2) }} Euro</b></td>
				</tr>
            </tbody>
        </table>
    </div>
</div>
