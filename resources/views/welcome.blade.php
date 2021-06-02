@extends('adminlte::page')

@section('content')
<style>
.active {
    color:red;
}
#wrapper {
    width: 25%;
    height: 165px;
    display: block;
    text-align: center;
}
#tank {
    width: 70px;
    height: 70px;
    position: relative;
    background: #ecf0f5;
    border-radius: 50%;
    overflow: hidden;
    margin: auto;
    border-style: solid;
    border-color: #92a8d1;
}
#tank .fuel {
    position: absolute;
    background: rgb(60, 141, 188);
    width: 100%;
    bottom: 0;
    animation: cubic-bezier(.17,.67,.83,.67)
}
.tank-text {
    position: absolute;
    color: black;
    margin: auto;
    width: 50%;
    padding: 30%;
}
.dot {
  height: 12px;
  width: 12px;
  border-radius: 50%;
  display: inline-block;
}
</style>

<div class='row'>
    <div class="col-md-6">
        <div class="box box-primary" style="height: 550px;">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('adminlte::adminlte.dispensers') }}</h3>

            <div class="box-tools pull-right">
                <span class="label label-primary">{{ trans('adminlte::adminlte.total') }}: {{count($dispanesers)}}</span>
                <a href="#" class="update_dispensers_status"><span class="label label-primary" id="span-text">Update <i id="spiner" class="fa fa-spinner fa-spin" style="font-size:12px; display:none;"></i>
                </span></a>
            </div>
        </div>

        <div class="dispensers">
            @include('dispensers')
        </div>

      <div class="box-footer"></div>

      </div>
  </div>
<!-- Companies with low limit Area -->
@if(count($company_low_limit) != 0)
<div class="col-md-3 table-wrapper-scroll-y my-custom-scrollbar scrollStyle">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Companies with low limit</h3>
    </div>

    <div class="box-body">
        <div class="table-responsive">
        <table class="table no-margin">
            <thead>
            <tr>
            <th class="text-center">Company</th>
            <th class="text-center">Limit left</th>
            </tr>
            </thead>
            <tbody>
            @foreach($company_low_limit as $comp_low_limit)
                <tr class="text-center">
                    <td>{{ $comp_low_limit->name }}</td>
                    <td>{{ $comp_low_limit->limit_left }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <div class="box-footer clearfix text-center">
        <a href="/admin/companies" class="btn btn-sm btn-default btn-flat">View All Companies</a>
    </div>
  </div>
</div>
@endif
<!-- END Companies with low limit Area -->

<!-- LIVE Feed Area -->
<div class="col-md-6 table-wrapper-scroll-y my-custom-scrollbar scrollStyle" id="loadTransaction">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('adminlte::adminlte.transactions') }}</h3>
        <span class="pulse"></span>
    </div>

    <div class="box-body">
        <div class="table-responsive">
        <table class="table no-margin">
            <thead>
            <tr>
            <th class="text-center">{{ trans('adminlte::adminlte.user') }}</th>
            <th class="text-center">{{ trans('adminlte::adminlte.product') }}</th>
            <th class="text-center">{{ trans('adminlte::adminlte.amount') }}</th>
            <th class="text-center">{{ trans('adminlte::adminlte.date') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr class="text-center">
                    <td>{{ $transaction->users ? $transaction->users->name : '' }} {{ $transaction->users != NULL ? '( '.$transaction->users->company->name.' )' : '' }}</td>
                    <td>{{ $transaction->product ? $transaction->product->name : '' }}</td>
                    <td>{{ $transaction->money }}</td>
                    <td>{{ $transaction->created_at->format('m-d H:i:s') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

        <div class="box-footer clearfix text-center">
            <a href="/admin/transactions" class="btn btn-sm btn-default btn-flat">View All Transactions</a>
        </div>
    </div>


  </div>
</div>
<!-- END LIVE Feed Area -->

<!-- Tanks -->
<div class="col-md-12" id="loadTanks">
    @include('admin.stock.stock-info')
</div>
<!-- END Tanks -->

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script src="js/app.js"></script>
<script>

    $(document).ready(function(){
        // Load tanks after page load
        //$('#loadTanks').load('{{ url('/stock-info')}}');

        // Refresh transaction and tanks data
        setInterval(function(){
            $('#loadTransaction').load('{{ url('/transactions-info')}}').fadeIn('slow');
        },60000);

        // Refresh dispensers status
        setInterval(function(){
            $('.dispensers').load('{{ url('/update-dispensers-status')}}').fadeIn('slow');
        },60000);

		//$('#loadTanks').load('{{ url('/stock-info')}}').fadeIn('slow');
        /*setInterval(function(){

        },10000);*/
    });

    $(document).on('click', '.update_dispensers_status', function(e) {
        document.getElementById("spiner").style.display = "inline-block";
        $.get("/update-dispensers-status", function (data) {
            document.getElementById("spiner").style.display = "none";
            $(".dispensers").html(data);
        });
    });

</script>

@endsection
