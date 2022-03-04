@if(count($pos_sales) != 0)
<?php global $pos_total; ?>
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-book" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.pos_sales') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.date') }}</th>
                    <th>{{ trans('adminlte::adminlte.banks') }}</th>
                    <th>{{ trans('adminlte::adminlte.amount') }}</th>
                </tr>
            </thead>
            <tbody>
            @php ($total = 0) @endphp
            @foreach($pos_sales as $pos_sale)
            <tr>
                <td>{{ date('m/d/Y H:i', $pos_sale->date) }}</td>
                <td>{{ $pos_sale->name }}</td>
                <td>{{ number_format($pos_sale->total,2) }} Euro</td>
            </tr>
            @php ($total += number_format($pos_sale->total,2)) @endphp
            @endforeach
            <tr>
                <td colspan="2" style="text-align:right"><b>TOTAL:</b></td>
                <td><b>{{ number_format($total,2) }} Euro</b></td>
            </tr>
            </tbody>
			@php $pos_total += $total; @endphp
        </table>
    </div>
</div>
@endif
