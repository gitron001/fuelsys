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
                    <th>{{ trans('adminlte::adminlte.product') }}</th>
					@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/dispensers')
						<th>{{ trans('adminlte::adminlte.quantity') }}</th>
                    @endif
					
					<th>{{ trans('adminlte::adminlte.staff_details.quantity_with_numbers') }}</th>
					
					@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/dispensers')
						<th>{{ trans('adminlte::adminlte.change') }}</th>
					@endif
					@if(isset($tanks) && count($tanks) > 0)
						<th>{{ trans('adminlte::adminlte.tank_sale') }}</th>
						<th>{{ trans('adminlte::adminlte.change') }}</th>
					@endif
                </tr>
            </thead>
            <tbody>
			<?php $total_sales = 0;	?>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['p_name'] }} </td>
				@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/dispensers')
					<td>{{ $product['totalLit'] }} litra</td>
				@endif
				
                @if(isset($totalizer_sales[$product['product_id']]))
					
					<td>{{ $totalizer_sales[$product['product_id']] }} litra</td>
				
					
					@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/dispensers')
						@if(( number_format($totalizer_sales[$product['product_id']] - $product['totalLit'], 2, '.', '')) != 0)
							<td bgcolor="red">{{ number_format($totalizer_sales[$product['product_id']] - $product['totalLit'], 2, '.', '')  }} litra</td>
						@else
							<td>{{ number_format($totalizer_sales[$product['product_id']] - $product['totalLit'], 2, '.', '')  }} litra</td>					
						@endif
					@endif
                @endif
				@if(isset($tanks) && count($tanks) > 0)
					<td>{{ number_format($sales_by_product[$product['product_id']]['sale'], 2, '.', '')  }} litra</td>
					@if((number_format($totalizer_sales[$product['product_id']] - $sales_by_product[$product['product_id']]['sale'], 2, '.', '') ) >= 0 )
						<td bgcolor="green">{{ number_format($totalizer_sales[$product['product_id']] - $sales_by_product[$product['product_id']]['sale'], 2, '.', '')  }} litra</td>
					@else
						<td bgcolor="red">{{ number_format($totalizer_sales[$product['product_id']] - $sales_by_product[$product['product_id']]['sale'], 2, '.', '')  }} litra</td>					
					@endif
				@endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END products table -->
