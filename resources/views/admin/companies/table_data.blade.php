@foreach($companies as $company)
<tr>
    <td>{{ $company->name }}</td>
    <td>{{ $company->fis_number }}</td>
    <td>{{ $company->tel_number }}</td>
    <td>{{ $company->contact_person }}</td>
    <td>{{ $company->email }}</td>
    <td>{{ $company->status == 1 ? 'Active' : 'No active'  }}</td>
    <td>{{ $company->limit_left }}</td>
    <td>{{ $company->created_at->diffForHumans() }}</td>
    <td>{{ $company->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/companies/'.$company->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('company.delete', $company->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach
<tr>
    <td colspan=100% align="center">
        {{ $companies->links() }}
    </td>
</tr>