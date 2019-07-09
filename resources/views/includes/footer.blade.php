@section('js')

<script>

  // Sweet Alert confirmation before delete
  $(document).on('click', '.delete-item', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
     swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Success!", "Record deleted successfully!", "success");
          window.location.href = link;
        } else {
          swal("The current change request has been cancelled.");
        }
      });

      return false;
  });

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
  });


  // Hide alert message after few seconds
  $(".alert").delay(2000).slideUp(200, function() {
      $(this).alert('close');
  });




  // Sorting with pagination in tables
  $(document).ready(function(){
    var url_name = window.location.pathname;
  
    function fetch_data(page,sort_type,sort_by){
      $.ajax({
        url: url_name+"?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type,
        success: function(data){
          $('tbody').html('');
          $('tbody').html(data);
        }
      })
    }
  
    $(document).on('click', '.sorting', function() {
      var column_name = $(this).data('column_name');
      var order_type = $(this).data('sorting_type');
      var reverse_order = '';
      if(order_type == 'asc'){
        $(this).data('sorting_type','desc');
        reverse_order = 'desc';
        $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon glyphicon-sort-by-attributes-alt"></span>');
      }
      if(order_type == 'desc'){
        $(this).data('sorting_type','asc');
        reverse_order = 'asc';
        $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon glyphicon-sort-by-attributes"></span>');
      }
      $('#hidden_column_name').val(column_name);
      $('#hidden_sort_type').val(reverse_order);
      var page = $('#hidden_page').val();
      fetch_data(page,reverse_order,column_name);
    });
  
    $(document).on('click','.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      $('#hidden_page').val(page);
      var column_name = $('#hidden_column_name').val();
      var sort_type = $('#hidden_sort_type').val();
      fetch_data(page, sort_type, column_name);
    });
  
  })



  // TRANSACTIONS SCRIPT
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