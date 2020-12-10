@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $tank, ['route' => ['tanks.update', $tank->id], 'method' => 'put', 'role' => 'form', 'enctype'=>'multipart/form-data'] ) }}
    @include('admin.tanks._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
