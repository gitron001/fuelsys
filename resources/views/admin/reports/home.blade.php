<?php use Illuminate\Support\Facades\Input; ?>
@extends('adminlte::page')

@section('content')

<style>
  button.multiselect {
  background-color: initial;
  border: 1px solid #ced4da;
}
</style>

@include('includes/alert_info')

<h3 class="box-title">Reports</h3>
<div class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
          <div class="col-md-12">
            <form class="form-inline" method="GET" action="{{ URL::to('/admin/reports') }}">

                <div class="form-row">
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
                    <select id="user" name="user[]" multiple="multiple" style="">
                        @foreach($users as $id => $name)
                          <option value="{{ $id }}" {{ (Input::get("user") == $id ? "selected":"") }}>{{ $name }}</option>
                        @endforeach
                    </select> 
                  </div>

                  <div class="form-group">
                    <input type="checkbox" name="last_payment" value="Yes">From last payment<br>
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
                    <button type="submit" class="btn btn-success" id="search" style="margin-right: 2.5em">Search</button>
                    <button type="button" class="btn btn-success" id="exportEXCEL">Export Excel</button>
                    <button type="button" class="btn btn-primary" id="exportPDF">Export PDF</button>
                  </div>
                </div>
              </form>
          </div>
      </div>
      
      @if(Request::isMethod('get') && !(Input::get('last_payment') == 'Yes'))
        @include('admin.reports.inc.table-get')
      @elseif(Input::get('last_payment') == 'Yes')
        @include('admin.reports.inc.last_payments')
      @else
       @include('admin.reports.inc.basic-table')
      @endif
    
  </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>

    function get(name){
     if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
    }

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

  $(document).ready(function() {

    $('#user').multiselect({
        includeSelectAllOption: true,
    });

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
      var company = $("#company").val();

      $.ajax({
        type: "GET",
        data: {fromDate: fromDate, toDate: toDate, user: user,company:company},
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
      var company = $("#company").val();

      $.ajax({
        type: "GET",
        data: {fromDate: fromDate, toDate: toDate, user: user,company:company},
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
</script>

@endsection