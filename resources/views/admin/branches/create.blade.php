@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::open( array( 'route' => ['branches.index'], 'role' => 'form' ) ) }}
    @include('admin.branches._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
    //Append another div if button(products) + is clicked
    $(document).on('click','#addProduct',function(){
        $("#discounts").append('<div class="row" id="products" style="margin-top: 10px;"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="product[]" required><option value="">Choose Master Branch Product</option><?php foreach($products as $pr){ ?><?php echo "<option value=".$pr->pfc_pr_id.">$pr->name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" placeholder="Enter branch product PFC id" name="product_pfc_id[]" type="number" required></div></div>');
    });

    $(document).on('click','#removeProduct',function(){
        $(this).closest("#products").remove();
    });
</script>

@endsection
