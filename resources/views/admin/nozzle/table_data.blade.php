@foreach($pumps as $pump)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $pump->id }}"></td>
    <td>{{ $pump->name }}</td>
    <td>{{ $pump->tank ? $pump->tank->name : '' }}</td>
    <td>{{ $pump->dispaneser ? $pump->dispaneser->name : '' }}</td>
    <td>{{ $pump->starting_totalizer  }}</td>
    <td>{{ $pump->status == 1 ? 'Active' : 'No active' }}</td>
    <td>{{ $pump->created_at->diffForHumans() }}</td>
    <td>{{ $pump->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/nozzle/'.$pump->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('nozzle.delete', $pump->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($pumps->total() > 15)
    @include('includes.pagination', ['data' => $pumps])
@endif

@include('includes.spinner')
