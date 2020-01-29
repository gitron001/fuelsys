@if(!empty($running_process))
<div class="box running_process">
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered" style="text-align:center">
        <tr>
          <th style="text-align:center">PFC ID</th>
          <th style="text-align:center">START TIME</th>
          <th style="text-align:center">REFRESH TIME</th>
          <th style="text-align:center">CREATED AT</th>
          <th style="text-align:center">UPDATED AT</th>
          <th style="text-align:center">DELETE</th>
        </tr>
        <tbody id="table_data">
        <tr>
            <td>{{ $running_process->pfc_id }}</td>
            <td>{{ date('m/d/Y H:i:s', $running_process->start_time) }}</td>
            <td>{{ date('m/d/Y H:i:s', $running_process->refresh_time) }}</td>
            <td>{{ $running_process->created_at->format('m/d/Y H:i:s') }}</td>
            <td>{{ $running_process->updated_at->format('m/d/Y H:i:s') }}</td>
            <td>
                <a href="#" data-toggle="tooltip" id="delete_process" data-id="{{ $running_process->id }}" title="Delete"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
    </div>
    <!-- /.box-body -->
</div>
@else
    <p>Asnjë proces nuk është gjetur.</p>
@endif
