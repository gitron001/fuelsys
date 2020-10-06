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
                @if(count($stock_data) > 0)
                    @foreach($stock_data as $stock)
                        @foreach($sales as $sale)
                            @if($stock->tank_id == $tank->id && $stock->tank_id == $sale->product_id)
                                @php ($present = ($stock->amount - $sale->total_lit)) @endphp
                                <p>Present: {{ $present }} litra</p>
                            @endif
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach

    <div class="box-footer"></div>

    </div>
