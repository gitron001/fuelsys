@extends('adminlte::page')

@section('title', 'Fuel System')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<br>

<div class="col-md-8 text-center">
  @foreach($dispanesers as $dispaneser)
  <div class="col-md-4 text-center">
    <div class="card" >
      <i class="fas fa-gas-pump" style="font-size:80px;"></i>
      <div class="card-body">
        <h2 class="card-title">{{ $dispaneser->name }}</h2>
      </div>
    </div>
  </div>
  @endforeach
</div>



<div class="col-md-4" id="loadTransaction">
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
        <td>{{ $transaction->rfid->rfid_name }}</td>
        <td>{{ $transaction->rfid ? $transaction->rfid->user->name : ''}}</td>
        <td>{{ $transaction->money }}</td>
        <td>{{ $transaction->created_at }}</td>
      </tr>
	@endforeach
    </tbody>
  </table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>

  $(document).ready(function(){
    setInterval(function(){
      $('#loadTransaction').load('{{ url('/transactions-info')}}').fadeIn('slow');
    },60000)
  });

</script>

@endsection
