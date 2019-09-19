@extends('adminlte::page')

@section('content')


	<div class="content">
		<div class="row">
			   <div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">API Response</h3></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-div">
                <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">RFID</th>
                      <th>Emri</th>
                      <th>Mbiemri</th>
                      <th style="width: 40px">Statusi</th>
                    </tr>
                    <?php $response = json_decode($data)?>
                    @if(count($response->old) > 0)
                        @foreach($response->old as $rfid)
                            <tr>
                            <td>{{ $rfid->rfid }}</td>
                            <td>{{ $rfid->name }}</td>
                            <td>{{ $rfid->surname }}</td>
                            <td><span class="badge bg-red">Eksiston</span></td>
                            </tr>
                        @endforeach
                    @endif
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
