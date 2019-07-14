<div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Live Feed</h3>
      <span class="pulse"></span>
  </div>
  
  <div class="box-body">
      <div class="table-responsive">
      <table class="table no-margin">
          <thead>
          <tr>
          <th class="text-center">Name</th>
          <th class="text-center">Product</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Date</th>
          </tr>
          </thead>
          <tbody>
          @foreach($transactions as $transaction)
              <tr class="text-center">
                  <td>{{ $transaction->users ? $transaction->users->name : '' }} {{ $transaction->users->company->name != '' ? '( '.$transaction->users->company->name.' )' : '' }}</td>
                  <td>{{ $transaction->product ? $transaction->product->name : '' }}</td>
                  <td>{{ $transaction->money }}</td>
                  <td>{{ $transaction->created_at->format('m-d H:i:s') }}</td>
              </tr>
          @endforeach
          </tbody>
      </table>
      </div>
  </div>
  
  <div class="box-footer clearfix text-center">
      <a href="/admin/transactions" class="btn btn-sm btn-default btn-flat">View All Transactions</a>
  </div>
</div>