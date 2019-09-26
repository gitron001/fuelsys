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
		</tbody>
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
		<th align="center" scope="row">{{ date('Y-m-d h:i:s',strtotime($date)) }}</th>
	    <td align="center">Gjendja Fillestare</td>
	    <td align="right"></td>
	    <td align="right"></td>
	    <td align="right"></td>
	    <td align="right" class="gray">@if($balance != 0) {{ number_format($balance, 2) }} @else {{ 0 }}@endif</td>
	</tr>

	<?
	if($inc_transactions == 'No' || !isset($inc_transactions)) {
		$totalTrans = 0;
		$total_transaction = 0;
		
		foreach($total_transactions as $date => $transaction){ 
			$transaction_sum = 0; 
			$payment_sum = 0;
		
			foreach ($transaction as $tr) {
				if($tr->money == 0){
					$fueling = 0;
					$payment = $tr->amount;
				}else{
					$fueling = $tr->money;
					$payment = 0;
				}
				$transaction_sum += $tr->money;
				$payment_sum += $tr->amount;
				$totalTrans = str_replace(',', '', $totalTrans);
				$fueling = str_replace(',', '', $fueling);
				$payment = str_replace(',', '', $payment);
				$totalTrans = $totalTrans + $fueling - $payment; 
			
			if($tr->type == 'payment') { ?>
		<tr>
			<th align="center">{{ $date }}</th>	
			<td align="center">{{ !empty($tr->description) ? 'Pagese ('.$tr->description.')' : 'Pagese' }}</td>
			<td align="center">{{ $tr->username }}</td>
			<td align="center">{{ number_format($tr->money, 2) }} €</td>
			<td align="center"> {{ number_format($tr->amount, 2) }} € </td>
			<td align="right" class="gray"> {{ number_format($totalTrans, 2) }} €</td>
		</tr>
		<? } } ?>
		<tr @if($tr->type == 'payment') echo style="display:none;" @endif>
			<th align="center">{{ $date }}</th>	
			<td align="center">{{ $tr->type == 'payment' ? 'Pagese - '.$tr->description.'' : 'Transaksion' }}</td>
			<td align="center">{{ $tr->username }}</td>
			<td align="center">{{ number_format($transaction_sum, 2) }} €</td>
			<td align="center"> {{ number_format($tr->amount, 2) }} € </td>
			<td align="right" class="gray"> {{ number_format($totalTrans, 2) }} €</td>
		</tr>
	<? } } ?>
	<!-- END Total transactions row -->


	<!-- Show all rows except TOTAL row -->
	<? $total = $balance; ?>
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
		<tr @if(!isset($inc_transactions) || $inc_transactions == 'No' ) echo style="display:none;" @endif>
			<th align="center" scope="row">{{ ( $py->date !== 0 ) ? date('Y-m-d h:i:s', $py->date) : $py->created_at }}</th>
			<td align="center"> {{ $py->description == NULL  ? $py->type : $py->description }} </td>
			<td align="center">{{ $py->username }}</td>
			<td align="center">{{ $fueling }}</td>
			<td align="center">{{ $payment }}</td>
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
