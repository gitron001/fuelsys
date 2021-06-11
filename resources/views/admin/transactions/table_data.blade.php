@if(Request::isMethod('get'))
@foreach($transactions as $transaction)
    <tr>
        <td>{{ $transaction->user_name ? $transaction->user_name : '' }}</td>
        <td>{{ $transaction->comp_name ? $transaction->comp_name : '' }}</td>
        <td>{{ $transaction->bonus_name ? $transaction->bonus_name : '' }}</td>
        <td>{{ $transaction->product ? $transaction->product : '' }}</td>
        <td>{{ $transaction->price }}</td>
        <td>{{ $transaction->lit }}</td>
        <td>{{ $transaction->money }}</td>
        <td>
            @if($transaction->invoice_id !== 0)
                <a href="{{ route('invoice.pdf', [$transaction->invoice_id]) }}" target="_blank">Fatura #{{$transaction->invoice_id}}</a>
            @else - @endif
        </td>
        <td>{{ $transaction->created_at }}</td>
        <td class="text-center" width="8%">
            @auth<a href="{{ url('admin/transactions/'.$transaction->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;@endauth
            <a href="#" data-toggle="modal" data-target="#show-transaction-history" data-target-id="{{ $transaction->id }}"><i class="fa fa-history" title="{{ trans('adminlte::adminlte.history') }}"></i></a>&nbsp;
            <a href="#" data-transaction="{{ $transaction->id }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.generate_bill') }}" id="print_receipt"><i class="fa fa-print"></i></a>&nbsp;
        </td>
    </tr>
@endforeach
@else
@foreach($transactions as $transaction)
    <td>{{ $transaction->user_name ? $transaction->users->name : '' }}</td>
    <td>{{ $transaction->users->company ? $transaction->users->company->name : '' }}</td>
    <td>{{ $transaction->bonus_name ? $transaction->bonus_name : '' }}</td>
    <td>{{ $transaction->product ? $transaction->product->name : '' }}</td>
    <td>{{ $transaction->price }}</td>
    <td>{{ $transaction->lit }}</td>
    <td>{{ $transaction->money }}</td>
    <td>
        @if($transaction->invoice_id !== 0)
            <a href="{{ route('invoice.pdf', [$transaction->invoice_id]) }}" target="_blank">Fatura #{{$transaction->invoice_id}}}</a>
        @else - @endif
    </td>
    <td>{{ $transaction->created_at }}</td>
    <td class="text-center" width="8%">
        @auth<a href="{{ url('admin/transactions/'.$transaction->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;@endauth
        <a href="#" data-toggle="modal" data-target="#show-transaction-history" data-target-id="{{ $transaction->id }}"><i class="fa fa-history" title="{{ trans('adminlte::adminlte.history') }}"></i></a>&nbsp;
        <a href="#" data-transaction="{{ $transaction->id }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.generate_bill') }}" id="print_receipt"><i class="fa fa-print"></i></a>&nbsp;
    </td>
@endforeach
@endif

@if($transactions->total() > 15)
    @include('includes.pagination', ['data' => $transactions])
@endif

@include('includes.spinner')
