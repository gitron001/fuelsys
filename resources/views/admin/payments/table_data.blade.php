@foreach($payments as $payment)
<tr>
    <td>{{ date('m/d/Y', $payment->date) }}</td>
    <td>{{ $payment->amount }}</td>
    <td>{{ $payment->user ? $payment->user->name : 'Empty' }}</td>
    <td>{{ $payment->company ? $payment->company->name : 'Empty' }}</td>
    <td>{{ $payment->created_at->diffForHumans() }}</td>
    <td>{{ $payment->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/payments/'.$payment->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ url('admin/payments/'.$payment->id) }}" data-toggle="tooltip" title="Generate bill"><i class="fa fa-print"></i></a>&nbsp;
        <a href="{{ route('payment.delete', $payment->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach
<tr>
    <td colspan=100% align="center">
        {{ $payments->links() }}
    </td>
</tr>