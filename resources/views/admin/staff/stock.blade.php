@if(count($stocks) > 0)
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.incoming_stock') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.tank') }}</th>
                    <th>{{ trans('adminlte::adminlte.name') }}</th>
                    <th>{{ trans('adminlte::adminlte.total') }}</th>
                    <th>{{ trans('adminlte::adminlte.incoming_date') }}</th>
                </tr>
            </thead>
			<BR> <BR>
			<tbody>
				
                @foreach($stocks as $s)
				<tr>
					<td>{{ $s->tank->name }} ( {{ $s->tank->product->name }} ) </td>
					<td>{{ $s->reference_number }}</td>
                    <td>{{ $s->liters }} lit.</td>					
                    <td>{{ date('H:i d-M-Y',$s->date) }}  </td>
				</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
