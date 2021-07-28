@foreach($pfc as $p)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $p->id }}"></td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->ip }}</td>
    <td>{{ $p->port }}</td>
    <td>{{ $p->created_at->diffForHumans() }}</td>
    <td>{{ $p->updated_at->diffForHumans() }}</td>
    <td align="center">
        <a href="{{ route('pfc.command', [$p->id, '2']) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.pfc_details.import_prices') }}" onclick="return confirm('Are you sure?');">
            <i class="fa fa-arrow-circle-down"></i>
        </a>
    </td>
    <td align="center">
        <a href="{{ route('pfc.command', [$p->id, '4']) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.pfc_details.upload_prices') }}" onclick="return confirm('Are you sure?');">
            <i class="fa fa-arrow-circle-up"></i>
        </a>
    </td>
    <td align="center">
        <a href="{{ route('pfc.command', [$p->id, '3']) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.pfc_details.import_channel') }}" onclick="return confirm('Are you sure?');">
            <i class="fa fa-arrow-circle-down"></i>
        </a>
    </td>

    <td align="center">
        @if(is_null($p->stopped))
			<a href="{{ route('pfc.command', [$p->id, '5']) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.pfc_details.stop_pfc') }}" onclick="return confirm('Are you sure?');">
				<i class="fas fa-stop"></i>
			</a>
		@else
			<a href="{{ route('pfc.command', [$p->id, '6']) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.pfc_details.start_pfc') }}" onclick="return confirm('Are you sure?');">
				<i class="fas fa-play"></i>
			</a>
		@endif
    </td>

    <td class="text-center" width="8%">
        <a href="{{ url('admin/pfc/'.$p->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('pfc.delete', $p->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($pfc->total() > 15)
    @include('includes.pagination', ['data' => $pfc])
@endif

@include('includes.spinner')
