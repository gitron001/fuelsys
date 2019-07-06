{{ Form::model( $product, ['route' => ['products.update', $product->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.products._fields')
{{ Form::close() }}