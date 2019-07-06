{{ Form::open( array( 'route' => ['branches.index'], 'role' => 'form' ) ) }}
    @include('admin.branches._fields')
{{ Form::close() }}