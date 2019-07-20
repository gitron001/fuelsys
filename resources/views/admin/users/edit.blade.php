{{ Form::model( $user, ['route' => ['users.update', $user->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.users._fields')
{{ Form::close() }}