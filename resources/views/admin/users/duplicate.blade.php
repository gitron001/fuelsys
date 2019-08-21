@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">Duplicates</h3></div>
				<div class="col-md-12">
			
                <form class="form-inline text-center pull-right" method="GET" action="{{ URL::to('/admin/users') }}">
                  @include('includes.search_filter')
                  <a href="{{ url('admin/uploadExcel') }}" data-toggle="tooltip" class="btn btn-success pull-right" style="margin-left: 0.5em;" title="Upload Excel"><i class="fa fa-upload"></i> Upload Excel</a>
				  <a href="{{ url('admin/users/create') }}" data-toggle="tooltip" class="btn btn-success pull-right" style="margin-left: 0.5em;" title="Create new user"><i class="fa fa-plus"></i> New User</a>
                </form>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="sorting" data-sorting_type="asc" data-column_name="name">Name <span id="name_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                  <th class="sorting" data-sorting_type="asc" data-column_name="rfid">RFID <span id="rfid_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                </tr>
                </thead>
                <tbody>
				@foreach($duplicate as $d)
                  <tr>
					<td>{{ trim($d['emri']). ' ' .trim($d['mbiemri']) }}</td>
					<td>{{ $d['nr.karteles'] }}</td>
				  </tr>
				@endforeach
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
