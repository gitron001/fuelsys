@if(isset($tanks) && count($tanks) > 0)
<div class="box box-primary">
    <div style="margin: 5px;text-align:right;">
    <a href="{{ url('/admin/stock/create') }}"><span class="label label-primary">+ Stock</span></a>
    </div>
    @foreach($tanks as $tank)
        <div class="col-xs-6 col-md-4 text-center" style="margin-top: 5px;">
            <div style="margin-top: 8px; line-height:10px;">
                @php ($data = 0) @endphp
                <p class="text-center"><b>{{ $tank->name }} ( {{ $tank->product->name }} )</b></p>
                @foreach($sales as $sale)
                    @if($sale->product_id == $tank->product_id)
                        @if(count($tank->totalStock()) > 0)
                            @if ($sale->product_id == $tank->totalStock()[0]->tank['product_id'])
                                @php ($present = ($tank->totalStock()[0]->amount - $sale->total_lit)) @endphp
                                <p>Present: {{ round($present,2) }} litra</p>
                                @php ($data = $present) @endphp
                            @elseif(!$tank->totalStock()->contains('tank_id',$tank->id))
                                <p>Present: {{ round($sale->total_lit,2) }} litra</p>
                                @php ($data = $sale->total_lit) @endphp
                                @break
                            @endif
                        @else
                            <p>Present: {{ round($sale->total_lit,2) }} litra</p>
                            @php ($data = $sale->total_lit) @endphp
                        @endif
                    @endif
                @endforeach
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
