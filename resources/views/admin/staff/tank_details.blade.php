@if(count($tank_details) > 0)
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <h3 class="box-title">{{ trans('adminlte::adminlte.tank') }}</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
            <thead>
                <tr>
                    <th>{{ trans('adminlte::adminlte.name') }}</th>
                    <th>{{ trans('adminlte::adminlte.product') }}</th>
                    <th>{{ trans('adminlte::adminlte.capacity') }}</th>
                    <th>{{ trans('adminlte::adminlte.quantity') }}</th>
                    <th>{{ trans('adminlte::adminlte.water_level') }}</th>
                    <th>{{ trans('adminlte::adminlte.fuel_level') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tank_details as $tank)
				<tr>
					<td>{{ $tank->tank_name }}</td>
                    <td>{{ $tank->product_name }}</td>
                    <td>{{ $tank->capacity }}</td>
                    <td>{{ $tank->quantity }}</td>
                    <td>{{ $tank->water_level }}</td>
                    <td>{{ $tank->fuel_level }}</td>
				</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
