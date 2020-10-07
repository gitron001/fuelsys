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
                    @if ($sale->product_id == $tank->id)
                        @if(count($stock_data) > 0)
                            @foreach($stock_data as $stok)
                                @php ($present = ($stok->amount - $sale->total_lit)) @endphp
                                @if ($sale->product_id == $stok->tank_id)
                                    <p>Present: {{ printf("%.1f", $present) }} litra</p>
                                @elseif(!$stock_data->contains('tank_id',$tank->id))
                                    <p>Present: {{ printf("%.1f", $present) }} litra</p>
                                    @break
                                @endif
                            @endforeach
                        @else
                            <p>Present: {{ printf("%.1f",$sale->total_lit) }} litra</p>
                        @endif
                    @endif

                @endforeach
            </div>
        </div>
    @endforeach

    <div class="box-footer"></div>

    </div>
