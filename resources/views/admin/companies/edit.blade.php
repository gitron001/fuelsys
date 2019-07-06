{{ Form::model( $company, ['route' => ['companies.update', $company->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.companies._fields')
{{ Form::close() }}