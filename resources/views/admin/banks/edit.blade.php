@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $bank, ['route' => ['banks.update', $bank->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.banks._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
