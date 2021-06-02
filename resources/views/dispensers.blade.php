@foreach($dispanesers as $dispaneser)
<div class="col-sm-3" id="wrapper">
    <div class="box-body">

        <ul style="list-style:none; margin:0; padding:0">
            <li class="text-center">
                <p class="text-center users-list-name">{{ $dispaneser->name }}</p>
                @if($dispaneser->status == 2)
                <i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}"
                    style="font-size:80px;color:#ffea00"></i>
                @elseif($dispaneser->status == 3)
                <i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}"
                    style="font-size:80px;color:#009d00"></i>
                @elseif($dispaneser->status == 4)
                <i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}"
                    style="font-size:80px;color:#f8001a"></i>
                @else
                <i class="fas fa-gas-pump channel_{{ $dispaneser->channel_id }}" style="font-size:80px;color:"></i>
                @endif
                @if( $dispaneser->user->name != "")
                <p class="text-center text_{{ $dispaneser->channel_id }}">{{ $dispaneser->user->name }} -
                    {{ number_format($dispaneser->current_amount/100, 2) }}</p>
                @else
                <p class="text-center text_{{ $dispaneser->channel_id }}"></p>
                @endif
            </li>
        </ul>
        <div class="dispenser_status">
            <span class="dot" id="pump_status" @if($dispaneser->pump_status == 0)
                style="background-color: #bbb;"
                @else
                style="background-color: green;"
                @endif>
            </span>
            <span class="dot" id="cardreader_status" @if($dispaneser->cardreader_status == 0)
                style="background-color: #bbb;"
                @else
                style="background-color: red;"
                @endif>
            </span>
        </div>

    </div>
</div>
@endforeach
