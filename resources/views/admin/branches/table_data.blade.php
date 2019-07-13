@foreach($branches as $branch)
<tr>
    <td>{{ $branch->name }}</td>
    <td>{{ $branch->address }}</td>
    <td>{{ $branch->city }}</td>
    <td>{{ $branch->status == 1 ? 'Active' : 'No active' }}</td>
    <td>{{ $branch->created_at->diffForHumans() }}</td>
    <td>{{ $branch->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/branches/'.$branch->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('branch.delete', $branch->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($branches->total() > 15)
    @include('includes.pagination', ['data' => $branches])
@endif

@include('includes.spinner')

