{{ Form::open( array( 'route' => ['payments.index'], 'role' => 'form' ) ) }}
    @include('admin.payments._fields')
{{ Form::close() }}