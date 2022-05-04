@foreach($expenses as $expense)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $expense->id }}"></td>
    <td>{{ date('m/d/Y H:i', $expense->date) }}</td>
    <td>{{ $expense->user_name ? $expense->user_name : ' ' }} {{ $expense->company_name ? $expense->company_name : ' ' }}</td>
    <td>{{ $expense->amount }}</td>
    <td>{{ $expense->p_creater }}</td>
    <td>{{ $expense->expense_type }}</td>
    <td>{{ $expense->category_name }}</td>
    <td>{{ $expense->created_at->diffForHumans() }}</td>
    <td>{{ $expense->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/expenses/'.$expense->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i
                class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('expenses.delete', $expense->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}"
            class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($expenses->total() > 15)
@include('includes.pagination', ['data' => $expenses])
@endif

@include('includes.spinner')
