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
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>
	<table width="100%">
	<tr>
	    <td valign="top"><img src="{{ public_path().'/images/nesim-bakija.png' }}" alt="" width="150"/></td>
	    <td align="right">
	        <h3>NESIM BAKIJA SH.P.K</h3>
	        <pre>
	            Rruga Skënderbeu, Gjakovë, Kosovë
	            Tax ID
	            phone
	            fax
	        </pre>
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
	    <th>MBETJA</th>
	  </tr>
	</thead>
	<tbody>
	<?php $total = 0; ?>
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
	        <td align="right">Total $</td>
	        <td align="right" class="gray">$ {{ $total }}</td>
	    </tr>
	</tfoot>
	</table>

</body>
</html>
