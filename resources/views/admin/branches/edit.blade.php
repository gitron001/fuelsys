@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $branch, ['route' => ['branches.update', $branch->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.branches._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
