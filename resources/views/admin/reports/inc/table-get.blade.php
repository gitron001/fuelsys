<div class="box-body">
  <table id="example2" class="table table-hover table-bordered text-center">
    <thead>
    <tr>
      <th>User</th>
      <th>Company</th>
      <th>Product</th>
      <th>Price</th>
      <th>Lit</th>
      <th>Total</th>
      <th>Created At</th>
    </tr>
    </thead>
    <tbody>
      @foreach($transactions as $transaction)
        <tr>
          <td>{{ $transaction->user_name ? $transaction->user_name : '' }}</td>
          <td>{{ $transaction->comp_name ? $transaction->comp_name : '' }}</td>
          <td>{{ $transaction->product ? $transaction->product : '' }}</td>
          <td>{{ $transaction->price }}</td>
          <td>{{ $transaction->lit }}</td>
          <td>{{ $transaction->money }}</td>
          <td>{{ $transaction->created_at }}</td>
        </tr>
      @endforeach
    </tfoot>
  </table>
  <div class="text-center">
    {{ $transactions->appends(Request::input())->links() }}
  </div>
</div>