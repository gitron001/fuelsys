<?php use Illuminate\Support\Facades\Input; ?>
@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Reports</h3>
  </div>
  <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <form class="form-inline text-center" method="GET" action="{{ URL::to('/admin/reports') }}">

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
          <input type="checkbox" name="last_payment"  id="last_payment" {{Input::get("last_payment") == 'Yes' ? 'checked' : ''}}>From last payment<br>
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
          <button type="button" data-toggle="tooltip" class="btn btn-primary" id="dailyReport" title="Daily Report"><i class="far fa-envelope"></i></button>
        </div>

      </form>

      <br>
      
      @if(Request::isMethod('get') && !Input::get('last_payment'))
        @include('admin.reports.inc.table-get')
      @elseif(Request::isMethod('get') && Input::get('last_payment') == 'da')
        @include('admin.reports.inc.last_payments')
      @else
        @include('admin.reports.inc.basic-table')
      @endif

    </div>
  </div>
</div>


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
    
    // Show checkbox value after page load
    $(document).ready(function(){
      if ($('input#last_payment').is(':checked')) {
        $('input[name="last_payment"]').val('Yes');
      } else {
        $('input[name="last_payment"]').val('No');
      }
    });
    
    // Change Checkbox value onclick
    $('#last_payment').click(function(){
      if($(this).is(':checked')){
          $('input[name="last_payment"]').val('Yes');
      } else {
          $('input[name="last_payment"]').val('No');
      }
    });

    function get(name){
     if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
    }

    // Start Date & End Date Filters
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

  // Users dropdown 
  $(document).ready(function() {
    $('.users-dropdown').select2({
      placeholder: "Select a user"
    });
  });

  $(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    var date = new Date();
    date.setDate(date.getDate() - 1);

    $('#datetimepicker4').datetimepicker('setDate', date);

  });

  // Hide alert message after few seconds
  $(".alert").delay(4000).slideUp(200, function() {
      $(this).alert('close');
  });


  /*$(document).ready(function(){
    $('#search').click(function(){
      var fromDate = $('[name=from_date]').val();
      var toDate = $('[name=to_date]').val();
      var user = $("#user").val();
      var company = $("#company").val();

      console.log(fromDate);

      $.ajax({
        type: "GET",
        data: {fromDate: fromDate, toDate: toDate, user: user,company:company},
        url: "{{ URL('/search')}}",
        dataType: 'JSON',
        success: function(data){
          $('tbody').html(data.table_data);
        }
      });

    });
  });*/

  $(document).ready(function(){
    $('#exportEXCEL').click(function(){
      var fromDate = $('#datetimepicker4').val();
      var toDate = $('#datetimepicker5').val();
      var user = $("#user").val();
      var last_payment = $("#last_payment").val();
      var company = $("#company").val();

      $.ajax({
        type: "GET",
        data: {fromDate: fromDate, toDate: toDate, user: user,company:company, last_payment:last_payment},
        url: "{{ URL('/export')}}",
        dataType: "JSON",
        success: function(response, textStatus, request){
          var a = document.createElement("a");
          a.href = response.file; 
          a.download = response.name;
          document.body.appendChild(a);
          a.click();
          a.remove();
          }
      });

    });
  });

  $(document).ready(function(){
    $('#exportPDF').click(function(){
      var fromDate = $('#datetimepicker4').val();
      var toDate = $('#datetimepicker5').val();
      var user = $("#user").val();
      var last_payment = $("#last_payment").val();
      var company = $("#company").val();

      $.ajax({
        type: "GET",
        data: {fromDate: fromDate, toDate: toDate, user: user,company:company, last_payment:last_payment},
        url: "{{ URL('/pdf')}}",
        dataType: "JSON",
        success: function(response, textStatus, request){
          var a = document.createElement("a");
          a.href = response.file; 
          a.download = response.name;
          document.body.appendChild(a);
          a.click();
          a.remove();
        }
      });

    });
  });

  $(document).ready(function(){
    $('#dailyReport').click(function(){
      var company = $("#company").val();
      var dailyReport = 1;

      $.ajax({
        type: "GET",
        data: {company:company,dailyReport:dailyReport},
        url: "{{ URL('/dailyReport')}}",
        dataType: "JSON",
        success: function(data){
          console.log(data);
        }
      });

    });
  });
</script>

@endsection