<!Doctype html>
<?php if(!isset($bonus_user)){ $bonus_user = NULL; } ?>
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
                {{ trans('adminlte::adminlte.transactions_pdf.report') }} - {{ $company->name }}   &nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;  {{ date('d-m-Y H:i:s', time()) }}
            </td>
        </tr>
    </table>
	<br>
	<table width="100%">
	<tr>
		<td valign="top"><img src="{{ public_path('images/company/'.$company->images) }}" alt="" width="80"/></td>
	</tr>
	<tr>
		<td align="left">
            <p style="line-height:1.2">
                <span style="font-size: 16px;"><b> {{ $company->name }} </b></span><br/>
				<span><b>{{ trans('adminlte::adminlte.transactions_pdf.location') }} :</b> {{ $company->city }}, {{ $company->country }}</span><br/>
				<span><b>{{ trans('adminlte::adminlte.transactions_pdf.email') }} :</b> {{ $company->email }}</span><br/>
                <span><b>{{ trans('adminlte::adminlte.transactions_pdf.tel') }} :</b> {{ $company->tel_number }}</span><br/>
                <span><b>{{ trans('adminlte::adminlte.transactions_pdf.nr_biz') }} :</b> {{ $company->bis_number }}</span><br/>
                <span><b>{{ trans('adminlte::adminlte.transactions_pdf.tax_nr') }} :</b> {{ $company->tax_number }}</span><br/>
                <span><b>{{ trans('adminlte::adminlte.transactions_pdf.nr_fis') }} :</b> {{ $company->fis_number }}</span><br/>
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
					<p style="line-height:1.0">
					<span>{{ $u_d->residence }} </span><br/>
					<span>{{ $u_d->email }}</span><br/>
					<span>{{ $u_d->contact_number }}</span>
				</p>
			</td>
			@endforeach
        @endif
        <p align="center">
            <span>{{ trans('adminlte::adminlte.transactions_pdf.selected_dates') }}: <b>{{ $date }} - {{ $date_to ? $date_to : $to_date}}</b></span>
        </p>
	</tr>

	</table>

	<table width="100%">
		<thead style="background-color: lightgray;">
		  <tr>
			<th align="center">{{ trans('adminlte::adminlte.transactions_pdf.products') }}</th>
			<th align="center">{{ trans('adminlte::adminlte.transactions_pdf.quantity') }}</th>
			<th align="center">{{ trans('adminlte::adminlte.transactions_pdf.total') }}</th>
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
	    <th align="center">{{ trans('adminlte::adminlte.transactions_pdf.date') }}</th>
	    <th align="center">{{ trans('adminlte::adminlte.transactions_pdf.type') }}</th>
        <th align="center">{{ trans('adminlte::adminlte.transactions_pdf.user') }}</th>
        @if($bonus_user != NULL) <th align="center">{{ trans('adminlte::adminlte.transactions_pdf.bonus_user') }}</th> @endif
	    <th align="center">{{ trans('adminlte::adminlte.transactions_pdf.price') }}</th>
	    <th align="center">{{ trans('adminlte::adminlte.transactions_pdf.payment') }}</th>
	    <th align="center">{{ strtoupper(trans('adminlte::adminlte.transactions_pdf.state')) }}</th>
	  </tr>
	</thead>
	<tbody>
	@if(!$exc_balance)
	<tr>
		<th align="center" scope="row">{{ date('Y-m-d H:i',strtotime($date)) }}</th>
	    <td align="center">{{ ucfirst(trans('adminlte::adminlte.transactions_pdf.state')) }}</td>
	    <td align="right"></td>
	    <td align="right"></td>
        <td align="right"></td>
        @if($bonus_user != NULL) <td align="right"></td> @endif
	    <td align="right" class="gray">@if($balance != 0) {{ number_format($balance, 2) }} @else {{ 0 }}@endif</td>
	</tr>
	@endif
	<?php
	$total = 0;
	if($inc_transactions == 'No' || !isset($inc_transactions)) {
		$totalTrans = $balance;
		$total_transaction = 0;

		foreach($total_transactions as $date => $transaction){
			$transaction_sum = 0;
            $payment_sum = 0;
            $tt = 0;

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
                $details = $tr->description;
				$totalTrans = str_replace(',', '', $totalTrans);
				$fueling = str_replace(',', '', $fueling);
				$payment = str_replace(',', '', $payment);
				$totalTrans = $totalTrans + $fueling - $payment;
				$total		= $totalTrans;
			if($tr->type == 'payment') { ?>
		<tr>
			<th align="center">{{ $date }}</th>
			<td align="center">{{ !empty($tr->description) ? 'P ('.$tr->description.')' : 'P' }}</td>
            <td align="center">@if(trim($tr->plates) != "" && $tr->plates != 0) {{ $tr->plates }} @else {{ $tr->username }} @endif</td>
            @if($bonus_user != NULL) <td align="center">{{ $tr->bonus_username }}</td> @endif
			<td align="center">{{ number_format($tr->money, 2) }} €</td>
			<td align="center"> {{ number_format($tr->amount, 2) }} € </td>
			<td align="right" class="gray"> {{ number_format($totalTrans, 2) }} €</td>
		</tr>
		<?php } } ?>
		<tr @if($tr->type == 'payment') echo style="display:none;" @endif>
			<th align="center">{{ $date }}</th>
			<td align="center">{{ $tr->type == 'payment' ? 'P - '.$tr->description.'' : 'T' }}</td>
            <td align="center">@if(trim($tr->plates) != "" && $tr->plates != 0) {{ $tr->plates }}  @else {{ $tr->username }} @endif</td>
            @if($bonus_user != NULL) <td align="center">{{ $tr->bonus_username }}</td> @endif
			<td align="center">{{ number_format($transaction_sum, 2) }} €</td>
			<td align="center"> {{ number_format($tr->amount, 2) }} € </td>
			<td align="right" class="gray"> {{ number_format($totalTrans, 2) }} €</td>
		</tr>
	<?php } }else{ ?>
	<!-- END Total transactions row -->


	<!-- Show all rows except TOTAL row -->
	<?php $total = $balance; ?>
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
		<tr>
			<th align="center" scope="row">{{ ( $py->date !== 0 ) ? date('Y-m-d H:i', $py->date) : $py->created_at }}</th>
			<td align="center" @if($py->type == "P") style="background-color:grey" @endif > {{ $py->description == NULL  ? $py->type : $py->description }} </td>
            <td align="center">@if(trim($py->plates) != "" && $py->plates != 0) {{ $py->plates }} @else {{ $py->username }} @endif</td>
            @if($bonus_user != NULL) <td align="center">{{ $py->bonus_username }}</td> @endif
			<td align="center">{{ number_format($py->lit, 2) }} L | {{ $py->price }} | {{ number_format($fueling, 2) }} €</td>
			<td align="center">{{ $payment }}</td>
			<td align="right">{{ number_format($total, 2) }}</td>
		</tr>
	@endforeach
	<!-- END Show all rows except TOTAL row -->
	<?php } ?>
	<!-- Show only last row (TOTAL row) -->
		<tr>
	        @if($bonus_user != NULL) <td colspan="5"></td> @else <td colspan="4"></td> @endif
	        <td align="right">Sub Total €</td>
	        <td align="right" class="gray"> {{ number_format($total - $balance, 2) }} €</td>
		</tr>
	    <tr>
	        @if($bonus_user != NULL) <td colspan="5"></td> @else <td colspan="4"></td> @endif
	        <td align="right">Total €</td>
	        <td align="right" class="gray"> {{ number_format($total, 2) }} €</td>
		</tr>
	<!-- END Show only last row (TOTAL row) -->
	</tfoot>
	</table>

</body>
</html>
