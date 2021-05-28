
<!-- START staff table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-user" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.staff') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.user') }}</th>
                    @foreach($product_name as $value)
                        <th>{{ $value }}</th>
                    @endforeach
                    <th>Euro</th>
                </tr>
            </thead>
            <tbody>
				<?php $total_staff = 0; ?>
				<?php $product_totals = array(); ?>
                @foreach($staffData as $transaction)
                <tr>
                    <td>{{ $transaction['user_name'] }}</td>
                    @foreach($product_name as $key => $value)
                    <td>
                        {{ !empty($transaction[$key]) ? $transaction[$key][0] : '0' }} litra /
                        {{ !empty($transaction[$key][0]) ? number_format($transaction[$key][0] *  $transaction[$key][1], 2) : '0'}} Euro
                    </td>
                    <?php
                        if(isset($transaction[$key])){
                            if(isset($product_totals[$key])){
                            $product_totals[$key]['lit'] += $transaction[$key][0];
                            $product_totals[$key]['money'] += $transaction[$key][0] * $transaction[$key][1];
                            }else{
                            $product_totals[$key]['lit'] = $transaction[$key][0];
                            $product_totals[$key]['money'] = $transaction[$key][0] * $transaction[$key][1];
                            }
                        }
                    ?>
                    @endforeach
                    <td>{{  number_format($transaction['totalMoney'],2)  }} Euro</td>
					<?php $total_staff += $transaction['totalMoney']; ?>
                </tr>
                @endforeach
				<tr>
					<td> <b>TOTAL:</b> </td>
                        @foreach($product_name as $key => $value)
							<td> {{ $product_totals[$key]['lit'] }} Lit / {{ number_format($product_totals[$key]['money'], 2, '.', '') }} Euro</td>
						@endforeach
					<td> <b>{{ number_format($total_staff,2) }}</b> </td>
				</tr>
            </tbody>
        </table>
    </div>
</div>
<!-- END staff table -->
