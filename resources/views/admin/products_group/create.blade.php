@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::open( array( 'route' => ['products_group.index'], 'role' => 'form' ) ) }}
    @include('admin.products_group._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
