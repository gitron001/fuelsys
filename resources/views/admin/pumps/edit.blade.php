@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $pump, ['route' => ['pumps.update', $pump->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.pumps._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
