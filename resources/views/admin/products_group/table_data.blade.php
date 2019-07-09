@foreach($products_group as $product_group)
<tr>
    <td>{{ $product_group->name }}</td>
    <td>{{ $product_group->state_code }}</td>
    <td>{{ $product_group->created_at->diffForHumans() }}</td>
    <td>{{ $product_group->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/products_group/'.$product_group->id.'/edit') }}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('product_group.delete', $product_group->id) }}" data-toggle="tooltip" title="Delete" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach
<tr>
    <td colspan=100% align="center">
        {{ $products_group->links() }}
    </td>
</tr>