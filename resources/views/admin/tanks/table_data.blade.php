@foreach($tanks as $tank)
<tr>
    <td>{{ $tank->name }}</td>
    <td>{{ $tank->product->name }}</td>
    <td>{{ $tank->capacity }}</td>
    <td>{{ $tank->status == 1 ? 'Active' : 'No active' }}</td>
    <td>{{ $tank->created_at->diffForHumans() }}</td>
    <td>{{ $tank->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/tanks/'.$tank->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('tank.delete', $tank->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>                  
</tr>
@endforeach

@if($tanks->total() > 15)
    @include('includes.pagination', ['data' => $tanks])
@endif

@include('includes.spinner')