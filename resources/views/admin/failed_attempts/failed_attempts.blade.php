@extends('adminlte::page')

@section('content')


	<div class="content">
		<div class="row">
			   <div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">Failed Attempts</h3></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-div">
                <table class="table table-bordered" style="text-align: center">
                  <thead>
                    <tr>
                      <th style="text-align: center">PFC</th>
                      <th style="text-align: center">RFID</th>
                      <th style="text-align: center">Channel</th>
                      <th style="text-align: center">Type</th>
                      <th style="text-align: center">Created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @include('admin.failed_attempts.table_data')
                  </tbody>
                </table>
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
