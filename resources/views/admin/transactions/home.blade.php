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
        					<th>Dispanser_Id</th>
        					<th>Total</th>
        					<th>Amount</th>
        					<th>User_Id</th>
        					<th>Created At</th>
        					<th>Updated At</th>
        					<th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                <tr>
                  	<td>{{ $transaction->id }}</td>
          					<td>{{ $transaction->dispanser_id }}</td>
          					<td>{{ $transaction->total }}</td>
          					<td>{{ $transaction->amount }}</td>
          					<td>{{ $transaction->user_id }}</td>
          					<td>{{ $transaction->created_at->diffForHumans() }}</td>
          					<td>{{ $transaction->updated_at->diffForHumans() }}</td>
                  	
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