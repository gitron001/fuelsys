@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="content">
	<div class="row">
		<div class="box box-primary">
            <div class="box-header">
                <div class="col-md-6"><h3 class="box-title">{{ trans('adminlte::adminlte.staff_details.totalizers') }}</h3></div>
                <div class="col-md-6" style="text-align: right">
                    <a href="{{ url('/totalizers-export-pdf') }}" target="_blank" data-toggle="tooltip" class="btn btn-danger" title="Export PDF"><i class="fas fa-file-pdf"></i> PDF</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th>Channel Id</th>
                    <th>Sl No</th>
                    <th>Dis totalizer last</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($totalizers as $totalizer)
                    <tr>
                        <td>{{ $totalizer->channel_id }}</td>
                        <td>{{ $totalizer->sl_no }}</td>
                        <td>{{ $totalizer->dis_tot_last }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
	</div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
