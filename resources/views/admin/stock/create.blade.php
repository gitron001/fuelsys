@extends('adminlte::page')

@section('content')

@include('includes/alert_info')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Save Stock</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" role="form" action="{{ url('stock-save') }}">
        {{ csrf_field() }}
        <div class="box-body">

            <div class="row">
                @foreach($tanks as $tank)
                <div class="col-md-6">
                    <label>Select Tank</label>
                    <select name="tank[]" class="form-control">
                            <option value="{{ $tank->id }}" selected>{{ $tank->name .' | '. $tank->product->name }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Amount</label>
                    {!! Form::number('amount[]',null,['class'=>'form-control','placeholder'=>'10 lit','step'=>'any']); !!}
                </div>
                @endforeach
            </div>
            <br>

        </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="upload">Save</button>
      </div>

    </form>
  </div>
  <!-- /.box -->
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
