@extends('adminlte::page')

@section('content')


<!-- include staff menu -->
@include('admin.staff.staff_menu')
<!-- END box box-primary -->

@if (Request::path() == 'admin/staff')
    <!-- include staff data -->
    @include('admin.staff.staff_data')
@endif

@if (Request::path() == 'admin/staff/stock')
    <!-- Incoming Stock -->
    @include('admin.staff.stock')
@endif

<!-- inlcude Stock data -->
<?php global $totalizer_sales; ?>
<?php $totalizer_sales = array(); ?>
<?php global $tank_sales; ?>
<?php $tank_sales = array(); ?>
@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/dispensers' || Request::path() == 'admin/staff/stock')

    @include('admin.staff.dispanser_data')

@endif
<!-- inlcude Stock data -->
<?php global $sales_by_product; ?>
<?php global $pos_total; ?>
<?php $sales_by_product = array(); ?>
@if (Request::path() == 'admin/staff/stock')

    @include('admin.staff.total_stock')
@endif

@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/dispensers')
    <!-- inlcude Stock data -->
    @include('admin.staff.product_totals')
@endif

@if (Request::path() == 'admin/staff/products')
    <!-- include staff data -->
    @include('admin.staff.products_data')
@endif

@if (Request::path() == 'admin/staff/companies')
    <!-- inlcude companies data -->
    @include('admin.staff.companies_data')
@endif

@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/payments')
    <!-- inlcude payments data -->
    @include('admin.staff.payments_data')
@endif

@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/expenses')
    <!-- inlcude expenses data -->
    @include('admin.staff.expenses_data')
@endif

@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/pos-sales')
    <!-- inlcude pos sales data -->
    @include('admin.staff.pos_sales')
@endif

@if (Request::path() == 'admin/staff')
    <!-- inlcude staff total data -->
    @include('admin.staff.total')
@endif

@if (Request::path() == 'admin/staff/products-daily')
    <!-- inlcude staff total data -->
    @include('admin.staff.product_totals_daily')
@endif


