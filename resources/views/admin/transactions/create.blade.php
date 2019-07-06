{{ Form::open( array( 'route' => ['transaction.index'], 'role' => 'form' ) ) }}
    @include('admin.transactions._fields')
{{ Form::close() }}