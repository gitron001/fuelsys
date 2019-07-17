@foreach($users as $user)
<tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->rfid }}</td>
    <td>{{ $user->company->name ? $user->company->name : 'No Company' }}</td>
    <td>{{ $user->one_time_limit }}</td>
    <td>{{ $user->plates }}</td>
    <td>{{ $user->vehicle }}</td>
    <td>{{ $user->created_at->diffForHumans() }}</td>
    <td>{{ $user->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/users/'.$user->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('user.delete', $user->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>    
</tr>
@endforeach

@if($users->total() > 15)
    @include('includes.pagination', ['data' => $users])
@endif

@include('includes.spinner')