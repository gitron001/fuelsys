{{ Form::open( array( 'route' => ['pfc.index'], 'role' => 'form' ) ) }}
    @include('admin.pfc._fields')
{{ Form::close() }}