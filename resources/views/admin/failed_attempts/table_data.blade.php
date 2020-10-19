@foreach($failed_attempts as $fa)
    <tr>
        <td>{{ $fa->pfc_id }}</td>
        <td>{{ $fa->rfid }}</td>
        <td>{{ $fa->channel_id }}</td>
        <td>{{ $fa->type }}</td>
        <td>{{ $fa->created_at }}</td>
    </tr>
@endforeach

@if($failed_attempts->total() > 15)
    @include('includes.pagination', ['data' => $failed_attempts])
@endif

@include('includes.spinner')
