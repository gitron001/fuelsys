{{ Form::model( $branch, ['route' => ['branches.update', $branch->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.branches._fields')
{{ Form::close() }}