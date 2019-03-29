@extends('adminlte::page')

@section('content')
    <h1>Create new user</h1>

    {!! Form::open(['method'=>'POST', 'action'=>['UsersController@store']]) !!}

    <div class="form-group {{ $errors->has('rfid') ? 'has-error' :'' }}">
        {!! Form::label('rfid', 'RFID:'); !!}
        {!! Form::number('rfid',null,['class'=>'form-control']); !!}
        {!! $errors->first('rfid','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
        {!! Form::label('name', 'Name:'); !!}
        {!! Form::text('name',null,['class'=>'form-control']); !!}
        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
        {!! Form::label('password', 'Password:'); !!}
        {!! Form::password('password',['class'=>'form-control']); !!}
        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
        {!! Form::label('email', 'Email:'); !!}
        {!! Form::text('email',null,['class'=>'form-control']); !!}
        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
        {!! Form::label('status', 'Status:'); !!}
        {!! Form::select('status',[1=>'Active',0=>'No Active'],null,['class'=>'form-control']); !!}
        {!! $errors->first('status','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
        {!! Form::label('type', 'Type:'); !!}
        {!! Form::select('type',['' => 'Select', 1 => 'Staff',2=> 'Company',3=> 'Administrator',4=>'Client'],null,['class'=>'form-control', 'id' => 'showHide']); !!}
        {!! $errors->first('type','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company" style="display: none">
        {!! Form::label('company_id', 'Company:'); !!}
        {!! Form::select('company_id',['Choose Company'] + $companies,null,['class'=>'form-control']); !!}
        {!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('has_limit') ? 'has-error' :'' }}">
        {!! Form::label('has_limit', 'Has Limit:'); !!}
        {!! Form::select('has_limit',[0=>'No',1=>'Yes',],null,['class'=>'form-control','id'=>'showHideLimits']); !!}
        {!! $errors->first('status','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('limits') ? 'has-error' :'' }}" id="has_limits" style="display: none">
        {!! Form::label('limits', 'Limit:'); !!}
        {!! Form::number('limits',null,['class'=>'form-control']); !!}
        {!! $errors->first('limits','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('starting_balance') ? 'has-error' :'' }}" id="starting_balance" style="display: none">
        {!! Form::label('starting_balance', 'Starting Balance:'); !!}
        {!! Form::number('starting_balance',null,['class'=>'form-control']); !!}
        {!! $errors->first('starting_balance','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
        {!! Form::label('discounts', 'Discounts:'); !!}

        <div class="row">
            <div class="col-md-1 text-center">
                <button type="button" class="btn btn-default btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="col-md-6">
                {!! Form::select('product[]',['Choose Product'] + $products,null,['class'=>'form-control']); !!}
            </div>
            <div class="col-md-5">
                {!! Form::number('discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
            </div>
        </div>

    </div>

    <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="limits">
        {!! Form::label('limits', 'Limits:'); !!}

        <div class="row">
            <div class="col-md-1 text-center">
                <button type="button" class="btn btn-default btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="col-md-6">
                {!! Form::select('branch[]',['Choose Branch'] + $branches,null,['class'=>'form-control']); !!}
            </div>
            <div class="col-md-5">
                {!! Form::number('limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
            </div>
        </div>

    </div>

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
        {!! Form::submit('Create User', ['class'=>'btn btn-block btn-success']); !!}
    </div>


    {!! Form::close() !!}


@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection


<!-- SCRIPT -->
@section('js')

    <script>

        // Check has_limit field
        $(document).on('click','#showHideLimits',function(){
            var e = document.getElementById("showHideLimits");
            var value = e.options[e.selectedIndex].value;

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
            $("#discounts").append('<div class="row" id="products"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-6"><select class="form-control" name="product[]" required><option value="">Choose Product</option><?php foreach($products as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-5"><input class="form-control" step="any" placeholder="0.01" name="discount[]" type="number"></div></div>');
        });

        //Append another div if button(limits) + is clicked
        $(document).on('click','#addBranch',function(){
            $("#limits").append('<div class="row" id="branches"><div class="col-md-1 text-center"><button type="button" class="btn btn-default btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-6"><select class="form-control" name="branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-5"><input class="form-control" step="any" placeholder="0.01" name="limit[]" type="number"></div></div>');
        });

        $(document).on('click','#removeProduct',function(){
            $(this).closest("#products").remove();
        });

        $(document).on('click','#removeBranch',function(){
            $(this).closest("#branches").remove();
        });



    </script>

@endsection



