<!Doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ $company->name }}</title>

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
</style>

</head>
<body>

    <table width="100%" class="information">
        <tr>
            <td align="center" style="width: 50%;">
                RAPORT - {{ $company->name }}
            </td>
        </tr>
    </table>
	<br>
	<table width="100%">
	<tr>
		<td valign="top"><img src="{{ public_path().'/images/company/'.$company->images }}" alt="" width="150"/></td>
	</tr>
	<tr>

		<td align="left">
	    <h3>{{ $company->name }}</h3>
	    	<p style="line-height:1.5">
				<span>{{ $company->city }}, {{ $company->country }}</span><br/>
				<span>{{ $company->email }}</span><br/>
	            <span> {{ $company->tel_number }}</span>
	        </p>
		</td>

		<td align="right">
		@if(isset($company_details))
		<h3>{{ $company_details->name }}</h3>
	    	<p style="line-height:1.5">
				<span>{{ $company_details->city }}, {{ $company_details->country }}</span><br/>
				<span>{{ $company_details->email }}</span><br/>
	            <span> {{ $company_details->tel_number }}</span>
	        </p>
		@endif
		</td>

		@if(isset($user_details))
			@foreach($user_details as $u_d)
			<td align="right">
				<h3>{{ $u_d->name }}</h3>
					<p style="line-height:1.5">
					<span>{{ $u_d->residence }} </span><br/>
					<span>{{ $u_d->email }}</span><br/>
					<span> {{ $u_d->contact_number }}</span>
				</p>
			</td>
			@endforeach
		@endif

	</tr>

	</table>

	<br/>

	<table width="100%">
		<thead style="background-color: lightgray;">
		  <tr>
			<th align="center">PRODUKTI</th>
			<th align="center">SASIA</th>
			<th align="center">TOTALI</th>
		  </tr>
		</thead>
		<tbody>
		@foreach($data as $d)
		  <tr>
			<td align="center">{{ $d['product_name'] }}</td>
			<td align="center">{{ $d['lit'] }} litra</td>
			<td align="center">{{ $d['money'] }} Euro</td>
		  </tr>
		@endforeach
		</tfoot>
		</table>

	<br>

	<table width="100%">
	<thead style="background-color: lightgray;">
	  <tr>
	    <th align="center">DATA</th>
	    <th align="center">LLOJI</th>
	    <th align="center">PERSONI</th>
	    <th align="center">MBUSHJA</th>
	    <th align="center">PAGESA</th>
	    <th align="center">GJENDJA</th>
	  </tr>
	</thead>
	<tbody>
	<tr>
		<th scope="row">{{ date('Y-m-d h:i:s',strtotime($date)) }}</th>
	    <td>Gjendja Fillestare</td>
	    <td align="right"></td>
	    <td align="right"></td>
	    <td align="right"></td>
	    <td align="right" class="gray">@if($balance != 0) {{ number_format($balance, 2) }} @else {{ 0 }}@endif</td>
	</tr>
	<?php
		$totalTrans = 0;
		$transaction = 0;
		if($inc_transactions == 'Yes')	{
			$totalTrans = $balance;
		}
		// Get sum of all transactions when we need to show only payments without transactions
		foreach($payments as $py){
			if($py->money == 0){
				$fueling = 0;
				$payment = $py->amount;
			}else{
				$fueling = $py->money;
				$payment = 0;
			}

			$totalTrans = str_replace(',', '', $totalTrans);
			$fueling = str_replace(',', '', $fueling);
			$totalTrans = $totalTrans + $fueling;

			if($py->type == 'transaction'){
				$transaction = $totalTrans;
			}
		}

		// Total balance 
		$total = $balance;
	?>
	
	<!-- Total Transactions row -->
	<tr @if($inc_transactions == 'Yes') echo style="display:none;" @endif>
		<td></td>
		<td>Total Transactions</td>
		<td colspan="3"></td>
		<td align="right" class="gray"> {{ number_format($transaction, 2) }} €</td>
	</tr>
	<!-- END Total transactions row -->

	<!-- Show all rows except TOTAL row -->
	@foreach($payments as $py)
		<?php

		if($py->money == 0){
		    $fueling = 0;
		    $payment = $py->amount;
		}else{
		    $fueling = $py->money;
		    $payment = 0;
		}
		$total = str_replace(',', '', $total);
		$fueling = str_replace(',', '', $fueling);
		$payment = str_replace(',', '', $payment);
		$total = $total + $fueling - $payment;
		
		?>
		<tr @if($py->type == 'transaction' && ($inc_transactions == 'No' || !request()->has('inc_transactions'))) echo style="display:none;" @endif>
			<th scope="row">{{ ( $py->date !== 0 ) ? date('Y-m-d h:i:s', $py->date) : $py->created_at }}</th>
			<td> {{ $py->description == NULL  ? $py->type : $py->description }} </td>
			<td align="right">{{ $py->username }}</td>
			<td align="right">{{ $fueling }}</td>
			<td align="right">{{ $payment }}</td>
			<td align="right">{{ number_format($total, 2) }}</td>
		</tr>
	@endforeach
	<!-- END Show all rows except TOTAL row -->

	<!-- Show only last row (TOTAL row) -->
	    <tr>
	        <td colspan="4"></td>
	        <td align="right">Totali €</td>
	        <td align="right" class="gray"> {{ number_format($total, 2) }} €</td>
		</tr>
	<!-- END Show only last row (TOTAL row) -->
	</tfoot>
	</table>

	<div class="information" style="position: absolute; bottom: 0;">
	    <table width="100%">
	        <tr>
	            <td align="center" style="width: 50%;">
	                &copy; {{ date('Y') }} - {{ $company->name }}
	            </td>
	        </tr>

	    </table>
	</div>

</body>
</html>
