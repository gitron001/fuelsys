@foreach($products_group as $product_group)
<tr>
    <td><input type="checkbox" name="chkbox" class="checkitem checkbox-select-all" value="{{ $product_group->id }}"></td>
    <td>{{ $product_group->name }}</td>
    <td>{{ $product_group->state_code }}</td>
    <td>{{ $product_group->created_at->diffForHumans() }}</td>
    <td>{{ $product_group->updated_at->diffForHumans() }}</td>
    <td class="text-center" width="8%">
        <a href="{{ url('admin/products_group/'.$product_group->id.'/edit') }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.edit') }}"><i class="fa fa-edit"></i></a>&nbsp;
        <a href="{{ route('product_group.delete', $product_group->id) }}" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.delete') }}" class="delete-item"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach

@if($products_group->total() > 15)
    @include('includes.pagination', ['data' => $products_group])
@endif

@include('includes.spinner')