<div class="modal fade" id="close_shift_additional_data">
    <div class="modal-dialog" style="width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger btn-flat margin pull-left" data-dismiss="modal">Close</button>
                <button class="btn bg-primary btn-flat margin" type="submit" name="submit" value="Submit" onclick="event.preventDefault();document.getElementById('shift_additonal_data_form').submit();">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection



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
        $(document).ready(function(){
            // Export staff data to Excel
            $('#export_excel_staff_view').click(function(e){
				
                var fromDate = $('#datetimepicker4').val();
                var toDate = $('#datetimepicker5').val();
                var shift = $('#shift').val();
                var user = $("#user").val();
                var search_type = $('input[name="search_type"]:checked').val();

                $.ajax({
                    type: "GET",
                    data: {fromDate: fromDate, toDate: toDate, user: user,shift:shift,search_type:search_type},
                    url: "{{ URL('/excel_export_staff_view')}}",
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
			
			 $('#export_excel_products_view').click(function(e){
				e.preventDefault();
                var fromDate = $('#datetimepicker4').val();
                var toDate = $('#datetimepicker5').val();
                var shift = $('#shift').val();
                var user = $("#user").val();
                var search_type = $('input[name="search_type"]:checked').val();
				var type = $(this).data('type');
				
                $.ajax({
                    type: "GET",
                    data: {fromDate: fromDate, toDate: toDate, user: user,shift:shift,search_type:search_type},
                    url: "{{ URL('/generate_product_daily_pdf')}}",
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

            // Send shift in email
            $('#send_shift_email').click(function(){
                var fromDate = $('#datetimepicker4').val();
                var toDate = $('#datetimepicker5').val();
                var shift = $('#shift').val();
                var user = $("#user").val();

                swal({
                    title: "A dëshironi të vazhdoni?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                    buttons: ['Jo','Po']
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: {fromDate: fromDate, toDate: toDate, user: user,shift:shift,"_token":"{{ csrf_token() }}"},
                        dataType: 'json',
                        url: "{{ URL('/send_shift_email')}}",
                        beforeSend:function(){
                            window.swal({
                            title: "Ju lutem prisni!",
                            icon: "info",
                            text: "Email është duke u dërguar.",
                            buttons:false,
                            });
                        },
                        success: function(data){
                            swal("Sukses", "Email është dërguar me sukses", "success");
                        }
                    });
                } else {
                    swal("Kërkesa është anuluar.");
                }
            });
        });

            // Close shift button
            $('#close_shift').click(function(){
                swal({
                    title: "A dëshironi të vazhdoni?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                    buttons: ['Jo','Po']
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: {"_token":"{{ csrf_token() }}"},
                        dataType: 'json',
                        url: "{{ URL('/close_shift')}}",
                        beforeSend:function(){
                            window.swal({
                            title: "Ju lutem prisni!",
                            icon: "info",
                            text: "Të dhënat janë duke u ruajtur",
                            buttons:false,
                            });
                        },
                        success: function(data){
                            if(data.response == '-2'){
                                swal("Error", "Te gjitha popat duhet te jene te mbyllura. Provon Perseri!!", "error");
                            }else{
                                swal("Sukses", "Të dhënat u ruajtën me sukses", "success");
                                $('#close_shift_additional_data').modal('show');
                                $.get("/admin/close_shift_additional_data", function (data) {
                                    $(".modal-title").html('FuelSystem');
                                    $(".modal-body").html(data);
                                    $('.selectpicker').selectpicker();
                                });
                            }
                        }
                    });
                } else {
                    swal("Kërkesa është anuluar.");
                }
            });


            });
        });

        $( document ).ready(function() {
            $('.users-dropdown').select2({
                placeholder: "Select a user"
            });

            document.querySelector('body').classList.remove('sidebar-mini');
            document.querySelector('body').classList.add('sidebar-collapse');
            $('.navbar a').removeClass("sidebar-toggle");

            $('.search_type_js').click(function(){
                $('.search_type_js').prop("checked", false);
                $(this).prop("checked", true);
                if($(this).attr('value') == 'shifts'){
                    $('.shift_range_js').show();
                    $('.date_range_js').hide();
                }else{
                    $('.shift_range_reset').prop('selectedIndex',0);
                    $('.shift_range_js').hide();
                    $('.date_range_js').show();
                }
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

        // Add Expense
        $(document).on('click', '.add_expense', function (e) {
            e.preventDefault();
            $("#add_expenses").append('<div class="box-body" id="expense"><div class="col-md-4"><div class="form-group"><select class="selectpicker form-control" data-live-search="true" data-style="btn-dropdownSelectNew" name="expense_user_id[]"><option value="" selected="selected">Select a User</option><?php foreach($users as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div></div><div class="col-md-2"><div class="form-group"><select class="selectpicker form-control" data-live-search="true" data-style="btn-dropdownSelectNew" name="expense_categories[]"><option value="" selected="selected">Select a Type</option><?php foreach($categories as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div></div><div class="col-md-2"><div class="form-group"><input class="form-control" step="any" placeholder="Amount" name="expense_amount[]" type="number"></div></div><div class="col-md-3"><div class="form-group"><textarea class="form-control" rows="1" placeholder="Description" name="expense_description[]" cols="50"></textarea></div></div><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle pull-right" id="removeExpense"><i class="fa fa-minus"></i></button></div></div></div>');
            $('.selectpicker').selectpicker();
        });

        $(document).on('click','#removeExpense',function(){
            $(this).closest("#expense").remove();
        });

        // Add Payment
        $(document).on('click', '.add_payment', function (e) {
            e.preventDefault();
            $("#add_payments").append('<div class="box-body" id="payment"><div class="col-md-4"><div class="form-group"><select class="selectpicker form-control" data-live-search="true" data-style="btn-dropdownSelectNew" name="payment_user_id[]"><option value="" selected="selected">Select a User</option><?php foreach($users as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div></div><div class="col-md-2"><div class="form-group"><select class="selectpicker form-control" data-live-search="true" data-style="btn-dropdownSelectNew" name="payment_categories[]"><option value="" selected="selected">Select a Type</option><?php foreach($categories as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div></div><div class="col-md-5"><div class="form-group"><input class="form-control" step="any" placeholder="Amount" name="payment_amount[]" type="number"></div></div><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle pull-right" id="removePayment"><i class="fa fa-minus"></i></button></div></div></div>');
            $('.selectpicker').selectpicker();
        });

        $(document).on('click','#removePayment',function(){
            $(this).closest("#payment").remove();
        });

        // Add bank
        $(document).on('click', '.add_bank', function (e) {
            e.preventDefault();
            $("#add_banks").append('<div class="box-body" id="bank"><div class="col-md-6"><div class="form-group"><select class="form-control" data-live-search="true" data-style="btn-dropdownSelectNew" name="bank_id[]"><option value="" selected="selected">Select a Bank</option><?php foreach($banks as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div></div><div class="col-md-5"><div class="form-group"><input class="form-control" step="any" placeholder="Amount" name="bank_amount[]" type="number"></div></div><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle pull-right" id="removeBank"><i class="fa fa-minus"></i></button></div></div></div>');
        });

        $(document).on('click','#removeBank',function(){
            $(this).closest("#bank").remove();
        });
    </script>
@endsection
