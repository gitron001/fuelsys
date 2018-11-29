@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Transaction</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/transactions/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new transaction</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
        					<th>Id</th>
        					<th>Status</th>
                  <th>Locker</th>
        					<th>Sl_No</th>
        					<th>Tn_No</th>
        					<th>Sts</th>
        					<th>Price</th>
        					<th>Lit</th>
                  <th>Money</th>
                  <th>Ctot</th>
                  <th>Mtot</th>
                  <th>~Status</th>
                  <th>Card</th>
                  <th>CType</th>
                  <th>Method</th>
                  <th>Bill_No</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                <tr>
                  	<td>{{ $transaction->id }}</td>
          					<td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->locker }}</td>
          					<td>{{ $transaction->sl_no }}</td>
          					<td>{{ $transaction->tn_no }}</td>
                    <td>{{ $transaction->sts }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->lit }}</td>
                    <td>{{ $transaction->money }}</td>
                    <td>{{ $transaction->ctot }}</td>
                    <td>{{ $transaction->mtot }}</td>
                    <td>{{ 'Null' }}</td>
                    <td>{{ $transaction->card }}</td>
                    <td>{{ $transaction->ctype }}</td>
                    <td>{{ $transaction->method }}</td>
                    <td>{{ $transaction->bill_no }}</td>
          					
                  	
                  	<td><a href="{{ url('admin/transactions/'.$transaction->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['TransactionController@destroy',$transaction->id]]) !!}
                        <div class="form-group">
                          {!! Form::submit('Delete', ['class'=>'btn btn-block btn-danger']); !!}
                        </div>
                     {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
        </div>
	</div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection