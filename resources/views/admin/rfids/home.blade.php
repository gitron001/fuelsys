@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">RFIDS</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/rfids/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new RFID</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>RFID</th>
                  <th>RFID Name</th>
                  <th>User</th>
                  <th>Company</th>
                  <th>One time limit</th>
                  <th>Plates</th>
                  <th>Vehicle</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Price</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rfids as $rfid)
                <tr>
                  	<td>{{ $rfid->rfid }}</td>
                    <td>{{ $rfid->rfid_name }}</td>
                  	<td>{{ $rfid->user->name }}</td>
                    <td>{{ $rfid->company->name ? $rfid->company->name : 'No Company' }}</td>
                    <td>{{ $rfid->one_time_limit }}</td>
                    <td>{{ $rfid->plates }}</td>
                    <td>{{ $rfid->vehicle }}</td>
                    <td>{{ $rfid->created_at->diffForHumans() }}</td>
                  	<td>{{ $rfid->updated_at->diffForHumans() }}</td>
                    <td>
                    <!-- $rfid->discounts->product_details->price -->
                    @if(count($rfid->discounts) > 0)
                      @foreach($rfid->discounts as $pr)
                      Price: {{ $pr->product_details->price}}
                      @endforeach
                    @endif

                    </td>
                  	<td><a href="{{ url('admin/rfids/'.$rfid->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['RfidController@destroy',$rfid->id]]) !!}
                        <div class="form-group">
                          {!! Form::submit('Delete', ['class'=>'btn btn-block btn-danger']); !!}
                        </div>
                     {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $rfids->links() }}
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
