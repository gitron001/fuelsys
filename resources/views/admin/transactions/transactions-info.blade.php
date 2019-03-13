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
    <td>{{ $transaction->rfid->rfid_name }}</td>
    <td>{{ $transaction->rfid ? $transaction->rfid->user->name : ''}}</td>
    <td>{{ $transaction->money }}</td>
    <td>{{ $transaction->created_at }}</td>
  </tr>
@endforeach
</tbody>
</table>