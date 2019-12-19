@foreach($commands as $fa)
    <tr>
    <td>{{ $command_types[$fa->type] }}</td>
    <td>{{ $fa->channel_id }}</td>
    <td><textarea style="widht:100px" disabled>{{ print_r(unserialize($fa->command)) }}</textarea></td>
    <td>{{ $fa->created_at }}</td>
    </tr>
@endforeach

@if($commands->total() > 15)
    @include('includes.pagination', ['data' => $commands])
@endif

@include('includes.spinner')