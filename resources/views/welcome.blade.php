@extends('adminlte::page')

@section('content')

<div class='row'>
  <div class="col-md-4">
      <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Dispanesers</h3>
  
          <div class="box-tools pull-right">
          <span class="label label-primary">Total: {{count($dispanesers)}}</span>
          </div>
      </div>
      
      @foreach($dispanesers as $dispaneser)
      <div class="col-md-4">
        <div class="box-body">

            <ul style="list-style:none; margin:0; padding:0">
            <li class="text-center">
                <i class="fas fa-gas-pump" style="font-size:80px;"></i>
                <p class="text-center">{{ $dispaneser->name }}</p>
            </li>
            </ul>

        </div>
      </div>
      @endforeach
  
      <div class="box-footer"></div>
  
      </div>
  </div>

<!-- Companies with low limit Area -->
<div class="col-md-3 table-wrapper-scroll-y my-custom-scrollbar scrollStyle">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Companies with low limit</h3>
    </div>

    <div class="box-body">
        <div class="table-responsive">
        <table class="table no-margin">
            <thead>
            <tr>
            <th class="text-center">Company</th>
            <th class="text-center">Limit left</th>
            </tr>
            </thead>
            <tbody>
            @foreach($company_low_limit as $comp_low_limit)
                <tr class="text-center">
                    <td>{{ $comp_low_limit->name }}</td>
                    <td>{{ $comp_low_limit->limit_left }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    
    <div class="box-footer clearfix text-center">
        <a href="/admin/companies" class="btn btn-sm btn-default btn-flat">View All Companies</a>
    </div>
  </div>
</div>
<!-- END Companies with low limit Area -->

<!-- LIVE Feed Area -->
<div class="col-md-5 table-wrapper-scroll-y my-custom-scrollbar scrollStyle" id="loadTransaction">
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
                    <td>{{ $transaction->users ? $transaction->users->name : '' }} {{ $transaction->users != NULL ? '( '.$transaction->users->company->name.' )' : '' }}</td>
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
</div>
<!-- END LIVE Feed Area -->
  
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
