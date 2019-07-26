@if(Request::isMethod('get'))
@foreach($transactions as $transaction)
    <tr>
        <td>{{ $transaction->user_name ? $transaction->user_name : '' }}</td>
        <td>{{ $transaction->comp_name ? $transaction->comp_name : '' }}</td>
        <td>{{ $transaction->product ? $transaction->product : '' }}</td>
        <td>{{ $transaction->price }}</td>
        <td>{{ $transaction->lit }}</td>
        <td>{{ $transaction->money }}</td>
        <td>{{ $transaction->created_at }}</td>
        <td class="text-center" width="8%">
            <a href="{{ url('admin/transactions/'.$transaction->id) }}" data-toggle="tooltip" title="Generate bill"><i class="fa fa-print"></i></a>&nbsp;
        </td>
    </tr>
@endforeach
@else
@foreach($transactions as $transaction)
    <td>{{ $transaction->user_name ? $transaction->users->name : '' }}</td>
    <td>{{ $transaction->users->company ? $transaction->users->company->name : '' }}</td>
    <td>{{ $transaction->product ? $transaction->product->name : '' }}</td>
    <td>{{ $transaction->price }}</td>
    <td>{{ $transaction->lit }}</td>
    <td>{{ $transaction->money }}</td>
    <td>{{ $transaction->created_at }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/transactions/'.$transaction->id) }}" data-toggle="tooltip" title="Generate bill"><i class="fa fa-print"></i></a>&nbsp;
    </td>
@endforeach
@endif
