<!Doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ $company->name }} - STAFF PDF</title>

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
        background-color: lightgray
    }

    .information {
        background-color: lightgray;
    }

    #table_design {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    #table_design td, #table_design th {
        border: 1px solid #ddd;
        padding: 2px;
    }

    #table_design tr:nth-child(even){background-color: #f2f2f2;}

    #table_design tr:hover {background-color: #ddd;}

    #table_design th {
        padding-top: 2px;
        padding-bottom: 2px;
        background-color: #3c8dbc;
        color: white;
    }
</style>

</head>
<body>

    <table width="100%" class="information" id="table_design">
        <thead>
        <tr>
            <th align="center" style="width: 50%;">
                RAPORT - {{ $company->name }}   &nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;  {{ date('d-m-Y H:i:s', time()) }}
            </th>
        </tr>
        </thead>
    </table>
	<br>
	<table width="100%">
	<tr>
		<td valign="top"><img src="{{ public_path().'/images/company/'.$company->images }}" alt="" width="80"/></td>
	</tr>
	<tr>
		<td align="left">
            <p style="line-height:1.2">
                <span style="font-size: 16px;"><b> {{ $company->name }} </b></span><br/>
                <?php
                if(isset($_GET['fromDate']) || isset($_GET['toDate'])) {
                    echo "Data e zgjedhur: " . $_GET['fromDate'] .' - '. $_GET['toDate'];
                }else {
                    echo "Data e zgjedhur: " . date('d-m-Y H:i:s', $request->fromDate) .' - '. date('d-m-Y H:i:s', $request->toDate);
                } ?>
            </p>
        </td>
	</tr>
    </table>
    <!-- TOTAL SECTION -->
    @if (Request::input('url') == 'dispensers' || Request::input('url') == 'staff' || $request->url == 'staff')
    <h4 @if (Request::input('url') == 'staff' || $request->url == 'staff') style="display: none;" @endif>Total</h4>
    <table width="100%" id="table_design" @if (Request::input('url') != 'dispensers') style="display: none;" @endif>
        <thead>
            <tr>
                <th>Produkti</th>
                <th>Nozzle</th>
                <th>MIN</th>
                <th>MAX</th>
                <th>Totalizatori</th>
                <th>Litrat</th>
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
            <td>{{ number_format($product['max_totalizer']/100 - $product['min_totalizer']/100, 2 , '.' , '') }}</td>
            <td>{{ $product['lit'] }} litra</td>
            <td>{{ number_format( (($product['max_totalizer']/100 - $product['min_totalizer']/100) - $product['lit']) , 2 , '.' , '') }} litra</td>

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
    <!-- END TOTAL SECTION -->
    @endif
    <!-- TOTAL SECTION -->
    @if (Request::input('url') == 'staff' || Request::input('url') == 'dispensers' || $request->url == 'staff')
    <h4>Total</h4>
	<table width="100%" id="table_design">
		<thead style="background-color: lightgray;">
            <tr>
                <th>Produkti</th>
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
                <td>{{ $product['totalLit'] }} litra</td>
                @if(isset($totalizer_sales[$product['product_id']]))
                <td>{{ $totalizer_sales[$product['product_id']] }} litra</td>
                <td>{{ number_format($totalizer_sales[$product['product_id']] - $product['totalLit'], 2, '.', '')  }} litra</td>
                @endif
            </tr>
            @endforeach
        </tbody>

    </table>
    @endif
    <!-- END TOTAL SECTION -->

    <!-- STAFF SECTION -->
    @if (Request::input('url') == 'staff' || $request->url == 'staff')
    <h4>Staff</h4>
	<table width="100%" id="table_design">
		<thead style="background-color: lightgray;">
		  <tr>
            <th>Perdoruesi</th>
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
                        <td> {{ $product_totals[$key]['lit'] }} Lit / {{ number_format($product_totals[$key]['money'], 2, '.', '') }} Euro</td>
                    @endforeach
                <td> <b>{{ number_format($total_staff,2) }}</b> </td>
            </tr>
        </tbody>

    </table>
    @endif
    <!-- STAFF SECTION -->
    @if (Request::input('url') == 'staff' || Request::input('url') == 'companies' || $request->url == 'staff')
		<!-- COMPANIES SECTION -->
		@if(count($companies) != 0)
			@if (Request::input('url') == 'staff' || Request::input('url') == 'companies' || $request->url == 'staff')
			<h4>Company</h4>
			<table width="100%" id="table_design">
				<thead style="background-color: lightgray;">
					<tr>
						<th>Kompania</th>
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
		<h4>Products by Price</h4>
		<table width="100%" id="table_design">
			<thead style="background-color: lightgray;">
                <tr>
                    <th>Produkti</th>
                    <th>Cmimi</th>
                    <th>Sasia</th>
					<th>Totali</th>
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
        <h4>Average</h4>
        <table width="100%" id="table_design">
            <thead>
                <tr>
                    <th>Produkti</th>
                    <th>Cmimi</th>
                    <th>Sasia</th>
                    <th>Totali</th>
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
	  <!-- START PRODUCTS SECTION -->
</body>
</html>
