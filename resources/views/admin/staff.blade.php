<?php use Illuminate\Support\Facades\Input;?>
@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Staff</h3>
  </div>
  <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/staff') }}">

        <div class="form-group">
          <label for="Start Date:">Start Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate" value="{{Input::get("fromDate")}}">
        </div>

        <div class="form-group">
          <label for="End Date:">End Date:</label>
          <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate" value="{{Input::get("toDate")}}">
        </div>

        <div class="form-group">
          <label for="User:">Staff:</label>
          <select class="users-dropdown form-control" name="user[]" multiple="multiple">
            <option value="">Select a user</option>
            @foreach($usersFilter as $id => $name)
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
          <button type="submit" class="btn btn-primary" data-toggle="tooltip" id="search" title="Search"><i class="fa fa-search"></i></button>
          <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-danger" title="Clear All Filters"><i class="fa fa-trash"></i></a>
        </div>

      </form>

      <br>
      
      <table id="example2" class="table table-bordered table-hover table-responsive">
        <thead>
        <tr>
          <th>Perdoruesi</th>
          @foreach($product_name as $value)
            <th>{{ $value }}</th>
          @endforeach
          <th>Euro</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staffData as $transaction)
        <tr>
          <td>{{ $transaction['user_name'] }}</td>
          @foreach($product_name as $key => $value)
          <td>
            {{ !empty($transaction[$key]) ? $transaction[$key][0] : '0' }} litra / 
            {{ !empty($transaction[$key][0]) ? $transaction[$key][0] *  $transaction[$key][1] : '0'}} Euro
          </td>

          @endforeach
          <td>{{  $transaction['totalMoney']  }} Euro</td>
        </tr>
        @endforeach
        </tbody>
      </table>

      <h3>Totali</h3>
      <table id="example2" class="table table-bordered table-hover table-responsive">
        <thead>
        <tr>
          <th>Produkti</th>
          <th>Cmimi</th>
          <th>Sasia</th>
          <th>Totali</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{ $product['product_name'] }}</td>
          <td>{{ $product['product_price'] }} Euro</td>
          <td>{{ $product['lit'] }} litra</td>
          <td>{{ $product['money'] }} Euro</td>
        </tr>
        @endforeach
        </tfoot>
      </table>

      <div class="text-center">
        {{ $staffData->render() }}
      </div>
    </div>
  </div>
</div>


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script>
  // Users dropdown 
  $(document).ready(function() {
    $('.users-dropdown').select2({
      placeholder: "Select a user"
    });
  });

  $(function () {
        var date = new Date();
        date.setDate(date.getDate() -1);
        $('#datetimepicker4').datetimepicker({
            defaultDate:date
        });

        var dateNow = new Date();
        $('#datetimepicker5').datetimepicker({
            defaultDate:dateNow
        });
    });
</script>
@endsection