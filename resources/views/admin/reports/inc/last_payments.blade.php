<!-- /.box-header -->
<div class="box-body">
  <table id="example2" class="table table-bordered table-hover table-responsive">
    <thead>
    <tr>
      <th>Date</th>
      <th>Amount</th>
      <th>User</th>
      <th>Company</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
    <tr>
        <td>{{ date('m/d/Y', $payment->date) }}</td>
        <td>{{ $payment->amount }}</td>
        <td>{{ $payment->user ? $payment->user->name : 'Empty' }}</td>
        <td>{{ $payment->company ? $payment->company->name : 'Empty' }}</td>
        <td>{{ $payment->created_at->diffForHumans() }}</td>
        <td>{{ $payment->updated_at->diffForHumans() }}</td>
    </tr>
    @endforeach
    </tfoot>
  </table>
  <div class="text-center">
    {{ $payments->links() }}
  </div>
</div>
<!-- /.box-body -->