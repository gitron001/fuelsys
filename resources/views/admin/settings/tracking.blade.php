@extends('adminlte::page')

@section('content')

      <form class="form-inline text-center" method="GET" action="{{ URL::to('/tracking_command') }}">
        <div class="form-group">
          <label for="Start Date:">Start Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate" value="{{ request()->get('fromDate')}}">
        </div>

        <div class="form-group">
          <label for="End Date:">End Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate" value="{{ request()->get('toDate')}}">
        </div>

        <div class="form-group">
        <label for="Cammenls:">Channels:</label>
          <select class="users-dropdown form-control" name="channel_id" multiple="multiple" id="channel_id">
            @foreach($channels as $ch)
                <option value="{{ $ch->channel_id }}"
                @if(request()->get("channel_id") == $ch->channel_id) selected

                @endif > {{ $ch->channel_id }} </option>
              @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search"><i class="fa fa-search"></i> Search</button>
        <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-danger" title="Clear All Filters"><i class="fa fa-trash"></i></a>
      </form>

      <br>
	<div class="content">
		<div class="row">
			   <div class="box box-primary">
            <div class="box-header">
              <div class="col-md-8"><h3 class="box-title">PFC COMMANDS</h3></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-div">
                <table class="table table-bordered" style="text-align: center">
                  <thead>
                    <tr>
                      <th style="text-align: center">Type</th>
                      <th style="text-align: center">Channel</th>
                      <th style="text-align: center">Commad</th>
                      <th style="text-align: center">Created at</th>
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
