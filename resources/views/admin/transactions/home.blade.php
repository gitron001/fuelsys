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
                  <a href="{{ url('admin/transaction/excel_export') }}"><button type="button" class="btn btn-block btn-success">Export Excel</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
        					<th>Status</th>
                  <th>Locker</th>
        					<th>Tr_no</th>
        					<th>Sl_no</th>
        					<th>Product</th>
        					<th>Dis_status</th>
        					<th>Price</th>
                  <th>Lit</th>
                  <th>Money</th>
                  <th>Dis_tot</th>
                  <th>Pfc_tot</th>
                  <th>Tr_status</th>
                  <th>Rfid</th>
                  <th>Ctype</th>
                  <th>Method</th>
                  <th>Bill_no</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                <tr>
          					<td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->locker }}</td>
          					<td>{{ $transaction->tr_no }}</td>
          					<td>{{ $transaction->sl_no }}</td>
                    <td>{{ $transaction->product }}</td>
                    <td>{{ $transaction->dis_status }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->lit }}</td>
                    <td>{{ $transaction->money }}</td>
                    <td>{{ $transaction->dis_tot }}</td>
                    <td>{{ $transaction->pfc_tot }}</td>
                    <td>{{ $transaction->tr_status }}</td>
                    <td>{{ $transaction->rfid }}</td>
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