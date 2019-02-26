@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box">
            <div class="box-header">
              <div class="col-md-4 float-left"><h3 class="box-title">Transaction</h3></div>
              <div class="col-md-8 float-right">

              <div class="col-md-12">
              {!! Form::open(['method'=>'POST','class'=>'form-inline text-right','action'=>['TransactionController@excel_export']]) !!}
              
              <div class="form-group">
                {!! Form::label('Start Date:'); !!}
                {!! Form::text('from_date','',['class'=>'form-control datepicker','autocomplete'=>'off']); !!}
              </div>
              
              <div class="form-group">
                {!! Form::label('End Date:'); !!}
                {!! Form::text('to_date','',['class'=>'form-control datepicker','autocomplete'=>'off']); !!}
              </div>

              <div class="form-group">
                {!! Form::label('User:'); !!}
                {!! Form::select('user',['Choose a User'] + $users,null,['class'=>'form-control']); !!} 
              </div>

              <div class="form-group">
                {!! Form::submit('Export Excel', ['class'=>'btn btn-block btn-success','']); !!}
              </div>

              {!! Form::close() !!}

              </div>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-hover table-bordered" >
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
                    <td>{{ $transaction->rfid_id }}</td>
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

@section('js')

<script>
  $(function() {
    $(".datepicker" ).datepicker();
  });
</script>

@endsection