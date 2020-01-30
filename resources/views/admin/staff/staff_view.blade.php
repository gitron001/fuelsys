@extends('adminlte::page')

@section('content')


<!-- include staff menu --> 
@include('admin.staff.staff_menu')
<!-- END box box-primary -->

@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/dispensers')
    <!-- include dispanser and product data --> 
    @include('admin.staff.dispanser_data')  
@endif


@if (Request::path() == 'admin/staff')
    <!-- include staff data --> 
    @include('admin.staff.staff_data')
@endif

@if (Request::path() == 'admin/staff' || Request::path() == 'admin/staff/companies')
    <!-- inlcude companies data -->
    @include('admin.staff.companies_data')
@endif 

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
            $('#export_excel_staff_view').click(function(){
            var fromDate = $('#datetimepicker4').val();
            var toDate = $('#datetimepicker5').val();
            var shift = $('#shift').val();
            var user = $("#user").val();

                $.ajax({
                    type: "GET",
                    data: {fromDate: fromDate, toDate: toDate, user: user,shift:shift},
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
    </script>
@endsection
