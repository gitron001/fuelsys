<?php use Illuminate\Support\Facades\Input; ?>
@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Payments</h3>
  </div>
  <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/payments') }}">
        <div class="form-group">
          <label for="Start Date:">Start Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate" value="{{Input::get("fromDate")}}">
        </div>

        <div class="form-group">
          <label for="End Date:">End Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate" value="{{Input::get("toDate")}}">
        </div>

        <div class="form-group">
          <label for="User:">User:</label>
          <select class="users-dropdown form-control" name="user[]" multiple="multiple" id="user">
            @foreach($users as $id => $name)
                <option value="{{ $id }}" 
                @if(!empty(Input::get("user")))
                  @foreach(Input::get("user") as $us) 
                    {{ $us == $id ? 'selected' : '' }} 
                  @endforeach
                @endif > {{ $name }} </option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="User:">Company:</label>
          <select class="form-control" id="company" name="company">
            <option value="">Choose a Company</option>
              @foreach($companies as $id => $name)
                <option value="{{ $id }}" {{ (Input::get("company") == $id ? "selected":"") }}>{{ $name }}</option>
              @endforeach
          </select> 
        </div>

        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Search"><i class="fa fa-search"></i> Search</button>
        <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-danger" title="Clear All Filters"><i class="fa fa-trash"></i> Clear filters</a>
      </form>

      <br>

      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover text-center">
            <thead>
              <th class="sorting" data-sorting_type="asc" data-column_name="date">Date <span id="date_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
              <th class="sorting" data-sorting_type="asc" data-column_name="amount">Amount <span id="amount_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
              <th class="sorting" data-sorting_type="asc" data-column_name="user_id">User <span id="user_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
              <th class="sorting" data-sorting_type="asc" data-column_name="company_id">Company <span id="company_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
              <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
              <th class="sorting" data-sorting_type="asc" data-column_name="updated_at">Updated At <span id="updated_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
              <th class="text-center">Options</th>
            </thead>
            <tbody>
              @include('admin.payments.table_data')
            </tbody>
          </table>
          @include('includes.hidden_inputs')
        </div>
      </div>
    </div>
  </div>
</div>                
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
