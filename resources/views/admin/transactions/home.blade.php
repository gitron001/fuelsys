<?php use Illuminate\Support\Facades\Input; ?>
@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Transactions</h3>
  </div>
  <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/transactions') }}">

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

        <div class="form-group">
          <button type="submit" class="btn btn-primary" data-toggle="tooltip" id="search" title="Search"><i class="fa fa-search"></i></button>
          <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-danger" title="Clear All Filters"><i class="fa fa-trash"></i></a>
          <button type="button" data-toggle="tooltip" class="btn btn-primary" id="exportEXCEL" title="Export Excel"><i class="fas fa-file-excel"></i></button>
          <button type="button" data-toggle="tooltip" class="btn btn-primary" id="exportPDF" title="Export PDF"><i class="fas fa-file-pdf"></i></button>
        </div>

      </form>

      <br>


      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover text-center">
            <thead>
              <tr>
                <th class="sorting" data-sorting_type="asc" data-column_name="user_id">User <span id="user_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                <th class="sorting" data-sorting_type="asc" data-column_name="company_id">Company <span id="company_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                <th class="sorting" data-sorting_type="asc" data-column_name="product_id">Product <span id="product_id_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                <th class="sorting" data-sorting_type="asc" data-column_name="price">Price <span id="price_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                <th class="sorting" data-sorting_type="asc" data-column_name="lit">Lit <span id="lit_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                <th class="sorting" data-sorting_type="asc" data-column_name="total">Total <span id="total_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
                <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
              </tr>
            </thead>
            <tbody>
              @include('admin.transactions.table_data')
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