{{ Form::model( $tank, ['route' => ['tanks.update', $tank->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.tanks._fields')
{{ Form::close() }}