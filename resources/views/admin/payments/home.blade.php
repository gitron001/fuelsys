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
                  <th class="sorting" data-sorting_type="asc" data-column_name="date">Date <span id="date_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="amount">Amount <span id="amount_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="user_id">User <span id="user_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="company_id">Company <span id="company_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
<<<<<<< HEAD
                @foreach($payments as $payment)
                <tr>
                  	<td>{{ date('m/d/Y', $payment->date) }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->user ? $payment->user->name : 'Empty' }}</td>
                    <td>{{ $payment->company ? $payment->company->name : 'Empty' }}</td>
                  	<td>{{ $payment->created_at->diffForHumans() }}</td>
                  	<td>{{ $payment->updated_at->diffForHumans() }}</td>
                    <td class="text-center" width="8%">
                      <a href="{{ url('admin/payments/'.$payment->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                      <a href="{{ url('payment/generate/'.$payment->id) }}" data-toggle="tooltip" title="Generate bill"><i class="fa fa-print"></i></a>&nbsp;
                      <a href="{{ route('payment.delete', $payment->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
=======
                  @include('admin.payments.table_data')
>>>>>>> 44f9ebd793e5c37658d60b5971668b05030172d5
                </tfoot>
              </table>
              @include('includes.hidden_inputs')
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
