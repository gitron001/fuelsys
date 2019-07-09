@foreach($products as $product)
<tr>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->product_group->name }}</td>
    <td>{{ $product->vat }}</td>
    <td>{{ $product->pfc ? $product->pfc->name : '' }}</td>
    <td>{{ $product->created_at->diffForHumans() }}</td>
    <td>{{ $product->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/products/'.$product->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('product.delete', $product->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach
<tr>
    <td colspan=100% align="center">
        {{ $products->links() }}
    </td>
</tr>