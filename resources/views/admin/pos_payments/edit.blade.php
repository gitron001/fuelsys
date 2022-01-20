@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $pos_payment, ['route' => ['pos-payments.update', $pos_payment->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.pos_payments._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
	$('#datetimepickerF').datetimepicker();
</script>

@endsection

