{{ Form::model( $company, ['route' => ['companies.update', $company->id], 'method' => 'put', 'role' => 'form','enctype' => 'multipart/form-data'] ) }}
    @include('admin.companies._fields')
{{ Form::close() }}