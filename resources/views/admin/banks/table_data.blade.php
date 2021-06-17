@foreach($banks as $bank)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $bank->id }}"></td>
    <td>{{ $bank->name }}</td>
    <td>{{ $bank->bank_number }}</td>
    <td>{{ $bank->status == 1 ? 'Active' : 'No active' }}</td>
    <td>{{ $bank->created_at->diffForHumans() }}</td>
    <td>{{ $bank->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/banks/'.$bank->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('banks.delete', $bank->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($banks->total() > 15)
    @include('includes.pagination', ['data' => $banks])
@endif

@include('includes.spinner')
