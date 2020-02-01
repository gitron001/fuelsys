
<!-- START Totalizers table -->

@if (Request::path() == 'admin/staff/dispensers')
    <div class="box box-primary">
@else
    <div class="box box-primary" style="display:none;">
@endif
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">Total</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>Produkti</th>
                    <th>Nozzle</th>
                    <th>MIN</th>
                    <th>MAX</th>
                    <th>Litrat</th>
                    <th>Totalizatori</th>
                    <th>Ndryshimi</th>
                </tr>
            </thead>
            <tbody>
			<?php $totalizer_sales = array(); ?>
            @foreach($totalizer_totals as $product)
            <tr>
                <td>{{ $product['product_name'] }} </td>
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
			?>
            @endforeach
		    </tbody>
        </table>
    </div>
</div>
<!-- END Totalizers table -->

<!-- START products table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">Total</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>Produkti</th>
                    <th>Cmimi</th>
                    <th>Sasia</th>
                    <th>Sasia Me Numra</th>
                    <th>Ndryshimi</th>
                </tr>
            </thead>
            <tbody>
			<?php $total_sales = 0; ?>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['p_name'] }} </td>
                <td>{{ $product['product_price'] }} Euro</td>
                <td>{{ $product['totalLit'] }} litra</td>
                @if(isset($totalizer_sales[$product['product_id']]))
                <td>{{ $totalizer_sales[$product['product_id']] }} litra</td>
                <td>{{ number_format($totalizer_sales[$product['product_id']], 2, '.', '') - number_format($product['totalLit'], 2, '.', '')  }} litra</td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END products table -->
