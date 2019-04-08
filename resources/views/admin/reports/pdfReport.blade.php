<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>NESIM BAKIJA SH.P.K.</title>

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
                RAPORT - NESIM BAKIJA SH.P.K.
            </td>
        </tr>
    </table>
	<br>
	<table width="100%">
	<tr>
	    <td valign="top"><img src="{{ public_path().'/images/nesim-bakija.png' }}" alt="" width="150"/></td>
	    <td align="right">
	        <pre>
	        	Raporti mbi kompaninë
			    Gjakovë, Kosovë
			    {{ date('m/d/Y h:i:s a', strtotime('+1 hour')) }}
			</pre>
	    </td>
	</tr>
	<tr>
	    <td valign="top">
	    	<h3>NESIM BAKIJA SH.P.K</h3>
	    	<p style="line-height:1.5">
	            <span>Rruga Skënderbeu </span><br/>
	            <span>Gjakovë, Kosovë</span><br/>
	            <span> 044 - 457 - 961</span>
	        </p>
	    </td>
	</tr>

	</table>

	<br/>

	<table width="100%">
	<thead style="background-color: lightgray;">
	  <tr>
	    <th>DATA</th>
	    <th>LLOJI</th>
	    <th>PERSONI</th>
	    <th>MBUSHJA</th>
	    <th>PAGESA</th>
	    <th>GJENDJA</th>
	  </tr>
	</thead>
	<tbody>
	<tr>
		<th scope="row">{{ $date }}</th>
	    <td>Gjendja Fillestare</td>
	    <td align="right"></td>
	    <td align="right"></td>
	    <td align="right"></td>
	    <td align="right">@if($oldPayments != 0) {{ $oldPayments }} @else {{ 0 }}@endif</td>
	</tr>
	<?php
		$total = $oldPayments;
	?>
	@foreach($payments as $py)
		<?php

		if($py->money == 0){
		    $fueling = 0;
		    $payment = $py->amount;
		}else{
		    $fueling = $py->money;
		    $payment = 0;
		}

		$total = $total + $fueling - $payment;

		?>

	  <tr>
	    <th scope="row">{{ (!empty($py->date)) ? date('m/d/Y h:i:sa',$py->date) : date('m/d/Y h:i:sa',$py->created_at) }}</th>
	    <td>{{ $py->type}}</td>
	    <td align="right">{{ $py->username }}</td>
	    <td align="right">{{ $fueling }}</td>
	    <td align="right">{{ $payment }}</td>
	    <td align="right">{{ $total }}</td>
	  </tr>
	@endforeach
	    <tr>
	        <td colspan="4"></td>
	        <td align="right">Totali €</td>
	        <td align="right" class="gray"> {{ $total }} €</td>
	    </tr>
	</tfoot>
	</table>

	<div class="information" style="position: absolute; bottom: 0;">
	    <table width="100%">
	        <tr>
	            <td align="center" style="width: 50%;">
	                &copy; {{ date('Y') }} - NESIM BAKIJA SH.P.K.
	            </td>
	        </tr>

	    </table>
	</div>

</body>
</html>
