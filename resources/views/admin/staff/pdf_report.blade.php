<!Doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ $company->name }} - Staff</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-size: x-small;
    }
    h4 {
    	text-align: center;
	}
    .gray {
        background-color: f2f2f2
    }

    .information {
        background-color: #fff;
        border: 1px solid black;
    }

    #table_design {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    #table_design td, #table_design th {
        border: 1px solid black;
        padding: 2px;
    }

    #table_design tr:nth-child(even){background-color: #fff;}

    #table_design tr:hover {background-color: #fff;}

    #table_design th {
        padding-top: 2px;
        padding-bottom: 2px;
        background-color: white;
        color: black;
    }
</style>

</head>
<body>

    <table width="100%" class="information" id="table_design">
        <thead>
        <tr>
            <th align="center" style="width: 50%;">
                {{ trans('adminlte::adminlte.staff_details.report') }} - {{ $company->name }}   &nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;  {{ date('d-m-Y H:i:s', time()) }}
            </th>
        </tr>
        </thead>
    </table>
	<br>
	<table width="100%">
	<!--<tr>
		<td valign="top"><img src="{{ public_path().'/images/gas-pump.png' }}" alt="" width="60"/></td>
	</tr>-->
	<tr>
		<td align="left">
            <p style="line-height:1.2">
                <span style="font-size: 16px;"><b> {{ $company->name }} </b></span><br/>
                <?php
                if(isset($_GET['fromDate']) || isset($_GET['toDate'])) {
                    echo trans('adminlte::adminlte.staff_details.selected_date') .': '. $_GET['fromDate'] .' - '. $_GET['toDate'];
                }else {
                    echo trans('adminlte::adminlte.staff_details.selected_date') .': '. date('d-m-Y H:i:s', $request->fromDate) .' - '. date('d-m-Y H:i:s', $request->toDate);
                } ?>
            </p>
        </td>
	</tr>
    </table>
 <!-- STAFF SECTION -->
    @if (Request::input('url') == 'staff' || $request->url == 'staff')
    <h4>{{ trans('adminlte::adminlte.staff') }}</h4>
	<table width="100%" id="table_design">
		<thead style="background-color: lightgray;">
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
                <td> <b>TOTAL</b> </td>
                    @foreach($product_name as $key => $value)
                        <td> <b>{{ $product_totals[$key]['lit'] }} Lit / {{ number_format($product_totals[$key]['money'], 2, '.', '') }} Euro</td>
                    @endforeach
                <td> <b>{{ number_format($total_staff,2) }}</b> </td>
            </tr>
        </tbody>

    </table>
    @endif
    <!-- STAFF SECTION END-->

	<!-- Stock SECTION -->
    @if (Request::input('url') == 'stock')

		@if(count($stocks) > 0)
			<h4>{{ trans('adminlte::adminlte.incoming_stock') }}</h4>
				<table width="100%" id="table_design" >
				<thead>
					<tr>
						<th>{{ trans('adminlte::adminlte.tank') }}</th>
						<th>{{ trans('adminlte::adminlte.name') }}</th>
						<th>{{ trans('adminlte::adminlte.total') }}</th>
						<th>{{ trans('adminlte::adminlte.incoming_date') }}</th>
					</tr>
				</thead>
				<BR> <BR>
				<tbody>
					@foreach($stocks as $s)
					<tr>
						<td>{{ $s->tank->name }}</td>
						<td>{{ $s->reference_number }}</td>
						<td>{{ $s->liters }} lit.</td>
						<td>{{ date('H:i d-M-Y',$s->date) }}  </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	@endif


    <!-- TOTAL SALES PER PRODUCT SECTION -->
    @if (Request::input('url') == 'stock' || Request::input('url') == 'dispensers' || Request::input('url') == 'staff' || $request->url == 'staff')
    <h4 @if ( Request::input('url') == 'stock' || Request::input('url') == 'staff' || $request->url == 'staff') style="display: none;" @endif>Total</h4>
    <table width="100%" id="table_design" @if (Request::input('url') != 'dispensers') style="display: none;" @endif>
        <thead>
            <tr>
                <th>{{ trans('adminlte::adminlte.product') }}</th>
                <th>{{ trans('adminlte::adminlte.nozzle') }}</th>
                <th>MIN</th>
                <th>MAX</th>
                <th>{{ trans('adminlte::adminlte.staff_details.totalizator') }}</th>
                <th>{{ trans('adminlte::adminlte.quantity') }}</th>
                <th>{{ trans('adminlte::adminlte.change') }}</th>
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
            <td>{{ number_format($product['max_totalizer']/100 - $product['min_totalizer']/100, 2 , '.' , '') }}</td>
            <td>{{ $product['lit'] }} litra</td>
            <td>{{ number_format( (($product['max_totalizer']/100 - $product['min_totalizer']/100) - $product['lit']) , 2 , '.' , '') }} litra</td>

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
    <!-- END TOTAL SECTION -->
    @endif

	<!-- SHOW SALES DATA FOR EACH TANKS -->
	 @if (Request::input('url') == 'stock')
		@if(count($tanks) > 0)
			 <h4>{{ trans('adminlte::adminlte.stock') }}</h4>
				<table  width="100%" id="table_design">
				<thead style="background-color: lightgray;">
					<tr>
						<th>{{ trans('adminlte::adminlte.name') }}</th>
						<th>{{ trans('adminlte::adminlte.total_before_shift_open') }}</th>
						<th>{{ trans('adminlte::adminlte.addedd_stock') }}</th>
						<th>{{ trans('adminlte::adminlte.total_after_shift_close') }}</th>
						<th>{{ trans('adminlte::adminlte.difference') }}</th>
						<th>{{ trans('adminlte::adminlte.staff_details.quantity_with_numbers') }}</th>
						<th>{{ trans('adminlte::adminlte.difference') }}</th>
					</tr>
				</thead>
				<tbody>

					@foreach($tanks as $t)
					<tr>
						<td>{{ $t->name }}</td>
						@php $starting_stock  = $t->tankLevel(request(), 'ASC') @endphp
						@php $ending_stock    = $t->tankLevel(request(), 'DESC') @endphp
						@php $incoming_stock    = $t->incomingFuel(request()) @endphp
						<td>{{ $starting_stock->liters }} lit. -  {{ $starting_stock->tank_level }}</td>
						<td>{{ $incoming_stock->total }} ({{ $incoming_stock->incoming_stock }})  </td>
						<td>{{ $ending_stock->liters }} lit. - {{ $ending_stock->tank_level }}</td>
						<td>{{ $starting_stock->liters + $incoming_stock->total - $ending_stock->liters  }} lit. </td>
						<td>{{ $tank_sales[$t->pfc_tank_id]  }} lit. </td>
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
			@endif
	@endif
	<!-- Total Incoming Stock -->
	@if (Request::input('url') == 'stock')
				<h4>{{ trans('adminlte::adminlte.stock') }}</h3>
				<table width="100%" id="table_design">
					<thead style="background-color: lightgray;">
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
							@if(!isset( $totalizer_sales[$sp['product_id']]))
								@php  $totalizer_sales[$sp['product_id']] = 0 @endphp
							@endif
							<td>{{ $totalizer_sales[$sp['product_id']] }} lit </td>
							<td>{{ $sp['starting_stock'] + $sp['incoming_stock'] -  $totalizer_sales[$sp['product_id']] }} lit </td>
							<td>{{ $sp['ending_stock'] }} lit </td>
							<td>{{ number_format($sp['ending_stock'] - ( $sp['starting_stock'] + $sp['incoming_stock'] -  $totalizer_sales[$sp['product_id']])  , 2, '.', '')}} lit </td>
						</tr>
						@endforeach
					</tbody>
				</table>
	@endif

    <!-- TOTAL SECTION -->
    @if (Request::input('url') == 'staff' || Request::input('url') == 'dispensers' || $request->url == 'staff')
	<h4>{{ trans('adminlte::adminlte.products_sales') }}</h4>
	<table width="100%" id="table_design">
		<thead style="background-color: lightgray;">
            <tr>
                <th>{{ trans('adminlte::adminlte.product') }}</th>
                <th>{{ trans('adminlte::adminlte.quantity') }}</th>
                <th>{{ trans('adminlte::adminlte.staff_details.quantity_with_numbers') }}</th>
                <th>{{ trans('adminlte::adminlte.change') }}</th>
				@if($tanks != null &&  count($tanks) > 0)
					<th>{{ trans('adminlte::adminlte.tank_sale') }}</th>
					<th>{{ trans('adminlte::adminlte.change') }}</th>
				@endif
            </tr>
        </thead>

		<tbody>
			<?php $total_sales = 0; ?>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['p_name'] }} </td>
                <td>{{ $product['totalLit'] }} litra</td>
                @if(isset($totalizer_sales[$product['product_id']]))
                <td>{{ $totalizer_sales[$product['product_id']] }} litra</td>
					@if(( number_format($totalizer_sales[$product['product_id']] - $product['totalLit'], 2, '.', '')) != 0)
						<td bgcolor="red">{{ number_format($totalizer_sales[$product['product_id']] - $product['totalLit'], 2, '.', '')  }} litra</td>
					@else
						<td>{{ number_format($totalizer_sales[$product['product_id']] - $product['totalLit'], 2, '.', '')  }} litra</td>
					@endif
                @endif
				@if($tanks != null && count($tanks) > 0)
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
    @endif
    <!-- END TOTAL SECTION -->


    @if (Request::input('url') == 'staff' || Request::input('url') == 'companies')
		<!-- COMPANIES SECTION -->
		@if(count($companies) != 0)
			@if (Request::input('url') == 'staff' || Request::input('url') == 'companies' || $request->url == 'staff')
			<h4>{{ trans('adminlte::adminlte.company') }}</h4>
			<table width="100%" id="table_design">
				<thead style="background-color: lightgray;">
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
						<td> <b>TOTAL</b> </td>
							@foreach($product_name_company as $key => $value)
								<td> {{ $product_totals[$key]['lit'] }} Lit / {{ number_format($product_totals[$key]['money'], 2, '.', '') }} Euro</td>
							@endforeach
						<td> <b>{{ number_format($total_company,2) }}</b> </td>
					</tr>
				</tbody>

			</table>
			@endif
		@endif
	@endif
    <!-- END COMPANIES SECTION -->

	 <!-- START PRODUCTS SECTION -->
	@if (Request::input('url') == 'products')
		<h4>{{ trans('adminlte::adminlte.staff_details.products_by_price') }}</h4>
		<table width="100%" id="table_design">
			<thead style="background-color: lightgray;">
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
                <td><>{{ $product['p_name'] .' - '. $product['product_price'] }} </td>
                <td>{{ $product['product_price'] }} Euro</td>
                <td>{{ $product['totalLit'] }} litra</td>
                <td>{{ number_format($product['totalLit'] * $product['product_price'], 2)  }} litra</td>
            </tr>
				<?php
                $total_lit += $product['totalLit'];
                $total_sales += $product['totalLit'] * $product['product_price']; ?>
            @endforeach
			</tbody>
			<tfoot>
				<tr>
					<td colspan='1'>
					</td>
					<td><b>TOTAL</b></td>
                    <td><b>{{ number_format($total_lit, 2) }} litra<b></td>
					<td><b>{{ number_format($total_sales, 2) }} Euro<b></td>
				</tr>
			</tfoot>
        </table>
        <h4>{{ trans('adminlte::adminlte.staff_details.average') }}</h4>
        <table width="100%" id="table_design">
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
                    <td>{{ number_format($product['totalLit'] * $product['product_price'], 2)  }} litra</td>
                </tr>
                <?php
                $total_lit += $product['totalLit'];
                $total_sales += $product['totalLit'] * $product['product_price']; ?>
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

	@endif
	<!-- END PRODUCTS SECTION -->
	@php ($total_payments = 0) @endphp
    <!-- START PAYMENTS SECTION -->
    @if (Request::input('url') == 'staff' || Request::input('url') == 'payments' || $request->url == 'staff')
        @if(count($payments) != 0)
        <h4>{{ trans('adminlte::adminlte.payments') }}</h4>
        <table width="100%" id="table_design">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>{{ trans('adminlte::adminlte.date') }}</th>
                    <th>{{ trans('adminlte::adminlte.description') }}</th>
                    <th>{{ trans('adminlte::adminlte.user') }}</th>
                    <th>{{ trans('adminlte::adminlte.company') }}</th>
                    <th>{{ trans('adminlte::adminlte.created_by') }}</th>
                    <th>{{ trans('adminlte::adminlte.amount') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ date('m/d/Y H:i', $payment->date) }}</td>
                    <td>{{ $payment->description ? $payment->description : '-' }}</td>
                    <td>{{ $payment->user ? $payment->user : '-' }}</td>
                    <td>{{ $payment->company ? $payment->company : '-' }}</td>
                    <td>{{ $payment->created_by }}</td>
                    <td>{{ number_format($payment->total,2) }} Euro</td>
                </tr>
                @php ($total_payments += $payment->total) @endphp
                @endforeach
                <tr>
                    <td colspan="5" style="text-align:right"><b>TOTAL:</b></td>
                    <td><b>{{ number_format($total_payments,2) }} Euro</b></td>
                </tr>
            </tbody>

        </table>
        @endif
    @endif
    <!-- END PAYMENTS SECTION -->

    @php ($total_expenses = 0) @endphp
     <!-- START EXPENSES SECTION -->
    @if (Request::input('url') == 'staff' || Request::input('url') == 'expenses' || $request->url == 'staff')
        @if(count($expenses) != 0)
        <h4>{{ trans('adminlte::adminlte.expenses') }}</h4>
        <table width="100%" id="table_design">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>{{ trans('adminlte::adminlte.date') }}</th>
                    <th>{{ trans('adminlte::adminlte.description') }}</th>
                    <th>{{ trans('adminlte::adminlte.user') }}</th>
                    <th>{{ trans('adminlte::adminlte.amount') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                <tr>
                    <td>{{ date('m/d/Y H:i', $expense->date) }}</td>
                    <td>{{ !empty($expense->description) ? $expense->description : '-'}}</td>
                    <td>{{ $expense->name }}</td>
                    <td>{{ number_format($expense->total,2) }} Euro</td>
                </tr>
                @php ($total_expenses += number_format($expense->total,2)) @endphp
                @endforeach
                <tr>
                    <td colspan="3" align="right"><b>TOTAL:</b></td>
                    <td><b>{{ number_format($total_expenses,2) }} Euro</b></td>
                </tr>
            </tbody>

        </table>
        @endif
    @endif
    <!-- END EXPENSES SECTION -->

    <!-- START POS SECTION -->
    @if (Request::input('url') == 'staff' || Request::input('url') == 'pos-sales' || $request->url == 'staff')
        @if(count($pos_sales) != 0)
        <h4>{{ trans('adminlte::adminlte.expenses') }}</h4>
        <table width="100%" id="table_design">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>{{ trans('adminlte::adminlte.date') }}</th>
                    <th>{{ trans('adminlte::adminlte.banks') }}</th>
                    <th>{{ trans('adminlte::adminlte.amount') }}</th>
                </tr>
            </thead>
            @php ($total = 0) @endphp
            @foreach($pos_sales as $pos_sale)
            <tr>
                <td>{{ date('m/d/Y H:i', $pos_sale->date) }}</td>
                <td>{{ $pos_sale->name }}</td>
                <td>{{ number_format($pos_sale->total,2) }} Euro</td>
            </tr>
            @php ($total += number_format($pos_sale->total,2)) @endphp
            @endforeach
            <tr>
                <td colspan="2" style="text-align:right"><b>TOTAL:</b></td>
                <td><b>{{ number_format($total,2) }} Euro</b></td>
            </tr>
            </tbody>

        </table>
        @endif
    @endif
    <!-- END POS SECTION -->

	<!-- SHOW TOTALS -->
	@if (Request::input('url') == 'staff' || $request->url == 'staff')
        <h4>{{ trans('adminlte::adminlte.total') }}</h4>
		<table width="100%" id="table_design">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>{{ trans('adminlte::adminlte.transactions') }}</th>
                    <th>{{ trans('adminlte::adminlte.payments') }}</th>
                    <th>{{ trans('adminlte::adminlte.expenses') }}</th>
                    <th>{{ trans('adminlte::adminlte.total') }}</th>
                </tr>
            </thead>

            <tbody>
				<tr>
					<td> {{ number_format($total_staff,2) }} Euro</td>
                    <td> {{ number_format($total_payments,2) }} Euro</td>
                    <td> {{ number_format($total_expenses,2) }} Euro</td>
                    <td><b> {{ number_format(($total_staff + $total_payments  - $total_expenses),2) }} Euro</b></td>
				</tr>
            </tbody>

        </table>
	@endif
</body>
</html>
