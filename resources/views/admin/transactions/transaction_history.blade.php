@if(count($history) > 0)
<table id="example2" class="table table-bordered table-hover text-center">
    <thead>
        <tr>
            <th>{{ trans('adminlte::adminlte.transactions_details.prev_user') }}</th>
            <th>{{ trans('adminlte::adminlte.transactions_details.current_user') }}</th>
            <th>{{ trans('adminlte::adminlte.transactions_details.updated_by') }}</th>
            <th>{{ trans('adminlte::adminlte.created_at') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($history as $data)
        <tr>
            <td>{{ $data->previous_user->name }}</td>
            <td>{{ $data->current_user->name }}</td>
            <td>{{ $data->updated_by_user->name }}</td>
            <td>{{ $data->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>{{ trans('adminlte::adminlte.transactions_details.nothing_to_show') }}</p>
@endif
