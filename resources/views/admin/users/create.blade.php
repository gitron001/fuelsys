{{ Form::open( array( 'route' => ['users.index'], 'role' => 'form' ) ) }}
    @include('admin.users._fields')
{{ Form::close() }}