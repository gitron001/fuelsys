{{ Form::open( array( 'route' => ['companies.index'], 'role' => 'form' ,'enctype' => 'multipart/form-data') ) }}
    @include('admin.companies._fields')
{{ Form::close() }}