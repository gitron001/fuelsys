@foreach($products as $product)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem" value="{{ $product->id }}"></td>
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

@if($products->total() > 15)
    @include('includes.pagination', ['data' => $products])
@endif

@include('includes.spinner')
