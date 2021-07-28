@foreach($stock as $data)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $data->id }}"></td>
    <td>{{ date('m/d/Y H:i', $data->date) }}</td>
    <td>{{ $data->tank->name }} | {{ $data->tank->product->name }}</td>
    <td>{{ $data->amount }}</td>
    <td>{{ $data->reference_number ? $data->reference_number : '-' }}</td>
    <td>{{ $data->created_at->diffForHumans() }}</td>
    <td>{{ $data->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/stock/'.$data->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('stock.delete', $data->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($stock->total() > 15)
    @include('includes.pagination', ['data' => $stock])
@endif

@include('includes.spinner')
