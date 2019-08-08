@extends('adminlte::page')

@section('content')

@include('includes/alert_info')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Upload Excel</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" role="form" enctype="multipart/form-data" action="{{ url('import_excel/import') }}">
        {{ csrf_field() }}
        <div class="box-body">

            <div class="form-group">
                <label>Select User Type</label>
                <select class="form-control" name="type" required>
                <option value="">Select</option>
                <option value="6">Bonus Memeber</option>
                <option value="7">Bonus Klient</option>
                <option value="8">Bonus Korporate</option>
                </select>
            </div>

            <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
                {!! Form::label('discounts', 'Discounts:'); !!}

                <div class="row">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="col-md-5">
                        {!! Form::select('product[]',['Choose Product'] + $products,null,['class'=>'form-control']); !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::number('discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
                    </div>
                </div>
                <br>
            </div>

            <div class="form-group">
            <label for="upload_file">Upload File</label>
            <input type="file" name="upload_file" required>
            </div>

        </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
      </div>

    </form>
  </div>
  <!-- /.box -->
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script>

    //Append another div if button(discounts) + is clicked
    $(document).on('click','#addProduct',function(){
        $("#discounts").append('<div class="row" id="products"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="product[]" required><option value="">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="discount[]" type="number" required></div></div><br>');
    });

    $(document).on('click','#removeProduct',function(){
        $(this).closest("#products").remove();
    });
</script>
@endsection