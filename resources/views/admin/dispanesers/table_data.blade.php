@foreach($dispanesers as $dispaneser)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $dispaneser->id }}"></td>
    <td>{{ $dispaneser->name }}</td>
    <td>{{ $dispaneser->pfc ? $dispaneser->pfc->name : '' }}</td>
    <td>{{ $dispaneser->created_at->diffForHumans() }}</td>
    <td>{{ $dispaneser->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/dispanesers/'.$dispaneser->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.dispensers.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('dispaneser.delete', $dispaneser->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.dispensers.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($dispanesers->total() > 15)
    @include('includes.pagination', ['data' => $dispanesers])
@endif

@include('includes.spinner')
