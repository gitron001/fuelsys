@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $transaction, ['route' => ['transactions.update', $transaction->id], 'method' => 'put', 'role' => 'form', 'class' => 'transaction-form'] ) }}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{ trans('adminlte::adminlte.transactions_details.edit') }}
        </h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('user_id') ? 'has-error' :'' }}">
                    {!! Form::label('user_id', trans('adminlte::adminlte.user')); !!}
                    {!! Form::select('user_id',['' => 'Select a User'] + $users,null,['class'=>'selectpicker
                    form-control','id'=>'userDropdown','data-live-search'=>'true','data-style'=>'btn-dropdownSelectNew']);
                    !!}
                    {{ Form::hidden('transaction_id', $transaction->id) }}
                    {{ Form::hidden('previous_user_id', $transaction->user_id) }}
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="transaction-save-btn">
                        <i class="fas fa-save"></i> {{ trans('adminlte::adminlte.save') }}
                    </button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> {{ trans('adminlte::adminlte.cancel') }} </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $("form.transaction-form").submit(function () {
            const button = document.getElementById('transaction-save-btn');
            button.disabled = true;
        });
    });
</script>
@endsection
