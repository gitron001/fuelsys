@foreach($commands as $command)
    <tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $command->id }}"></td>
    <td>{{ $command_types ? $command_types[$command->type] : '' }}</td>
    <td>{{ $command->dispaneser['name'] }}</td>
    <td><textarea style="widht:100px" disabled>{{ print_r(unserialize($command->command)) }}</textarea></td>
    <td>{{ $command->created_at }}</td>
    </tr>
@endforeach

@if($commands->total() > 15)
    @include('includes.pagination', ['data' => $commands])
@endif

@include('includes.spinner')
