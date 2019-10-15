@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $dispaneser, ['route' => ['dispanesers.update', $dispaneser->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.dispanesers._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
