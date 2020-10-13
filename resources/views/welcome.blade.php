@extends('adminlte::page')

@section('content')
<style>
.active {
    color:red;
}
#wrapper {
    width: 25%;
    height: 180px;
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
</style>

<div class='row'>
  <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Dispanesers</h3>

          <div class="box-tools pull-right">
          <span class="label label-primary">Total: {{count($dispanesers)}}</span>
          </div>
      </div>

      @foreach($dispanesers as $dispaneser)
      <div class="col-sm-3" id="wrapper">
        <div class="box-body">

            <ul style="list-style:none; margin:0; padding:0">
            <li class="text-center">
				<p class="text-center users-list-name">{{ $dispaneser->name }}</p>
				@if($dispaneser->status == 2)
					<i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}" style="font-size:80px;color:#ffea00"></i>
				@elseif($dispaneser->status == 3)
					<i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}" style="font-size:80px;color:#009d00"></i>
				@elseif($dispaneser->status == 4)
					<i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}" style="font-size:80px;color:#f8001a"></i>
				@else
					<i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}" style="font-size:80px;color:"></i>
				@endif
				@if( $dispaneser->user->name  != "")
					<p class="text-center text_{{ $dispaneser->channel_id }}">{{ $dispaneser->user->name }} - {{ number_format($dispaneser->current_amount/100, 2) }}</p>
				@else
					<p class="text-center text_{{ $dispaneser->channel_id }}"></p>
				@endif
            </li>
            </ul>

        </div>
      </div>
      @endforeach

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
        <h3 class="box-title">Live Feed</h3>
        <span class="pulse"></span>
    </div>

    <div class="box-body">
        <div class="table-responsive">
        <table class="table no-margin">
            <thead>
            <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Product</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Date</th>
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
@if(count($tanks) > 0)
<div class="col-md-12" id="loadTanks">
    <div class="box box-primary">
    <div style="margin: 5px;text-align:right;">
    <a href="{{ url('/admin/stock/create') }}"><span class="label label-primary">+ Stock</span></a>
    </div>
    @foreach($tanks as $tank)
        <div class="col-xs-6 col-md-4 text-center" style="margin-top: 5px;">
            <p class="text-center"><b>{{ $tank->name }} ( {{ $tank->product->name }} )</b></p>
            <div id="tank">
                @php ($percentage = ($tank->quantity / $tank->capacity) * 100 ) @endphp
                <div class="fuel" style="height:{{ $percentage }}%">
                </div>
                <p class="tank-text">{{ number_format($percentage,0) }}%</p>
            </div>
            <div style="margin-top: 8px; line-height:10px;">
                @foreach($sales as $sale)
                    @if ($sale->product_id == $tank->product_id)
					{{-- $sale->product_id  }} - {{ $tank->product_id --}} </br>
                        @if(count($tank->totalStock()) > 0)
                            @if ($sale->product_id == $tank->totalStock()[0]->tank_id)
                                @php ($present = ($tank->totalStock()[0]->amount - $sale->total_lit)) @endphp
                                <p>Present: {{ printf("%.1f", $present) }} litra</p>
                            @elseif(!$tank->totalStock()->contains('tank_id',$tank->id))
                                <p>Present: {{ printf("%.1f", $sale->total_lit) }} litra</p>
                                @break
                            @endif
                        @else
                            <p>Present: {{ printf("%.1f", $sale->total_lit) }} litra</p>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach

    <div class="box-footer"></div>

    </div>
</div>
@endif
<!-- END Tanks -->

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script src="js/app.js"></script>
<script>

    $(document).ready(function(){
        setInterval(function(){
            $('#loadTransaction').load('{{ url('/transactions-info')}}').fadeIn('slow');
        },60000);

        setInterval(function(){
            $('#loadTanks').load('{{ url('/stock-info')}}').fadeIn('slow');
        },60000);
    });

</script>

@endsection
