@foreach($pfc as $p)
<tr>
    <td>{{ $p->name }}</td>
    <td>{{ $p->ip }}</td>
    <td>{{ $p->port }}</td>
    <td>{{ $p->created_at->diffForHumans() }}</td>
    <td>{{ $p->updated_at->diffForHumans() }}</td>
    <td align="center">
        <a href="{{ route('pfc.command', [$p->id, '2']) }}" data-toggle="tooltip" title="Import Prices" onclick="return confirm('Are you sure?');">
            <i class="fa fa-arrow-circle-down"></i>
        </a>
    </td>
    <td align="center">
        <a href="{{ route('pfc.command', [$p->id, '4']) }}" data-toggle="tooltip" title="Upload Prices" onclick="return confirm('Are you sure?');">
            <i class="fa fa-arrow-circle-up"></i>
        </a>
    </td>
    <td align="center">
        <a href="{{ route('pfc.command', [$p->id, '3']) }}" data-toggle="tooltip" title="Import Channels" onclick="return confirm('Are you sure?');">
            <i class="fa fa-arrow-circle-down"></i>
        </a>
    </td>
    <td class="text-center" width="8%">
        <a href="{{ route('pfc.command', [$p->id, '5']) }}" data-toggle="tooltip" title="Restart PFC" onclick="return confirm('Are you sure?');">
            <i class="fas fa-sync-alt"></i>
        </a>
        <a href="{{ url('admin/pfc/'.$p->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('pfc.delete', $p->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($pfc->total() > 15)
    @include('includes.pagination', ['data' => $pfc])
@endif

@include('includes.spinner')