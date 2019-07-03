{{ Form::open( array( 'route' => ['products_group.index'], 'role' => 'form' ) ) }}
    @include('admin.products_group._fields')
{{ Form::close() }}