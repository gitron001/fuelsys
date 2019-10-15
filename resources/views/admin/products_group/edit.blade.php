@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $product_group, ['route' => ['products_group.update', $product_group->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.products_group._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
