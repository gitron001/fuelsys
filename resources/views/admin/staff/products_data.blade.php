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
					<td>Totali</th>
                </tr>
            </thead>
            <tbody>
			<?php $total_sales = 0; ?>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['p_name'] .' - '. $product['product_price'] }} </td>
                <td>{{ $product['product_price'] }} Euro</td>
                <td>{{ $product['totalLit'] }} litra</td>
                <td>{{ number_format($product['totalLit'] * $product['product_price'], 2)  }} litra</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END products table -->
