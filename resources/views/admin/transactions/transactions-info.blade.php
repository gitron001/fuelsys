<h2 class="text-center">LIVE Feed</h2>
<table class="table table-bordered text-center">
<thead>
  <tr>
    <th>RFID</th>
    <th>Username</th>
    <th>Amount</th>
    <th>Date</th>
  </tr>
</thead>
<tbody>
@foreach($transactions as $transaction)
  <tr>
    <td>{{ $transaction->users->rfid }}</td>
    <td>{{ $transaction->users ? $transaction->users->name : ''}}</td>
    <td>{{ $transaction->money }}</td>
    <td>{{ $transaction->created_at }}</td>
  </tr>
@endforeach
</tbody>
</table>