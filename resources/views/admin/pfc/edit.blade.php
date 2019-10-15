@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $pfc, ['route' => ['pfc.update', $pfc->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.pfc._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
