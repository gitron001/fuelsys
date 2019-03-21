@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<h3 class="box-title">Transaction</h3>
<div class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
          <div class="col-md-2">
             <button type="button" class="btn btn-success" id="export">Export Excel</button>
          </div>
          <div class="col-md-10">
            <form class="form-inline">
                <div class="form-row">
                  <div class="form-group">
                    <label for="Start Date:">Start Date:</label>
                    <input class="form-control datepicker" autocomplete="off" id="from_date" type="text">
                  </div>

                  <div class="form-group">
                    <label for="End Date:">End Date:</label>
                    <input class="form-control datepicker" autocomplete="off" id="to_date" type="text">
                  </div>

                  <div class="form-group">
                    <label for="User:">User:</label>
                    <select class="form-control" id="user">
                      <option value="">Choose a User</option>
                        @foreach($users as $id => $name)
                          <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select> 
                  </div>

                  <div class="form-group">
                    <label for="User:">Company:</label>
                    <select class="form-control" id="company">
                      <option value="">Choose a Company</option>
                        @foreach($companies as $id => $name)
                          <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select> 
                  </div>

                  <div class="form-group">
                    <button type="button" class="btn btn-success" id="search">Search</button>
                  </div>
                </div>
              </form>
          </div>
      </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-hover table-bordered" >
                <thead>
                <tr>
                  <th>User</th>
                  <th>RFID</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Lit</th>
                  <th>Total</th>
                  <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->users ? $transaction->users->name : '' }}</td>
                    <td>{{ $transaction->users ? $transaction->users->rfid : '' }}</td>
                    <td>{{ $transaction->product ? $transaction->product->name : '' }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->lit }}</td>
                    <td>{{ $transaction->money }}</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $transactions->links() }}
              </div>
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
  $(function() {
    $(".datepicker" ).datepicker();
  });

  // Hide alert message after few seconds
  $(".alert").delay(4000).slideUp(200, function() {
      $(this).alert('close');
  });


  $(document).ready(function(){
    $('#search').click(function(){
      var fromDate = $("#from_date").val();
      var toDate = $("#to_date").val();
      var user = $("#user").val();
      var company = $("#company").val();

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
  });

  $(document).ready(function(){
    $('#export').click(function(){
      var fromDate = $("#from_date").val();
      var toDate = $("#to_date").val();
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
</script>

@endsection