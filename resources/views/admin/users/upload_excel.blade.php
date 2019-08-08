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
                <label>Select</label>
                <select class="form-control" name="type" required>
                <option value="">Select option</option>
                <option value="6">Bonus Memeber</option>
                <option value="7">Bonus Klient</option>
                <option value="8">Bonus Korporate</option>
                </select>
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

@include('includes/footer')