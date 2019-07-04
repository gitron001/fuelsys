{{ Form::open( array( 'route' => ['companies.index'], 'role' => 'form' ) ) }}
    @include('admin.companies._fields')
{{ Form::close() }}