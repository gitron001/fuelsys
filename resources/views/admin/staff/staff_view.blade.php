<?php use Illuminate\Support\Facades\Input;?>
@extends('adminlte::page')

@section('content')
<div class="box box-primary">
    <br>
    <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/staff') }}" role="form">
        <div class="box-body">
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
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" id="search" title="Search"><i class="fa fa-search"></i> Search</button>
                <a href="{{ request()->url() }}" data-toggle="tooltip" class="btn btn-danger" title="Clear All Filters"><i class="fa fa-trash"></i> Clear filters </a>
            </div>
        </div>
    </form>
    <br>
</div>
<!-- END box box-primary --> 

<!-- START first table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-user" aria-hidden="true"></i>
        <h3 class="box-title">STAFF</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
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
    </div>
</div>
<!-- END first table -->

<!-- START second table -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
        <h3 class="box-title">TOTAL</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-responsive text-center">
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
            </tbody>
        </table>
    </div>
</div>
@endsection
<!-- END second table -->



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .main-sidebar{
            display: none;
        }
        @media (min-width: 768px) {
  .navbar-toggle {
      display:none
  }
}
    </style>
@endsection

@section('js')
    <script>
        $( document ).ready(function() {
            $('.users-dropdown').select2({
                placeholder: "Select a user"
            });

            document.querySelector('body').classList.remove('sidebar-mini');
            document.querySelector('body').classList.add('sidebar-collapse');
            $('.navbar a').removeClass("sidebar-toggle")
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