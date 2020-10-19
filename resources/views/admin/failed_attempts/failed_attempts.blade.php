@extends('adminlte::page')

@section('content')
    <div class="content">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Failed Attempts</h3>
                </div>

                <div class="box-body table-div">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="sorting" data-sorting_type="asc" data-column_name="pfc_id">PFC <span id="pfc_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="rfid">RFID <span id="rfid_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="channel_id">Channel <span id="channel_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="type">Type <span id="type_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.failed_attempts.table_data')
                        </tbody>
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
