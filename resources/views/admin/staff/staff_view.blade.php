@extends('adminlte::page')

@section('content')
<div class="box box-primary">
    <br>
    <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/staff') }}" role="form">
        <div class="box-body">
            <!--<div class="form-group" style="display: none;">
                <label for="Start Date:">Start Date:</label>
                <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="#" value="">
            </div>-->

            <!--<div class="form-group" style="display: none;">
                <label for="End Date:">End Date:</label>
                <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="#" value="">
            </div>-->

            <div class="form-group">
                <label for="Shift:">Shift</label>
                <select class="form-control" name="shift" id="shift">
                    <option value="">Select shift</option>
                    @foreach($shift as $shift)
                        <?php $start_end_date = $shift->start_date . ' - ' . $shift->end_date; ?>
                        <option value="{{ $start_end_date }}" @if($start_end_date == request()->get("shift")) selected @endif>
                            {{ date('m/d/Y H:i', $shift->start_date) }} - {{ date('m/d/Y H:i', $shift->end_date) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="User:">Staff:</label>
                <select class="users-dropdown form-control" name="user[]" multiple="multiple" id="user">
                <option value="">Select a user</option>
                @foreach($usersFilter as $id => $name)
                    <option value="{{ $id }}"
                    @if(!empty( request()->get("user") ))
                        @foreach( request()->get("user") as $us)
                        {{ $us == $id ? 'selected' : '' }}
                        @endforeach
                    @endif > {{ $name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" id="search" title="Search"><i class="fa fa-search"></i> Search</button>
                <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-warning" title="Clear All Filters"><i class="fa fa-trash"></i> Clear filters </a>
            </div>
            <button type="button" data-toggle="tooltip" class="btn btn-success" id="export_excel_staff_view" title="Export Excel"><i class="fas fa-file-excel"></i> Export</button>
            <button type="button" data-toggle="tooltip" class="btn btn-danger" id="close_shift" title="Close Shift"><i class="fas fa-exclamation-triangle"></i> Close Shift</button>
        </div>
    </form>
    <br>
</div>
<!-- END box box-primary -->

<!-- START Totalizers table -->
<div class="box box-primary" style="display:none;">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">Total</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>Produkti</th>
                    <th>Litrat</th>
                    <th>Totali</th>
                    <th>MIN</th>
                    <th>MAX</th>
                    <th>Totalizatori</th>
                </tr>
            </thead>
            <tbody>
			<?php $totalizer_sales = array(); ?>
            @foreach($totalizer_totals as $product)
            <tr>
                <td>{{ $product['product_name']. ' ' . $product['channel_id'] . ' ' . $product['sl_no'] }} </td>
                <td>{{ $product['lit'] }} litra</td>
                <td>{{ $product['money'] }} Euro</td>
                <td>{{ $product['min_totalizer']/100 }} Euro</td>
                <td>{{ $product['max_totalizer']/100 }} Euro</td>
                <td>{{ number_format($product['max_totalizer']/100 - $product['min_totalizer']/100, 2) }} Euro</td>
            </tr>
			<?php if(isset($totalizer_sales[$product['product_id']])){
					$totalizer_sales[$product['product_id']] += number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
				  }else{
					$totalizer_sales[$product['product_id']] = number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
				  }
			?>
            @endforeach
			<tr><td>
			<tr><td>
		    </tbody>
        </table>
    </div>
</div>
<!-- END products table -->

<!-- START products table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">Total</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>Produkti</th>
                    <th>Cmimi</th>
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
                <td>{{ $product['product_price'] }} Euro</td>
                <td>{{ $product['totalLit'] }} litra</td>
                <td>{{ $totalizer_sales[$product['product_id']] }} litra</td>
                <td>{{ number_format($totalizer_sales[$product['product_id']], 2, '.', '') - number_format($product['totalLit'], 2, '.', '')  }} litra</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END products table -->

<!-- START staff table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-user" aria-hidden="true"></i>
        <h3 class="box-title">Staff</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
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
					<td> <b>TOTAL:</b> </td>
                        @foreach($product_name as $key => $value)
							<td> {{ $product_totals[$key]['lit'] }} Lit / {{ number_format($product_totals[$key]['money'], 2, '.', '') }} Euro</td>
						@endforeach
					<td> <b>{{ number_format($total_staff,2) }}</b> </td>
				</tr>
            </tbody>
        </table>
    </div>
</div>
<!-- END staff table -->

@if(count($companies) != 0)
<!-- START company table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true"></i>
        <h3 class="box-title">Companies</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
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
					<td> <b>TOTAL:</b> </td>
                        @foreach($product_name_company as $key => $value)
							<td> {{ $product_totals[$key]['lit'] }} Lit / {{ number_format($product_totals[$key]['money'], 2, '.', '') }} Euro</td>
						@endforeach
					<td> <b>{{ number_format($total_company,2) }}</b> </td>
				</tr>
            </tbody>
        </table>
    </div>
</div>
<!-- END companies table -->
@endif

@endsection



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .main-sidebar{
            display: none;
        }
        @media (min-width: 768px) {
  .navbar-toggle {
      display:none
  }
}
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function(){

            // Export staff data to Excel
            $('#export_excel_staff_view').click(function(){
            var fromDate = $('#datetimepicker4').val();
            var toDate = $('#datetimepicker5').val();
            var shift = $('#shift').val();
            var user = $("#user").val();

                $.ajax({
                    type: "GET",
                    data: {fromDate: fromDate, toDate: toDate, user: user,shift:shift},
                    url: "{{ URL('/excel_export_staff_view')}}",
                    dataType: "JSON",
                    success: function(response, textStatus, request){
                    var a = document.createElement("a");
                    a.href = response.file;
                    a.download = response.name;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                    }
                });

            });

            // Close shift button
            $('#close_shift').click(function(){
                swal({
                    title: "A dëshironi të vazhdoni?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                    buttons: ['Jo','Po']
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: {"_token":"{{ csrf_token() }}"},
                        url: "{{ URL('/close_shift')}}",
                        beforeSend:function(){
                            window.swal({
                            title: "Ju lutem prisni!",
                            icon: "info",
                            text: "Të dhënat janë duke u ruajtur",
                            buttons:false,
                            });
                        },
                        success: function(e){
                            swal("Sukses", "Të dhënat u ruajtën me sukses", "success")
                        }
                    });
                } else {
                    swal("Kërkesa është anuluar.");
                }
            });


            });
        });

        $( document ).ready(function() {
            $('.users-dropdown').select2({
                placeholder: "Select a user"
            });

            document.querySelector('body').classList.remove('sidebar-mini');
            document.querySelector('body').classList.add('sidebar-collapse');
            $('.navbar a').removeClass("sidebar-toggle")
        });

        $(function () {
            var date = new Date();
            date.setDate(date.getDate() -1);
            $('#datetimepicker4').datetimepicker({
                defaultDate:date
            });

            var dateNow = new Date();
            $('#datetimepicker5').datetimepicker({
                defaultDate:dateNow
            });
        });
    </script>
@endsection
