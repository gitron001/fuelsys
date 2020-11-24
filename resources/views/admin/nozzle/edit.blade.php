@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $pump, ['route' => ['nozzle.update', $pump->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.nozzle._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
