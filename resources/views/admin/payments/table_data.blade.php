@foreach($payments as $payment)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $payment->id }}"></td>
    <td>{{ date('m/d/Y H:i', $payment->date) }}</td>
    <td>{{ $payment->amount }}</td>
    <td>{{ $payment->user_name ? $payment->user_name : ' ' }}</td>
	@if($payment->user_type == 1)
		<td> Staff </td>
	@else
		<td>{{ $payment->comp_name ? $payment->comp_name : ' ' }}</td>
    @endif
	<td>{{ $payment->p_creater }}</td>
    <td>{{ $payment->created_at->diffForHumans() }}</td>
    <td>{{ $payment->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/payments/'.$payment->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="#" data-payment="{{ $payment->id }}" data-toggle="tooltip" title="Generate bill" id="print_receipt"><i class="fa fa-print"></i></a>&nbsp;
        <a href="{{ route('payment.delete', $payment->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($payments->total() > 15)
    @include('includes.pagination', ['data' => $payments])
@endif

@include('includes.spinner')
