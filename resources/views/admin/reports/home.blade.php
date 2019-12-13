@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Reports</h3>
  </div>
  <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/reports') }}">

        <div class="form-group">
          <label for="Start Date:">Start Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate" value="{{ request()->get("fromDate") }}">
        </div>

        <div class="form-group">
          <label for="End Date:">End Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate" value="{{ request()->get("toDate") }}">
        </div>

        <div class="form-group">
          <label for="User:">User:</label>
          <select class="users-dropdown form-control" name="user[]" multiple="multiple" id="user">
            @foreach($users as $id => $name)
                <option value="{{ $id }}"
                @if(!empty( request()->get("user") ))
                  @foreach( request()->get("user") as $us)
                    {{ $us == $id ? 'selected' : '' }}
                  @endforeach
                @endif > {{ $name }} </option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <input type="checkbox" name="last_payment"  id="last_payment" {{ request()->get("last_payment") == 'Yes' ? 'checked' : ''}}>From last payment<br>
        </div>

        <div class="form-group">
          <input type="checkbox" name="inc_transactions"  id="inc_transactions" {{ request()->get("inc_transactions") == 'Yes' ? 'checked' : ''}}>Inc. Trans<br>
        </div>
        <div class="form-group">
          <input type="checkbox" name="exc_balance"  id="exc_balance" {{ request()->get("exc_balance") ? 'checked' : ''}}>Exc. Balance<br>
        </div>

        <div class="form-group">
          <label for="User:">Company:</label>
          <select class="selectpicker form-control" id="company" name="company" data-live-search="true" data-style="btn-dropdownSelectNew">
            <option value="">Choose a Company</option>
              @foreach($companies as $id => $name)
                <option value="{{ $id }}" {{ ( request()->get("company") == $id ? "selected":"") }}>{{ $name }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary" data-toggle="tooltip" id="search" title="Search"><i class="fa fa-search"></i></button>
          <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-warning" title="Clear All Filters"><i class="fa fa-trash"></i></a>
          <button type="button" data-toggle="tooltip" class="btn btn-success" id="exportEXCEL" title="Export Excel"><i class="fas fa-file-excel"></i></button>
          <a href="{{ route('generate_pdf/pdf', ['company' => request()->get("company"),'user' => request()->get("user"),'fromDate' => request()->get("fromDate"),'toDate' => request()->get("toDate"),'last_payment' => request()->get("last_payment"),'inc_transactions' => request()->get("inc_transactions"),'exc_balance' => request()->get("exc_balance")] ) }}" target="_blank" data-toggle="tooltip" class="btn btn-danger" title="Export PDF"><i class="fas fa-file-pdf"></i></a>
          <button type="button" data-toggle="tooltip" class="btn btn-info" id="dailyReport" title="Daily Report"><i class="far fa-envelope"></i></button>
        </div>

      </form>

      <br>

      <div class="box-body">
        <table id="example2" class="table table-hover table-bordered text-center">
          <thead>
          <tr>
            <th class="sorting" data-sorting_type="asc" data-column_name="user_id">User <span id="user_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
            <th class="sorting" data-sorting_type="asc" data-column_name="company_id">Company <span id="company_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
            <th class="sorting" data-sorting_type="asc" data-column_name="product_id">Product <span id="product_id_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
            <th class="sorting" data-sorting_type="asc" data-column_name="price">Price <span id="price_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
            <th class="sorting" data-sorting_type="asc" data-column_name="lit">Lit <span id="lit_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
            <th class="sorting" data-sorting_type="asc" data-column_name="money">Total <span id="money_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
            <th class="sorting" data-sorting_type="asc" data-column_name="created_at">Created At <span id="created_at_icon" class="removePrevIcon sortIcon"><span class="glyphicon glyphicon glyphicon glyphicon-sort"></span></span></th>
          </tr>
          </thead>
          <tbody>
            @include('admin.reports.table_data')
          </tbody>
        </table>
        @include('includes.hidden_inputs')
      </div>

    </div>
  </div>
</div>


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
