@if(isset($tanks) && count($tanks) > 0)
<div class="box box-primary">
    <div style="margin: 5px;text-align:right;">
    <a href="{{ url('/admin/stock/create') }}"><span class="label label-primary">+ Stock</span></a>
    </div>
    @foreach($tanks as $tank)
        <div class="col-xs-6 col-md-4 text-center" style="margin-top: 5px;">
            <div style="margin-top: 8px; line-height:10px;">
                @php ($data = 0) @endphp
                <p class="text-center"><b>{{ $tank->name }} ( {{ $tank->product->name }} )  </b></p>
				<p>Preset: {{  $tank->totalStock()[0]['amount'] - $tank->totalSales()[0]->total_lit  }} 
					@php ($data = $tank->totalStock()[0]['amount'] - $tank->totalSales()[0]->total_lit ) @endphp
				</p>
				<p>Sales per tank: {{ $tank->totalSales()[0]->total_lit }} </p>
				<p>Stock per tank: {{ $tank->totalStock()[0]['amount'] }}</p>
            </div>
            <div id="tank">
                @php ($percentage = ($data / $tank->capacity) * 100 ) @endphp
                    <div class="fuel" @if(number_format($percentage,0) <= 5) style="background:rgb(202, 48, 48);" @endif></div>
                <p class="tank-text">{{ number_format(abs($percentage),0) }}%</p>
            </div>
        </div>
    @endforeach

    <div class="box-footer"></div>

</div>
@endif
