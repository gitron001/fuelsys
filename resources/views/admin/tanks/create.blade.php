{{ Form::open( array( 'route' => ['tanks.index'], 'role' => 'form' ) ) }}
    @include('admin.tanks._fields')
{{ Form::close() }}