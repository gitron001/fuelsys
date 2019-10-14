@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="box box-primary">
    <div class="box-header with-border">
		<h3 class="box-title">{{!isset($user) ? 'Create new user' : 'Edit user'}}</h3>
	</div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
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

                <div class="form-group {{ $errors->has('surname') ? 'has-error' :'' }}">
                    {!! Form::label('surname', 'Surname:'); !!}
                    {!! Form::text('surname',null,['class'=>'form-control']); !!}
                    {!! $errors->first('surname','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
                    {!! Form::label('status', 'Status:'); !!}
                    {!! Form::select('status',[1=>'Active',2=>'No Active'],null,['class'=>'form-control']); !!}
                    {!! $errors->first('status','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
                    {!! Form::label('type', 'Type:'); !!}
                    {!! Form::select('type',['' => 'Select', 1 => 'Staff',2=> 'Company',3=> 'Administrator',4=>'Client',5=>'Manager',6=>'Bonus Member',7=>'Bonus Klient',8=>'Bonus Korporate'],null,['class'=>'form-control', 'id' => 'showHide']); !!}
                    {!! $errors->first('type','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('starting_balance') ? 'has-error' :'' }}" id="starting_balance" style="display: none">
                    {!! Form::label('starting_balance', 'Starting Balance:'); !!}
                    {!! Form::number('starting_balance',null,['class'=>'form-control']); !!}
                    {!! $errors->first('starting_balance','<span class="help-block">:message</span>') !!}
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

                <div class="form-group {{ $errors->has('business_type') ? 'has-error' :'' }}">
                    {!! Form::label('business_type', 'Business Type:'); !!}
                    {!! Form::text('business_type',null,['class'=>'form-control']); !!}
                    {!! $errors->first('business_type','<span class="help-block">:message</span>') !!}
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                    {!! Form::label('email', 'Email:'); !!}
                    {!! Form::text('email',null,['class'=>'form-control']); !!}
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                    {!! Form::label('password', 'Password:'); !!}
                    {!! Form::password('password',['class'=>'form-control','autocomplete'=>'new-password']); !!}
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('contact_number') ? 'has-error' :'' }}">
                    {!! Form::label('contact_number', 'Contact Number:'); !!}
                    {!! Form::text('contact_number',null,['class'=>'form-control']); !!}
                    {!! $errors->first('contact_number','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('application_date') ? 'has-error' :'' }}">
                    {!! Form::label('application_date', 'Application Date:'); !!}
                    {!! Form::text('application_date',null,['class'=>'form-control','autocomplete'=>'off','id'=>'datetimepicker']); !!}
                    {!! $errors->first('application_date','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('residence') ? 'has-error' :'' }}">
                    {!! Form::label('residence', 'Residence:'); !!}
                    {!! Form::text('residence',null,['class'=>'form-control']); !!}
                    {!! $errors->first('residence','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('has_limit') ? 'has-error' :'' }}">
                    {!! Form::label('has_limit', 'Has Limit:'); !!}
                    {!! Form::select('has_limit',[0=>'No',1=>'Yes',],null,['class'=>'form-control','id'=>'showHideLimits']); !!}
                    {!! $errors->first('status','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('company_id') ? 'has-error' :'' }}" id="company" style="display: none">
                    {!! Form::label('company_id', 'Company:'); !!}

                    <select name="company_id" class="form-control">
						<option value="">Choose Company</option>
						@foreach($companies as $company)
							<option value="{{ $company->id }}" <?php if(isset($user)){if($user->company_id == $company->id){ echo 'selected'; }} ?>>{{ $company->name }}</option>
						@endforeach
					</select>
                    {!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('limits') ? 'has-error' :'' }}" id="has_limits" style="display: none">
                    {!! Form::label('limits', 'Limit:'); !!}
                    {!! Form::number('limits',null,['class'=>'form-control']); !!}
                    {!! $errors->first('limits','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('vehicle') ? 'has-error' :'' }}" id="vehicle" style="display: none">
                    {!! Form::label('vehicle', 'Vehicle:'); !!}
                    {!! Form::text('vehicle',null,['class'=>'form-control']); !!}
                    {!! $errors->first('vehicle','<span class="help-block">:message</span>') !!}
                </div>

            </div>
        </div>

        @if(!isset($user))

		<div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="discounts">
            {!! Form::label('discounts', 'Discounts:'); !!}

            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div class="col-md-5">
                    <select name="product[]" class="form-control">
						<option value="">Choose Product</option>
						@foreach($products as $pr)
							<option value="{{ $pr->pfc_pr_id }}">{{ $pr->name }}</option>
						@endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    {!! Form::number('discount[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
                </div>
            </div>
        </div>
		<!--
        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
            {!! Form::label('limits', 'Limits:'); !!}

            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div class="col-md-5">
					<select name="branch[]" class="form-control">
						@foreach($branches as $branch)
							<option value="{{{-- $branch->id --}}}">{{{-- $branch->name --}}}</option>
						@endforeach
					</select>
                </div>
                <div class="col-md-6">
                    {!! Form::number('limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
                </div>
            </div>
            <br>
        </div>
		-->
        @else
        <!-- *** DISCOUNT *** -->
        {!! Form::label('discount', 'Discounts'); !!}
        <div class="form-group"  id="discounts">
        @if(count($rfid_discounts) > 0)

			@foreach($rfid_discounts as $rfid_discount)
                <div class="row" id="discount" style="margin-top: 10px;">
                    <input type="hidden" name="hidden_input_product[]" value="{{$rfid_discount->id}}">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-circle deleteDiscount"><i class="glyphicon glyphicon-minus"></i><input type="hidden" name ="deleteDiscount[]" value="{{$rfid_discount->id}}"></button>
                    </div>
                    <div class="col-md-5">
                        <select name="product[]" class="form-control">
							<option value="">Choose Product</option>
                            @foreach($products as $pr)
                                <option value="{{ $pr->pfc_pr_id }}" {{$rfid_discount->product_id == $pr->pfc_pr_id  ? 'selected' : ''}}>{{ $pr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('discount[]',$rfid_discount->discount,['class'=>'form-control','step'=>'any']); !!}
                    </div>
                </div>
			@endforeach
        @endif
		</div>
        <!-- *** END DISCOUNT *** -->

        <!-- *** NEW DISCOUNT *** -->

        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}">
        <div class="row">
            <div class="col-md-1">
                <button type="button" class="btn btn-success btn-circle" id="addProduct"><i class="glyphicon glyphicon-plus"></i> Add discount</button>
            </div>
        </div>
        <br>
        </div>

        <!-- *** END NEW LIMITS *** -->

        <!-- *** LIMITS *** -->
		<!--
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
                            @foreach($branches as $branch)
                                <option value="{{{-- $branch->id --}}}" {{{-- $rfid_limit->branch_id == $branch->id  ? 'selected' : ''--}}}>{{{--} $branch->name --}}}</option>
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
		-->
        <!-- *** END LIMITS *** -->

        <!-- *** NEW LIMITS *** -->
		<!--
        <div class="form-group {{ $errors->has('ffid') ? 'has-error' :'' }}" id="addlimits">
        @if(count($rfid_limits) == 0)
            {!! Form::label('limits', 'New Limits:'); !!}
        @endif

        <div class="row">
            <div class="col-md-1">
                <button type="button" class="btn btn-success btn-circle" id="addBranch"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="col-md-5">
				<select name="branch[]" class="form-control">
					@foreach($branches as $branch)
						<option value="{{{-- $branch->id --}}}" {{{-- $rfid_limit->branch_id == $branch->id  ? 'selected' : '' --}}}>{{{-- $branch->name --}}}</option>
					@endforeach
				</select>
            </div>
            <div class="col-md-6">
                {!! Form::number('new_limit[]',null,['class'=>'form-control','placeholder'=>'0.01','step'=>'any']); !!}
            </div>
        </div>
        <br>
-->
        </div>
        @endif

    <div class="box-footer">
		<button type="submit" class="btn btn-primary">
			<i class="fas fa-save"></i> Save
		</button>
		<a href="{{ URL::previous() }}" class="btn btn-danger pull-right"> Cancel </a>
	</div>

</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
    $(document).ready(function(){
        var e = document.getElementById("showHide");
        var value = e.options[e.selectedIndex].value;

        if(value == 2){
            $("#company").show();
            $("#one_time_limit").show();
            $("#plates").show();
            $("#vehicle").show();
        }

    });

    var dateNow = new Date();
      $('#datetimepicker').datepicker({
          defaultDate:dateNow
      });
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
        $("#discounts").append('<div class="row" id="products" style="margin-top: 10px;"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="product[]" required><option value="">Choose Product</option><?php foreach($products as $pr){ ?><?php echo "<option value=".$pr->pfc_pr_id.">$pr->name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="discount[]" type="number" required></div></div>');
    });

    //Append another div if button(limits) + is clicked
    $(document).on('click','#addBranch',function(){
        $("#addlimits").append('<div class="row" id="branches"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_limit[]" type="number" required></div></div><br>');
    });

    $(document).on('click','.deleteDiscount',function(){
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
