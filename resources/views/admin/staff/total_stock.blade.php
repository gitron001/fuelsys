@if(count($tanks) > 1)
<?php global $sales_by_product; ?>
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
                    <th>{{ trans('adminlte::adminlte.staff_details.quantity_with_numbers') }}</th>
                    <th>{{ trans('adminlte::adminlte.difference') }}</th>
                    <th>{{ trans('adminlte::adminlte.total_after_shift_close') }}</th>
                    <th>{{ trans('adminlte::adminlte.difference') }}</th>
                </tr>
            </thead>
			<tbody>
				
                @foreach($tanks as $t)
				<tr>
					<td>{{ $t->name }} ( {{ $t->product->name }} )</td>
					@php $starting_stock  = $t->tankLevel(request(), 'ASC') @endphp
					@php $ending_stock    = $t->tankLevel(request(), 'DESC') @endphp
					@php $incoming_stock    = $t->incomingFuel(request()) @endphp
					@if(!isset($tank_sales[$t->pfc_tank_id]))
						@php $tank_sales[$t->pfc_tank_id] = 0 @endphp
					@endif
					
                    <td>{{ $starting_stock->liters }} lit. -  @if(is_int($starting_stock->tank_level)) {{ number_format(($starting_stock->tank_level/100), 2 , '.' , '')  }}   @else {{ $starting_stock->tank_level }} @endif </td>					
                    <td>{{ $incoming_stock->total }} ({{ $incoming_stock->incoming_stock }})  </td>
					<td>{{ $tank_sales[$t->pfc_tank_id]  }} lit. </td>
					<td>{{ ( $starting_stock->liters + $incoming_stock->total) - $tank_sales[$t->pfc_tank_id]   }} lit. </td>
					
                    <td>{{ $ending_stock->liters }} lit. - @if(is_int($ending_stock->tank_level)) {{ number_format(($ending_stock->tank_level/100), 2 , '.' , '')  }}   @else {{ $ending_stock->tank_level }} @endif </td>
					                
                    <td>{{ number_format($tank_sales[$t->pfc_tank_id] - ($starting_stock->liters + $incoming_stock->total - $ending_stock->liters) , 2 , '.' , '')  }} lit. </td>
				</tr>
				
				<?php if(isset($sales_by_product[$t['product_id']])){
					$sales_by_product[$t['product_id']]['sale'] 			+= ($starting_stock->liters + $incoming_stock->total - $ending_stock->liters);
					$sales_by_product[$t['product_id']]['incoming_stock'] 	+= $incoming_stock->total;					
					$sales_by_product[$t['product_id']]['starting_stock'] 	+= $starting_stock->liters;
					$sales_by_product[$t['product_id']]['ending_stock'] 	+= $ending_stock->liters;
				  }else{
					$sales_by_product[$t['product_id']]['name'] 			= $t->product->name;
					$sales_by_product[$t['product_id']]['product_id'] 		= $t['product_id'];
					$sales_by_product[$t['product_id']]['sale'] 			= ($starting_stock->liters + $incoming_stock->total - $ending_stock->liters);
					$sales_by_product[$t['product_id']]['incoming_stock'] 	= $incoming_stock->total ;
					$sales_by_product[$t['product_id']]['starting_stock'] 	= $starting_stock->liters;
					$sales_by_product[$t['product_id']]['ending_stock'] 	= $ending_stock->liters;
				  }
				 
				?>
                @endforeach
            </tbody>
        </table>
   </div>
</div>
@if (Request::path() == 'admin/staff/stock')
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
						<th>{{ trans('adminlte::adminlte.staff_details.quantity_with_numbers') }}</th>
						<th>{{ trans('adminlte::adminlte.change') }}</th>
						<th>{{ trans('adminlte::adminlte.total_after_shift_close') }}</th>
						<th>{{ trans('adminlte::adminlte.change') }}</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($sales_by_product as $sp)
					<tr>
						<td>{{ $sp['name'] }}</td>
						<td>{{ $sp['starting_stock'] }} lit </td>					
						<td>{{ $sp['incoming_stock'] }} lit </td>				
						<td>{{ $totalizer_sales[$sp['product_id']] }} lit </td>							
						<td>{{ $sp['starting_stock'] + $sp['incoming_stock'] -  $totalizer_sales[$sp['product_id']] }} lit </td>							
						<td>{{ $sp['ending_stock'] }} lit </td>														
						<td>{{ number_format($sp['ending_stock'] - ( $sp['starting_stock'] + $sp['incoming_stock'] -  $totalizer_sales[$sp['product_id']])  , 2, '.', '')}} lit </td>														
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endif

@endif



