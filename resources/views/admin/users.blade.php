@extends('adminlte::page')

@section('content')
	<div class="box-body">
		<table class="table table-striped table-hover">
			<thead>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Updated At</th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<th>{{ $user->id }}</th>
						<th>{{ $user->name }}</th>
						<th>{{ $user->email }}</th>
						<th>{{ $user->created_at->diffForHumans() }}</th>
						<th>{{ $user->updated_at->diffForHumans() }}</th>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection