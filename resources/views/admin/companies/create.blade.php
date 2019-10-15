@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::open( array( 'route' => ['companies.index'], 'role' => 'form' ,'enctype' => 'multipart/form-data') ) }}
    @include('admin.companies._fields')
{{ Form::close() }}

@endsection

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

	<script>

		$(document).ready(function() {
            var value = $('#showHide option:selected').val();

            if(value == 1){
                $("#starting_balance").show();
                $("#has_limits").show();
            }else {
                $("#starting_balance").hide();
                $("#has_limits").hide();
			}
			var value = $('#showHideEmail option:selected').val();
			if(value == 1){
                $(".email_settings").show();
            }else {
                $(".email_settings").hide();
			}
        });

		// Check has_limit field
        $(document).on('click','#showHide',function(){
            var value = $('#showHide option:selected').val();

            if(value == 1){
            	$("#starting_balance").show();
                $("#has_limits").show();
            }else {
            	$("#starting_balance").hide();
                $("#has_limits").hide();
            }
        });

        $(document).on('click','#showHideEmail',function(){
            var value = $('#showHideEmail option:selected').val();

            if(value == 1){
            	$(".email_settings").show();
            }else {
            	$(".email_settings").hide();
            }
        });
        //Append another div if button(discounts) + is clicked
		$(document).on('click','#addProduct',function(){
			$("#discounts").append('<div class="row" id="products" style="margin-top: 10px;"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="product[]" required><option value="">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="discount[]" type="number" required></div></div>');
		});

		//Append another div if button(limits) + is clicked
		$(document).on('click','#addBranch',function(){
			$("#addlimits").append('<div class="row" id="branches"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_limit[]" type="number" required></div></div><br>');
		});

		$(document).on('click','#deleteDiscount',function(){
            $(this).closest("#discount").remove();
		});

		$(document).on('click','#deleteLimit',function(){
            $(this).closest("#limit").remove();
        });

        $(document).on('click','#removeProduct',function(){
            $(this).closest("#products").remove();
        });

        $(document).on('click','#removeBranch',function(){
            $(this).closest("#branches").remove();
        });

	</script>

@endsection

