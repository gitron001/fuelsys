@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::open( array( 'route' => ['tanks.index'], 'role' => 'form', 'enctype'=>'multipart/form-data' ) ) }}
    @include('admin.tanks._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
