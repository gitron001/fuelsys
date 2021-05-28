@foreach($companies as $company)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $company->id }}"></td>
    <td>{{ $company->name }}</td>
    <td>{{ $company->fis_number }}</td>
    <td>{{ $company->tel_number }}</td>
    <td>{{ $company->contact_person }}</td>
    <td>{{ $company->email }}</td>
    <td>{{ $company->status == 1 ? 'Active' : 'No active'  }}</td>
    <td>{{ $company->has_limit == 2 ? $company->limit_left : 'N/A' }}</td>
    <td>{{ $company->created_at->diffForHumans() }}</td>
    <td>{{ $company->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/companies/'.$company->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('company.delete', $company->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($companies->total() > 15)
    @include('includes.pagination', ['data' => $companies])
@endif

@include('includes.spinner')
