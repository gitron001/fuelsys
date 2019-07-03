{{ Form::model( $product_group, ['route' => ['products_group.update', $product_group->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.products_group._fields')
{{ Form::close() }}