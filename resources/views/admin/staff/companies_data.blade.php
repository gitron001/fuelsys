
@if(count($companies) != 0)
<!-- START company table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.companies') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.company') }}</th>
                    @foreach($product_name_company as $value)
                        <th>{{ $value }}</th>
                    @endforeach
                    <th>Euro</th>
                </tr>
            </thead>
            <tbody>
				<?php $total_company = 0; ?>
				<?php $product_totals = array(); ?>
                @foreach($companyData as $transaction)
                <tr>
                    <td>{{ $transaction['company_name'] }}</td>
                        @foreach($product_name_company as $key => $value)
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
                    <td>{{  number_format($transaction['totalMoney'], 2)  }} Euro</td>
					<?php $total_company += $transaction['totalMoney']; ?>
                </tr>
                @endforeach
				<tr>
					<td> <b>TOTAL:</b> </td>
                        @foreach($product_name_company as $key => $value)
							<td> {{ $product_totals[$key]['lit'] }} Lit / {{ number_format($product_totals[$key]['money'], 2, '.', '') }} Euro</td>
						@endforeach
					<td> <b>{{ number_format($total_company,2) }}</b> </td>
				</tr>
            </tbody>
        </table>
    </div>
</div>
<!-- END companies table -->
@endif
