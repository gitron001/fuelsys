@if(isset($tanks) && count($tanks) > 0)
<div class="box box-primary">
    <div style="margin: 5px;text-align:right;">
        <a href="{{ url('/admin/stock/create') }}"><span class="label label-primary">+ Stock</span></a>
    </div>
    @foreach($tanks as $tank)
		 @php ($total_sales = 0) @endphp
		@foreach($sales as $sale)
			@if($sale->tank_id == $tank->id)
				 @php ($total_sales = $sale->total_lit)  @endphp
				 @php  break @endphp
			@endif
		@endforeach
        <div class="col-xs-6 col-md-4 text-center" style="margin-top: 5px;">
            <div style="margin-top: 8px; line-height:10px;">
                @php ($data = 0) @endphp
                <p class="text-center"><b>{{ $tank->name }} ( {{ $tank->product->name }} )  </b></p>
				
				<p>Current tank level: {{  round(($tank->totalStockSensor()),2)  }}
					@php ($data = $tank->totalStock()[0]['amount'] - $total_sales ) @endphp
				</p>
				@if($total_sales != 0)
				<p>Calculated tank level: {{  round(($tank->totalStock()[0]['amount'] - $total_sales),2)  }}</p>
				<p>Difference: {{  round(($tank->totalStock()[0]['amount'] - $total_sales) - $tank->totalStockSensor(),2)  }}</p>
				@endif
            </div>
            <div id="tank">
                @php ($percentage = ($tank->totalStockSensor() / $tank->capacity) * 100 ) @endphp
                @php ($percentage = number_format(abs($percentage),0))@endphp
                <div class="fuel" style="height:{{ $percentage }}%; {{ $percentage <= 15 ? 'background:red;' : 'background:rgb(60, 141, 188)'}}"></div>
                <p class="tank-text">{{ $percentage }}%</p>
            </div>
        </div>
    @endforeach

    <div class="box-footer"></div>

</div>
@endif
