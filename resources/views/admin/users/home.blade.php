@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <div class="box-body">

                <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/users') }}">
                  <div class="form-group">
                    <label for="User:">Name:</label>
                    <input type="text" class="form-control" name="search" placeholder="Search"
                        value="{{ !empty(request()->get('search')) ? request()->get('search') : '' }}"/>
                  </div>
                  <div class="form-group">
                    <label for="User:">Company:</label>
                    <select class="users-dropdown form-control" name="company[]" multiple="multiple" id="company">
                      @foreach($companies as $id => $name)
                          <option value="{{ $id }}"
                          @if(!empty( request()->get("company") ))
                            @foreach( request()->get("company") as $us)
                              {{ $us == $id ? 'selected' : '' }}
                            @endforeach
                          @endif > {{ $name }} </option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="User:">Type:</label>
                    <select class="form-control" id="type" name="type">
                      <option value="">Select type</option>
                      <option value="1" @if(request()->get("type") == 1) selected @endif>Staff</option>
                      <option value="2" @if(request()->get("type") == 2) selected @endif>Company</option>
                      <option value="3" @if(request()->get("type") == 3) selected @endif>Administrator</option>
                      <option value="4" @if(request()->get("type") == 4) selected @endif>Client</option>
                      <option value="5" @if(request()->get("type") == 5) selected @endif>Manager</option>
                      <option value="6" @if(request()->get("type") == 6) selected @endif>Bonus Member</option>
                      <option value="7" @if(request()->get("type") == 7) selected @endif>Bonus Klient</option>
                      <option value="8" @if(request()->get("type") == 8) selected @endif>Bonus Korporate</option>
                    </select>
                  </div>
                  @if(count($branches) > 0)
                  <div class="form-group">
                    <label for="User:">Branch:</label>
                    <select class="form-control" id="branch" name="branch">
                      <option value="">Select branch</option>
                      @foreach($branches as $id => $name)
                        <option value="{{ $id }}" @if(request()->get("branch") == $id) selected @endif>{{ $name }}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit" data-toggle="tooltip" title="Search">
                      <i class="fa fa-search"></i>
                    </button>
                    <a data-toggle="tooltip" class="btn btn-danger" id="delsel" title="Delete all selected users"><i class="fa fa-trash"></i> Delete</a>
                    <a href="{{ url('admin/bonus_members') }}" data-toggle="tooltip" class="btn btn-info" style="margin-left: 1em;" title="Bonus Card"><i class="fa fa-credit-card"></i></a>
                    <a href="{{ url('admin/uploadExcel') }}" data-toggle="tooltip" class="btn btn-warning" title="Upload Excel"><i class="fa fa-upload"></i></a>
                    <a href="{{ url('admin/users/create') }}" data-toggle="tooltip" class="btn btn-success" style="margin-left: 0.5em;" title="Create new user"><i class="fa fa-plus"></i> New</a>
                  </div>
                </form>

              </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="checkall" class="checkbox-select-all"></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="name">Name <span id="name_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="email">Email <span id="email_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="rfid">RFID <span id="rfid_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="company_id">Company <span id="company_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="one_time_plate">One time limit <span id="one_time_limit_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="plates">Plates <span id="plates_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="vehicle">Vehicle <span id="vehicle_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                    <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @include('admin.users.table_data')
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
