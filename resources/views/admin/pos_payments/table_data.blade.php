@foreach($pos_payments as $payment)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $payment->id }}"></td>
    <td>{{ date('m/d/Y H:i', $payment->date) }}</td>
    <td>{{ $payment->bank->name }}</td>
    <td>{{ number_format($payment->amount,2) }} Euro</td>
    <td>{{ $payment->created_at->diffForHumans() }}</td>
    <td>{{ $payment->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/pos-payments/'.$payment->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('pos-payments.delete', $payment->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($pos_payments->total() > 15)
    @include('includes.pagination', ['data' => $pos_payments])
@endif

@include('includes.spinner')
