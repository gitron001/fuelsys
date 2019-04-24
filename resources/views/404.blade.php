@extends('adminlte::page')

@section('content')


    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found</h3>
            <br><br>
            <p>We are sorry, but the page you requested was not found</p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')