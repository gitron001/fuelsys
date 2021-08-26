<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{!isset($branch) ? trans('adminlte::adminlte.branches_details.create_new') : trans('adminlte::adminlte.branches_details.edit') }}</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
					{!! Form::label('name', trans('adminlte::adminlte.name')); !!}
					{!! Form::text('name',null,['class'=>'form-control']); !!}
					{!! $errors->first('name','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
					{!! Form::label('address', trans('adminlte::adminlte.address')); !!}
					{!! Form::text('address',null,['class'=>'form-control']); !!}
					{!! $errors->first('address','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group {{ $errors->has('city') ? 'has-error' :'' }}">
					{!! Form::label('city', trans('adminlte::adminlte.city')); !!}
					{!! Form::text('city',null,['class'=>'form-control']); !!}
					{!! $errors->first('city','<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
					{!! Form::label('status', trans('adminlte::adminlte.status')); !!}
					{!! Form::select('status',[0=>'No Active',1=>'Active'],null,['class'=>'form-control']); !!}
					{!! $errors->first('status','<span class="help-block">:message</span>') !!}
				</div>
			</div>
		</div>

        @if(!isset($branch))
        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
            {!! Form::label('discounts', trans('adminlte::adminlte.products')); !!}

            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div class="col-md-5">
                    <select name="product[]" class="form-control">
						<option value="">Choose Master Branch Product</option>
						@foreach($products as $pr)
							<option value="{{ $pr->pfc_pr_id }}">{{ $pr->name }}</option>
						@endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    {!! Form::number('product_pfc_id[]',null,['class'=>'form-control','placeholder'=>'Enter branch product PFC id']); !!}
                </div>
            </div>
        </div>
        @else
        {!! Form::label('discount', trans('adminlte::adminlte.products')); !!}
        <div class="form-group"  id="discounts">
        @if(count($products_branch) > 0)

			@foreach($products_branch as $product_branch)
                <div class="row" id="products_branch" style="margin-top: 10px;">
                    <input type="hidden" name="hidden_input_product[]" value="{{ $product_branch->id }}">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-circle deleteProducts"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteProducts[]" value="{{$product_branch->id}}"></button>
                    </div>
                    <div class="col-md-5">
                        <select name="product[]" class="form-control">
							<option value="">Choose Master Branch Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->pfc_pr_id }}" {{ $product_branch->master_pfc_product_id == $product->pfc_pr_id  ? 'selected' : ''}}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('product_pfc_id[]',$product_branch->branch_pfc_product_id,['class'=>'form-control']); !!}
                    </div>
                </div>
			@endforeach
        @endif
		</div>

        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}">
            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i> {{ trans('adminlte::adminlte.add_product') }}</button>
                </div>
            </div>
            <br>
        </div>
        @endif
	</div>

	<div class="box-footer">
		<button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> {{ trans('adminlte::adminlte.save') }}
        </button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> {{ trans('adminlte::adminlte.cancel') }} </a>
	</div>
</div>
