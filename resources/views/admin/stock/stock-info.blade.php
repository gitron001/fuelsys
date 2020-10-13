<div class="box box-primary">
    <div style="margin: 5px;text-align:right;">
    <a href="{{ url('/stock') }}"><span class="label label-primary">+ Stock</span></a>
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
