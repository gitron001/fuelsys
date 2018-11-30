@extends('adminlte::page')

@section('title', 'Fuel System')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    
    Change Language:
    <ul class="list-group">
	  <li class="list-group-item"><a href="locale/en">English</a></li>
	  <li class="list-group-item"><a href="locale/al">Albanian</a></li>
	</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop