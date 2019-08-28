@extends('adminlte::page')

@section('content')

@include('includes/alert_info')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Update Bonus Card</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" role="form" action="{{ url('update_card/update') }}">
        {{ csrf_field() }}
        <div class="box-body">

            <div class="form-group">
                <label>Select User Type</label>
                <select class="form-control" name="type" required>
                <option value="">Select</option>
                <option value="6">Bonus Member</option>
                <option value="7">Bonus Klient</option>
                <option value="8">Bonus Korporate</option>
                </select>
            </div>

            <div class="row">
                @foreach($products as $pr)
                <div class="col-md-6">
                    <label>Select Product</label>
                    <select name="product[]" class="form-control">
                        <option value="{{ $pr->pfc_pr_id }}" selected>{{ $pr->name }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Discount</label>
                    {!! Form::number('discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
                </div>
                @endforeach
            </div>

        </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="upload">Update</button>
      </div>

    </form>
  </div>
  <!-- /.box -->
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')