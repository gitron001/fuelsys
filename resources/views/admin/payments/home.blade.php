@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Payments</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/payments/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new payment</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover table-responsive">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>User</th>
                  <th>Company</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                <tr>
                  	<td>{{ date('m/d/Y', $payment->date) }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->user ? $payment->user->name : 'Empty' }}</td>
                    <td>{{ $payment->company ? $payment->company->name : 'Empty' }}</td>
                  	<td>{{ $payment->created_at->diffForHumans() }}</td>
                  	<td>{{ $payment->updated_at->diffForHumans() }}</td>
                    <td width="12%">
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Options</button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li class="text-center"><a href="{{ url('admin/payments/'.$payment->id.'/edit') }}"><i class="fa fa-edit"></i></button>Edit</a></li>
                          <li class="text-center"><a href="{{ url('admin/payments/'.$payment->id) }}"><i class="fa fa-print"></i></button>Generate Bill</a></li>
                          <li class="divider"></li>
                          <li>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['PaymentsController@destroy',$payment->id]]) !!}
                              {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete',['class'=>'btn btn-block btn-danger delete-item']); !!}
                            {!! Form::close() !!}
                          </li>
                        </ul>
                      </div>
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $payments->links() }}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
