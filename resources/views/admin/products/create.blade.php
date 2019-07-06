{{ Form::open( array( 'route' => ['products.index'], 'role' => 'form' ) ) }}
    @include('admin.products._fields')
{{ Form::close() }}