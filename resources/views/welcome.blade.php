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
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  @endforeach
</div>


<div class="col-md-4">
  <h2 class="text-center">LIVE Feed</h2>           
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>Transaction</th>
      </tr>
    </thead>
    <tbody>
	@foreach($transactions as $transaction)
      <tr>
        <td>{{ $transaction->tr_no }}</td>
      </tr>
	@endforeach
    </tbody>
  </table>
</div>

<!-- **************** LANGUAGE **************** -->

<!--<div>
    Change Language:
    <ul class="list-group">
	  <li class="list-group-item"><a href="locale/en">English</a></li>
	  <li class="list-group-item"><a href="locale/al">Albanian</a></li>
	</ul>
</div> -->

<!-- **************** END LANGUAGE **************** -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop