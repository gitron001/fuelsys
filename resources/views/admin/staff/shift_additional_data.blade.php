<form id="shift_additonal_data_form" method="post" action="{{ route('save.save_additional_data') }}">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new expenses</h3>
                </div>
                @csrf
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::select('expense_user_id[]',['' => 'Select a User'] +
                            $users,null,['class'=> 'selectpicker form-control','data-live-search' => 'true','data-style'=>'btn-dropdownSelectNew']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::select('expense_categories[]',['' => 'Select a Type'] +
                            $categories,null,['class'=> 'selectpicker form-control','data-live-search' => 'true','data-style'=>'btn-dropdownSelectNew']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!!
                            Form::number('expense_amount[]',null,['class'=>'form-control','step'=>'any','placeholder'=>'Amount']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::textarea('expense_description[]',null,['class'=>'form-control','rows' =>
                            1,'placeholder'=>'Description']); !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-success btn-circle pull-right add_expense"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group" id="add_expenses"></div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new payment</h3>
                </div>
                @csrf
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::select('payment_user_id[]',['' => 'Select a User'] +
                            $users,null,['class'=> 'selectpicker form-control','data-live-search' => 'true','data-style'=>'btn-dropdownSelectNew']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::select('payment_categories[]',['' => 'Select a Type'] +
                            $categories,null,['class'=> 'selectpicker form-control','data-live-search' => 'true','data-style'=>'btn-dropdownSelectNew']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!!
                            Form::number('payment_amount[]',null,['class'=>'form-control','step'=>'any','placeholder'=>'Amount']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-success btn-circle pull-right add_payment"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group" id="add_payments"></div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new bank</h3>
                </div>
                @csrf
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::select('bank_id[]',['' => 'Select a Bank'] +
                            $banks,null,['class'=>'form-control','id'=>'userDropdown','data-live-search'=>'true','data-style'=>'btn-dropdownSelectNew']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!!
                            Form::number('bank_amount[]',null,['class'=>'form-control','step'=>'any','placeholder'=>'Amount']);
                            !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-success btn-circle pull-right add_bank"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group" id="add_banks"></div>
            </div>
        </div>
    </div>
</form>


@include('includes/footer')
