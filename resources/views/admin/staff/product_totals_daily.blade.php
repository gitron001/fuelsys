<!-- START products table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.products_sales') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.date') }}</th>
                    <th>{{ trans('adminlte::adminlte.product') }}</th>
					<th>{{ trans('adminlte::adminlte.price') }}</th>
					<th>{{ trans('adminlte::adminlte.quantity') }}</th>
					<th>{{ trans('adminlte::adminlte.total') }}</th>
                </tr>
            </thead>
            <tbody>
			<?php $total_sales = 0;	?>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['date'] }} </td>
				<td>{{ $product['p_name'] }} </td>
				<td>{{ number_format($product['totalMoney']/$product['totalLit'], 2, '.', '' ) }} litra</td>                
				<td>{{ $product['totalMoney'] }} Euro</td>		
				<td>{{ $product['totalLit'] }} litra</td>				
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END products table -->
