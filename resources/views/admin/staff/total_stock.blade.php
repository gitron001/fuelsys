@if(count($stock_details) > 0)
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.stock') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.name') }}</th>
                    <th>{{ trans('adminlte::adminlte.total_before_shift_open') }}</th>
                    <th>{{ trans('adminlte::adminlte.addedd_stock') }}</th>
                    <th>{{ trans('adminlte::adminlte.total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_details as $stock)

                @php ($total_sales = 0) @endphp
                @foreach($sales as $sale)
                    @if($sale->tank_id == $stock->tank_id)
                        @php ($total_sales = $sale->total_lit)  @endphp
                        @php  break @endphp
                    @endif
                @endforeach

                @php ($prev_total_stock = 0) @endphp
                @foreach($prev_stock_details as $sale)
                    @if($sale->tank_id == $stock->tank_id)
                        @php ($prev_total_stock = $sale->amount)  @endphp
                        @php  break @endphp
                    @endif
                @endforeach

				<tr>
					<td>{{ $stock->tank_name }}</td>
                    <td>{{ ($prev_total_stock - $total_sales) }} </td>
                    <td>{{ $stock->amount }}</td>
                    <td>{{ ($stock->amount - ($total_sales - $prev_total_stock) ) }}</td>
				</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
