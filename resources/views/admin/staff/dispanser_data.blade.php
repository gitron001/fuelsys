
<!-- START Totalizers table -->

@if (Request::path() == 'admin/staff/dispensers')
    <div class="box box-primary">
@else
    <div class="box box-primary" style="display:none;">
@endif
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.dispensers') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.product') }}</th>
                    <th>{{ trans('adminlte::adminlte.tank') }}</th>
                    <th>{{ trans('adminlte::adminlte.nozzle') }}</th>
                    <th>MIN</th>
                    <th>MAX</th>
                    <th>{{ trans('adminlte::adminlte.quantity') }}</th>
                    <th>{{ trans('adminlte::adminlte.staff_details.totalizator') }}</th>
                    <th>{{ trans('adminlte::adminlte.change') }}</th>
                </tr>
            </thead>
            <tbody>
			<?php global $totalizer_sales; ?>
			<?php global $tank_sales; ?>
            @foreach($totalizer_totals as $product)
            <tr>
                <td>{{ $product['product_name'] }} </td>
                <td>{{ $product['t_name'] }}</td>
                <td>{{ $product['channel_id'] . '-' . $product['sl_no'] }}</td>
                <td>{{ $product['min_totalizer']/100 }} </td>
                <td>{{ $product['max_totalizer']/100 }} </td>
                <td>{{ $product['lit'] }} litra</td>
				
                <td>{{ number_format($product['max_totalizer']/100 - $product['min_totalizer']/100, 2 , '.' , '') }}</td>
                <td>{{ number_format( ( $product['lit'] - ($product['max_totalizer']/100 - $product['min_totalizer']/100)) , 2 , '.' , '') }} litra</td>
                

            </tr>
			<?php if(isset($totalizer_sales[$product['product_id']])){
					$totalizer_sales[$product['product_id']] += number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
				  }else{
					$totalizer_sales[$product['product_id']] = number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
				  }
				  
				  if(isset($tank_sales[$product['tank_id']])){
					$tank_sales[$product['tank_id']] += number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
				  }else{
					$tank_sales[$product['tank_id']] = number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
				  }
			?>
            @endforeach
		    </tbody>
        </table>
    </div>
</div>
<!-- END Totalizers table -->
