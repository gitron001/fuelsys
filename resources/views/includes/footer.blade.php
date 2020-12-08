@section('js')

<script>

    $('.bonus_user_select').select2({
        placeholder: 'Bonus user',
        ajax: {
          url: '/get_bonus_user',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
    });

  // Print transaction or Payment receipt with AJAX
  $(document).on('click', '#print_receipt', function(e) {
      e.preventDefault();
      if($(this).attr("data-transaction")){
        var id = $(this).attr("data-transaction");
      }else{
        var id = $(this).attr("data-payment");
      }

      $.ajax({
        type: "GET",
        data: {id: id},
        url: ($(this).attr("data-transaction")) ? "{{ URL('/transaction-receipt')}}" : "{{ URL('/payment-receipt')}}",
        dataType: 'JSON',
        beforeSend:function(){
          window.swal({
          title: "Ju lutem prisni!",
          icon: "info",
          text: "Fatura është duke u gjeneruar",
          buttons:false,
          });
        },
        success: function(data){
          swal("Sukses", "Fatura u gjenerua me sukses!", "success")
        },
        error: function () {
          swal("Gabim", "Ndodhi një gabim gjatë gjenerimit të faturës!", "error")
        }
      });
    });

  // Sweet Alert confirmation before delete
  $(document).on('click', '.delete-item', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
     swal({
        title: "A jeni të sigurt?",
        text: "Nëse të dhënat fshihen nuk do të mund te kthehen prap!",
        icon: "warning",
        buttons: ["Anulo","Vazhdo"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Sukses!", "Te dhënat u fshin me sukses!", "success");
          window.location.href = link;
        } else {
          swal("Kërkesa për fshirjen e të dhënave është anuluar.");
        }
      });

      return false;
  });

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

  // Sorting with pagination in tables
  $(document).ready(function(){
    var url_name = window.location.pathname;
    var user = $("#user").val();
    var company = $("#company").val();
    var type = $("#type").val();
    var branch = $("#branch").val() ? $("#branch").val() : '';
    var fromDate = $('#datetimepicker4').val();
    var toDate = $('#datetimepicker5').val();
    var last_payment = $("#last_payment").attr("checked") ? 'Yes' : 'No';
    var channel_id = $("#channel_id").val() ? $("#channel_id").val() : '';

    function fetch_data(page,sort_type,sort_by,query){
      $('#hidePagination').hide();
      $('#spinner').show();
      $.ajax({
        data: {user: user,company:company},
        url: url_name+"?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&search="+query+"&fromDate="+fromDate+"&toDate="+toDate+"&last_payment="+last_payment+"&type="+type+"&branch="+branch+"&channel_id="+channel_id,
        success: function(data){
          $('#spinner').hide();
          $('tbody').html('');
          $('tbody').html(data);
        }
      })
    }

    $(document).on('keyup', '#search', function(){
      var query = '<?php echo (isset($_GET['search']) ? $_GET['search'] : '') ?>';
      var column_name = $('#hidden_column_name').val();
      var sort_type = $('#hidden_sort_type').val();
      var page = $('#hidden_page').val();

      query == '' ? page = page : page = 1;

      fetch_data(page,sort_type,column_name,query);
    });

    $(document).on('click', '.sorting', function() {

      // Set this icon as default for all other items that aren't selected
      $('.removePrevIcon').html('<span class="glyphicon glyphicon glyphicon glyphicon-sort"></span>');

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
      var query = '<?php echo (isset($_GET['search']) ? $_GET['search'] : '') ?>';
      fetch_data(page,reverse_order,column_name,query);
    });

    $(document).on('click','.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      $('#hidden_page').val(page);
      var column_name = $('#hidden_column_name').val();
      var sort_type = $('#hidden_sort_type').val();
      var query = '<?php echo (isset($_GET['search']) ? $_GET['search'] : '') ?>';
      fetch_data(page, sort_type, column_name,query);
    });

  })



  // *** TRANSACTIONS SCRIPT *** //
  function get(name){
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
  }
    $(function () {
        var date = new Date();
        date.setDate(date.getDate() -1);
        $('#datetimepicker4').datetimepicker({
            defaultDate:date,
        });

        var dateNow = new Date();
        $('#datetimepicker5').datetimepicker({
            defaultDate:dateNow
        });
    });

    var checkbox = document.getElementById('all_day');
    if(checkbox){
        checkbox.addEventListener('change', (event) => {
            if (event.target.checked) {
                var dateWithoutTimeStart = new Date(document.getElementById("datetimepicker4").value);
                dateWithoutTimeStart.setHours(0,0,0,0);
                $('#datetimepicker4').data("DateTimePicker").date(dateWithoutTimeStart);

                var dateWithoutTimeEnd = new Date(document.getElementById("datetimepicker5").value);
                dateWithoutTimeEnd.setHours(23,59,59,999);
                $('#datetimepicker5').data("DateTimePicker").date(dateWithoutTimeEnd);
            }
        })
    }

    // Users dropdown
    $(document).ready(function() {
        $('.users-dropdown').select2({
            placeholder: "  Select a user  "
        });

        $('.company-dropdown').select2({
            placeholder: "  Select a company "
        });

        $('.channel-dropdown').select2({
            placeholder: "  Select a channel  "
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
      var bonus_user = $("#bonus_user").val();
      var last_payment = $("#last_payment").val();
      var inc_transactions = $("#inc_transactions").val();
      var company = $("#company").val();

      $.ajax({
        type: "GET",
        data: {fromDate: fromDate, toDate: toDate, user: user,company:company, last_payment:last_payment,inc_transactions:inc_transactions,bonus_user:bonus_user},
        url: "{{ URL('/export')}}",
        dataType: "JSON",
        beforeSend:function(){
            document.getElementById("exportEXCEL").disabled = true;
            showHideSpinner('show');
        },
        success: function(response, textStatus, request){
            document.getElementById("exportEXCEL").disabled = false;
            showHideSpinner('hide');
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

    function showHideSpinner(x){
        if(x == 'show'){
            document.getElementById("btn-logo").style.display = "none";
            document.getElementById("spiner").style.display = "inline-block";
        }else{
            document.getElementById("spiner").style.display = "none";
            document.getElementById("btn-logo").style.display = "inline-block";
        }
    }

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
  // *** END TRANSACTIONS SCRIPT *** //


  //  *** REPORTS SCRIPT *** //

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

  // Show checkbox value after page load
  $(document).ready(function(){
    if ($('input#inc_transactions').is(':checked')) {
      $('input[name="inc_transactions"]').val('Yes');
    } else {
      $('input[name="inc_transactions"]').val('No');
    }
  });

  // Change Checkbox value onclick
  $('#inc_transactions').click(function(){
    if($(this).is(':checked')){
        $('input[name="inc_transactions"]').val('Yes');
    } else {
        $('input[name="inc_transactions"]').val('No');
    }
  });

  // Show checkbox value after page load
  $(document).ready(function(){
    if ($('input#exc_balance').is(':checked')) {
      $('input[name="exc_balance"]').val('Yes');
    } else {
      $('input[name="exc_balance"]').val('No');
    }
  });

  // Change Checkbox value onclick
  $('#exc_balance').click(function(){
    if($(this).is(':checked')){
        $('input[name="exc_balance"]').val('Yes');
    } else {
        $('input[name="exc_balance"]').val('No');
    }
  });


  $(document).ready(function(){
    $('#dailyReport').click(function(){
      var inc_transactions = $("#inc_transactions").val();
      var company = $("#company").val();
      var dailyReport = 1;

      $.ajax({
        type: "GET",
        data: {company:company,dailyReport:dailyReport,inc_transactions:inc_transactions},
        url: "{{ URL('/dailyReport')}}",
        dataType: "JSON",
        success: function(data){
          console.log(data);
        }
      });

    });
  });

    $(document).ready(function(){
        $('#sendReportToEmail').click(function(){
        var fromDate = $('#datetimepicker4').val();
        var toDate = $('#datetimepicker5').val();
        var user = $("#user").val();
        var bonus_user = $("#bonus_user").val();
        var last_payment = $("#last_payment").val();
        var inc_transactions = $("#inc_transactions").val();
        var exc_balance = $("#exc_balance").val();
        var company = $("#company").val();
        var sendReportToEmail = "yes";

        swal({
            title: "A jeni të sigurt?",
            text: "A dëshironi që të dhënat e zgjedhura të dërgohen në emailin tuaj?",
            icon: "warning",
            buttons: ["Jo","Po"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            $.ajax({
                type: "GET",
                data: {fromDate:fromDate,toDate:toDate,user:user,bonus_user:bonus_user,last_payment:last_payment,inc_transactions:inc_transactions,exc_balance:exc_balance,company:company,sendReportToEmail:sendReportToEmail},
                url: "/pdf",
                dataType: "JSON",
            beforeSend:function(){
                window.swal({
                title: "Ju lutem prisni!",
                icon: "info",
                text: "Email është duke u dërguar",
                buttons:false,
                });
            },
            success: function(data){
                window.swal({
                title: "Sukses",
                icon: "success",
                text: "Email u dërgua me sukses!",
                buttons:false,
                });
            },
            error: function () {
                swal("Gabim", "Sigurohuni që të gjitha fushat të jenë të zgjedhura", "error")
            }
        });
        } else {
            swal("Kërkesa juaj është anuluar.");
        }
        });

        });
    });

  //  *** END REPORTS SCRIPT *** //

  // ***  SELECT ALL CHECKBOX *** //

    $('#checkall').change(function(){
      $('.checkitem').prop("checked",$(this).prop("checked"))
    })

    $(document).on('click','#delsel', function(){
        var link = $(this).attr('href');

        var url = window.location.pathname +"-delete-all";
        var id = [];
        $('.checkitem:checked').each(function(){
            id.push($(this).val());
        });
        if(id.length > 0){
            swal({
                title: "A jeni të sigurt?",
                text: "Nëse të dhënat fshihen nuk do të mund te kthehen prap!",
                icon: "warning",
                buttons: ["Anulo","Vazhdo"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                $.ajax({
                url: url,
                type: "GET",
                data: {id:id},
                beforeSend:function(){
                    window.swal({
                    title: "Ju lutem prisni!",
                    icon: "info",
                    text: "Të dhënat janë duke u fshirë",
                    buttons:false,
                    });
                },
                success: function(data){
                    window.swal({
                    title: "Sukses",
                    icon: "success",
                    text: "Te dhënat u fshin me sukses!",
                    buttons:false,
                    });
                    window.location.reload();
                },
                error: function () {
                    swal("Gabim", "Ndodhi një gabim gjatë fshirjës së të dhënave!", "error")
                }
            });
            } else {
                swal("Kërkesa për fshirjen e të dhënave është anuluar.");
            }
            });

            return false;
        }else{
            window.swal({
                title: "Gabim",
                icon: "error",
                text: "Ju lutem zgjidhni të pakten një checkbox për ta fshirë!",
                showConfirmButton:false,
            });
        }
    });

  // ***  END SELECT ALL CHECKBOX *** //

</script>

@endsection
