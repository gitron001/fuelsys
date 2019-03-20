@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

	<div class="content">
		<div class="row">
			   <div class="box">
            <div class="box-header">
              <div class="col-md-6"><h3 class="box-title">Products</h3></div>
              <div class="col-md-6">
                <span class="pull-right">
                  <a href="{{ url('admin/products/create') }}"><button type="button" class="btn btn-block btn-success">+ Create new product</button></a>
                </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Vat</th>
                  <th>PFC</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                  	<td>{{ $product->name }}</td>
                  	<td>{{ $product->price }}</td>
                    <td>{{ $product->vat }}</td>
                    <td>{{ $product->pfc->name }}</td>
                    <td>{{ $product->created_at->diffForHumans() }}</td>
                  	<td>{{ $product->updated_at->diffForHumans() }}</td>
                  	<td><a href="{{ url('admin/products/'.$product->id.'/edit') }}"><button type="button" class="btn btn-block btn-primary">Edit</button></a></td>
                    <td>
                      {!! Form::open(['method'=>'DELETE', 'action'=>['ProductController@destroy',$product->id]]) !!}
                        <div class="form-group">
                          {!! Form::button('Delete', ['class'=>'btn btn-block btn-danger delete-item']); !!}
                        </div>
                     {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              <div class="text-center">
                {{ $products->links() }}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@include('includes/footer')
