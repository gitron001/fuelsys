@extends('adminlte::page')

@section('content')

<h1>{{!isset($user) ? 'Create new user' : 'Edit user'}}</h1>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('rfid') ? 'has-error' :'' }}">
            {!! Form::label('rfid', 'RFID:'); !!}
            {!! Form::number('rfid',null,['class'=>'form-control']); !!}
            {!! $errors->first('rfid','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
            {!! Form::label('name', 'Name:'); !!}
            {!! Form::text('name',null,['class'=>'form-control']); !!}
            {!! $errors->first('name','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
            {!! Form::label('email', 'Email:'); !!}
            {!! Form::text('email',null,['class'=>'form-control']); !!}
            {!! $errors->first('email','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
            {!! Form::label('password', 'Password:'); !!}
            {!! Form::password('password',['class'=>'form-control','autocomplete'=>'new-password']); !!}
            {!! $errors->first('password','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
            {!! Form::label('status', 'Status:'); !!}
            {!! Form::select('status',[1=>'Active',2=>'No Active'],null,['class'=>'form-control']); !!}
            {!! $errors->first('status','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
            {!! Form::label('type', 'Type:'); !!}
            {!! Form::select('type',['' => 'Select', 1 => 'Staff',2=> 'Company',3=> 'Administrator',4=>'Client',5=>'Manager'],null,['class'=>'form-control', 'id' => 'showHide']); !!}
            {!! $errors->first('type','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('has_limit') ? 'has-error' :'' }}">
            {!! Form::label('has_limit', 'Has Limit:'); !!}
            {!! Form::select('has_limit',[0=>'No',1=>'Yes',],null,['class'=>'form-control','id'=>'showHideLimits']); !!}
            {!! $errors->first('status','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company" style="display: none">
            {!! Form::label('company_id', 'Company:'); !!}
            {!! Form::select('company_id',['Choose Company'] + $companies,null,['class'=>'form-control']); !!}
            {!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('limits') ? 'has-error' :'' }}" id="has_limits" style="display: none">
            {!! Form::label('limits', 'Limit:'); !!}
            {!! Form::number('limits',null,['class'=>'form-control']); !!}
            {!! $errors->first('limits','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('starting_balance') ? 'has-error' :'' }}" id="starting_balance" style="display: none">
            {!! Form::label('starting_balance', 'Starting Balance:'); !!}
            {!! Form::number('starting_balance',null,['class'=>'form-control']); !!}
            {!! $errors->first('starting_balance','<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>

@if(!isset($user))
<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
    {!! Form::label('discounts', 'Discounts:'); !!}

    <div class="row">
        <div class="col-md-1 text-center">
            <button type="button" class="btn btn-default btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <div class="col-md-5">
            {!! Form::select('product[]',['Choose Product'] + $products,null,['class'=>'form-control']); !!}
        </div>
        <div class="col-md-6">
            {!! Form::number('discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
    {!! Form::label('limits', 'Limits:'); !!}

    <div class="row">
        <div class="col-md-1 text-center">
            <button type="button" class="btn btn-default btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <div class="col-md-5">
            {!! Form::select('branch[]',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!}
        </div>
        <div class="col-md-6">
            {!! Form::number('limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
        </div>
    </div>

</div>

@else
<!-- *** DISCOUNT *** -->

@if(count($rfid_discounts) > 0)

{!! Form::label('discount', 'Discounts'); !!}
@foreach($rfid_discounts as $rfid_discount)
    <div class="form-group">

        <div class="row" id="discount">
            <input type="hidden" name="hidden_input_product[]" value="{{$rfid_discount->id}}">
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-circle" id="deleteDiscount"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteDiscount[]" value="{{$rfid_discount->id}}"></button>
            </div>
            <div class="col-md-5">
                <select name="product[]" class="form-control">
                    @foreach($products as $product_id => $product_name)
                        <option value="{{ $product_id }}" {{$rfid_discount->product_id == $product_id  ? 'selected' : ''}}>{{ $product_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                {!! Form::text('discount[]',$rfid_discount->discount,['class'=>'form-control','step'=>'any']); !!}
            </div>
        </div>

    </div>
@endforeach

@endif

<!-- *** END DISCOUNT *** -->

<!-- *** NEW DISCOUNT *** -->

<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
@if(count($rfid_discounts) == 0)
    {!! Form::label('discount', 'New Discounts'); !!}
@endif
<div class="row">
    <div class="col-md-1">
        <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
    <div class="col-md-5">
        {!! Form::select('new_product[]',['Choose a Product'] + $products,null,['class'=>'form-control']); !!}
    </div>
    <div class="col-md-6">
        {!! Form::number('new_discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
    </div>
</div>
<br>
</div>

<!-- *** END NEW LIMITS *** -->

<!-- *** LIMITS *** -->

@if(count($rfid_limits) > 0)

{!! Form::label('limit', 'Limit'); !!}
@foreach($rfid_limits as $rfid_limit)
    <div class="form-group">

        <div class="row" id="limit">
            <input type="hidden" name="hidden_input_branch[]" value="{{$rfid_limit->id}}">
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-circle" id="deleteLimit"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteLimit[]" value="{{$rfid_limit->id}}"></button>
            </div>
            <div class="col-md-5">
                <select name="branch[]" class="form-control">
                    @foreach($branches as $branch_id => $branch_name)
                        <option value="{{ $branch_id }}" {{$rfid_limit->branch_id == $branch_id  ? 'selected' : ''}}>{{ $branch_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                {!! Form::number('limit[]',$rfid_limit->limit,['class'=>'form-control','step'=>'any']); !!}
            </div>
        </div>

    </div>
@endforeach

@endif

<!-- *** END LIMITS *** -->

<!-- *** NEW LIMITS *** -->

<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
@if(count($rfid_limits) == 0)
    {!! Form::label('limits', 'New Limits:'); !!}
@endif

<div class="row">
    <div class="col-md-1">
        <button type="button" class="btn btn-success btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
    <div class="col-md-5">
        {!! Form::select('new_branch[]',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!}
    </div>
    <div class="col-md-6">
        {!! Form::number('new_limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
    </div>
</div>
<br>

</div>
@endif

<!-- *** END NEW LIMITS *** -->

<div class="form-group {{ $errors->has('one_time_limit') ? 'has-error' :'' }}" id="one_time_limit" style="display: none">
    {!! Form::label('one_time_limit', 'One_Time_Limit:'); !!}
    {!! Form::number('one_time_limit',null,['class'=>'form-control']); !!}
    {!! $errors->first('one_time_limit','<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('plates') ? 'has-error' :'' }}" id="plates" style="display: none">
    {!! Form::label('plates', 'Plates:'); !!}
    {!! Form::text('plates',null,['class'=>'form-control']); !!}
    {!! $errors->first('plates','<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vehicle') ? 'has-error' :'' }}" id="vehicle" style="display: none">
    {!! Form::label('vehicle', 'Vehicle:'); !!}
    {!! Form::text('vehicle',null,['class'=>'form-control']); !!}
    {!! $errors->first('vehicle','<span class="help-block">:message</span>') !!}
</div>


<div class="form-group">
    {!! Form::submit((!isset($user) ? 'Create new company' : 'Edit Company'), ['class'=>'btn btn-block btn-success']); !!}
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
    // Check has_limit field
    $(document).on('click','#showHideLimits',function(){
        var e = document.getElementById("showHideLimits");
        var value = e.options[e.selectedIndex].value;

        $('#txtpsw').val('');

        if(value == 1){
            $("#starting_balance").show();
            $("#has_limits").show();
        }else {
            $("#starting_balance").hide();
            $("#has_limits").hide();
        }
    });

    // Check if company is selected and show discount fields
    $(document).on('click','#showHide',function(){
        var e = document.getElementById("showHide");
        var value = e.options[e.selectedIndex].value;

        if(value == 2){
            $("#company").show();
            $("#one_time_limit").show();
            $("#plates").show();
            $("#vehicle").show();
        }else {
            $("#company").hide();
            $("#one_time_limit").hide();
            $("#plates").hide();
            $("#vehicle").hide();
        }
    });

    //Append another div if button(discounts) + is clicked
    $(document).on('click','#addProduct',function(){
        $("#discounts").append('<div class="row" id="products"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_product[]" required><option value="">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_discount[]" type="number" required></div></div><br>');
    });

    //Append another div if button(limits) + is clicked
    $(document).on('click','#addBranch',function(){
        $("#addlimits").append('<div class="row" id="branches"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_limit[]" type="number" required></div></div><br>');
    });

    $(document).on('click','#deleteDiscount',function(){
        $(this).closest("#discount").remove();
    });

    $(document).on('click','#deleteLimit',function(){
        $(this).closest("#limit").remove();
    });

    $(document).on('click','#removeProduct',function(){
        $(this).closest("#products").remove();
    });

    $(document).on('click','#removeBranch',function(){
        $(this).closest("#branches").remove();
    });



</script>

@endsection