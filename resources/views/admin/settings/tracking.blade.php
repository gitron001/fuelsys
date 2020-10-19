@extends('adminlte::page')

@section('content')
    <div class="content">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Tracking Commands</h3>
                </div>
                <div class="box-body">

                    <form class="form-inline text-center" method="GET" action="{{ URL::to('/tracking_command') }}">
                        <div class="form-group">
                            <label for="Start Date:">Start Date:</label>
                            <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate" value="{{ request()->get('fromDate') }}">
                        </div>

                        <div class="form-group">
                            <label for="End Date:">End Date:</label>
                            <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate" value="{{ request()->get('toDate') }}">
                        </div>

                        <div class="form-group">
                            <label for="Cammenls:">Channels:</label>
                            <select class="channel-dropdown form-control" name="channel_id" multiple="multiple" id="channel_id" style="width: 120px;">
                                @foreach ($channels as $channel)
                                    <option value="{{ $channel->channel_id }}" @if (request()->get('channel_id') == $channel->channel_id) selected
                                @endif > {{ $channel->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search"><i
                                class="fa fa-search"></i> Search</button>
                        <a data-toggle="tooltip" class="btn btn-danger" id="delsel" title="Delete all selected items"><i class="fa fa-trash"></i> Delete</a>
                    </form>

                </div>

                <div class="box-body table-div">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th style="text-align:center;"><input type="checkbox" id="checkall" class="checkbox-select-all"></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="type">Type <span id="type_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="channel_id">Channel <span id="channel_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="command">Command <span id="command_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.settings.tracking_data')
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
