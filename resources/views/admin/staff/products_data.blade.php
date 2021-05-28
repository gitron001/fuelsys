<!-- START products table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.products') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.product') }}</th>
                    <th>{{ trans('adminlte::adminlte.price') }}</th>
                    <th>{{ trans('adminlte::adminlte.quantity') }}</th>
					<th>Total</th>
                </tr>
            </thead>
            <tbody>
			<?php
            $total_lit = 0;
            $total_sales = 0; ?>
            @foreach($products as $product)
				<tr>
					<td>{{ $product['p_name'] .' - '. $product['product_price'] }} </td>
					<td>{{ $product['product_price'] }} Euro</td>
					<td>{{ $product['totalLit'] }} litra</td>
					<td>{{ number_format($product['totalLit'] * $product['product_price'], 2)  }} Euro</td>
				</tr>
				<?php
                $total_lit += $product['totalLit'];
                $total_sales += $product['totalLit'] * $product['product_price'];
                ?>
            @endforeach
            </tbody>
			<tfoot>
				<tr>
					<td colspan='1'>
					</td>
                    <td><b>TOTAL</b></td>
					<td><b>{{ number_format($total_lit, 2) }} litra</b></td>
					<td><b>{{ number_format($total_sales, 2) }} Euro</b></td>
				</tr>
			</tfoot>
        </table>
    </div>
</div>
<!-- END products table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.staff_details.average') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.product') }}</th>
                    <th>{{ trans('adminlte::adminlte.price') }}</th>
                    <th>{{ trans('adminlte::adminlte.quantity') }}</th>
					<th>Total</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total_lit = 0;
            $total_sales = 0;
            ?>
            @foreach($products_average as $product)
				<tr>
					<td>{{ $product['p_name'] .' - '. number_format($product['product_price'], 3) }} </td>
					<td>{{ number_format($product['product_price'], 3) }} Euro</td>
					<td>{{ number_format($product['totalLit'], 2) }} litra</td>
					<td>{{ number_format($product['totalLit'] * $product['product_price'], 2)  }} Euro</td>
				</tr>
				<?php
                $total_lit += $product['totalLit'];
                $total_sales += $product['totalLit'] * $product['product_price'];
                ?>
            @endforeach
            </tbody>
			<tfoot>
				<tr>
					<td colspan='1'>
					</td>
					<td><b>TOTAL</b></td>
                    <td><b>{{ number_format($total_lit, 2) }} litra</b></td>
					<td><b>{{ number_format($total_sales, 2) }} Euro</b></td>
				</tr>
			</tfoot>
        </table>
    </div>
</div>
