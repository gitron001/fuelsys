@foreach($transactions as $transaction)
    <tr>
    <td>{{ $transaction->user_name ? $transaction->user_name : '' }}</td>
    <td>{{ $transaction->comp_name ? $transaction->comp_name : '' }}</td>
    <td>{{ $transaction->bonus_name ? $transaction->bonus_name : '' }}</td>
    <td>{{ $transaction->product ? $transaction->product : '' }}</td>
    <td>{{ $transaction->price }}</td>
    <td>{{ $transaction->lit }}</td>
    <td>{{ $transaction->money }}</td>
    <td>{{ $transaction->created_at }}</td>
    </tr>
@endforeach

@if($transactions->total() > 15)
    @include('includes.pagination', ['data' => $transactions])
@endif

@include('includes.spinner')
