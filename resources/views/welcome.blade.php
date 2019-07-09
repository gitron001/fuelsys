@extends('adminlte::page')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')

<div class='row'>
<!-- Dispanesers Area -->
<div class="col-md-4 text-center">
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
<!-- END Dispanesers Area -->

<!-- Companies with low limit Area -->
<div class="col-md-3 table-wrapper-scroll-y my-custom-scrollbar">
    <h2 class="text-center">Companies with low limit</h2>          
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>Company</th>
        <th>Limit left</th>
      </tr>
    </thead>
    <tbody>
  @foreach($company_low_limit as $comp_low_limit)
      <tr>
        <td>{{ $comp_low_limit->name }}</td>
        <td>{{ $comp_low_limit->limit_left }}</td>
      </tr>
  @endforeach
    </tbody>
  </table>
</div>
<!-- END Companies with low limit Area -->

<!-- LIVE Feed Area -->
<div class="col-md-5 table-wrapper-scroll-y my-custom-scrollbar" id="loadTransaction">
    <h2 class="text-center">LIVE Feed</h2>           
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>Name</th>
          <th>Product</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
    @foreach($transactions as $transaction)
        <tr>
          <td>{{ $transaction->users ? $transaction->users->name : '' }} {{ $transaction->users->company->name != '' ? '( '.$transaction->users->company->name.' )' : '' }}</td>
          <td>{{ $transaction->product ? $transaction->product->name : '' }}</td>
          <td>{{ $transaction->money }}</td>
          <td>{{ $transaction->created_at->format('m-d H:i:s') }}</td>
        </tr>
    @endforeach
      </tbody>
    </table>
  </div>
  <!-- END LIVE Feed Area -->
  
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
    <style>
      .my-custom-scrollbar {
        position: relative;
        height: 480px;
        overflow: auto;
      }
      .table-wrapper-scroll-y {
        display: block;
      }
    </style>

@endsection

@section('js')

<script>

  $(document).ready(function(){
    setInterval(function(){
      $('#loadTransaction').load('{{ url('/transactions-info')}}').fadeIn('slow');
    },60000)
  });
  

</script>

@endsection
