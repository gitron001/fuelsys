@extends('adminlte::page')

@section('content')

@include('includes/alert_info')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tanks Details</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" role="form" action="{{ url('tanks_details') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="box-body">
            <div class="form-group">
                <label>Select Tank</label>
                <select class="form-control" name="tank_id" required="required">
                <option value="">Select tank</option>
                @if(count($tanks) > 0)
                    @foreach($tanks as $tank)
                        <option value="{{ $tank->id }}">{{ $tank->name }}</option>
                    @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label>Excel File</label>
                <input type="file" name="select_file" required>
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
