@foreach($invoices as $invoice)
<tr>
    <td>{{ '#'.$invoice->id }}</td>
    <td>{{ date('d/m/Y H:i', $invoice->date) }}</td>
    <td>{{ $invoice->user->name }}</td>
    <td>{{ $invoice->company->name }}</td>
    <td>{{ $invoice->paid == 1 ? trans('adminlte::adminlte.paid') : trans('adminlte::adminlte.unpaid') }}</td>
    <td>{{ $invoice->created_at->diffForHumans() }}</td>
    <td>{{ $invoice->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/invoices/'.$invoice->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.view') }}"><i class="fas fa-file-invoice"></i></a>&nbsp;
    </td>
</tr>
@endforeach

@if($invoices->total() > 15)
    @include('includes.pagination', ['data' => $invoices])
@endif

@include('includes.spinner')
