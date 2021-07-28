@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle"
                    src="{{ (asset('/images/company/'.$company->images)) ? (asset('/images/company/'.$company->images)) : (asset('/images/company/fs-icon_1610107943.ico')) }}"
                    alt="User profile picture">

                <h3 class="profile-username text-center">{{ $company->name}}</h3>

                <p class="text-muted text-center">{{ $company->city }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.phone') }}</b> <a
                            class="pull-right">{{ $company->tel_number }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.email') }}</b> <a class="pull-right">{{ $company->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.address') }}</b> <a
                            class="pull-right">{{ $company->address }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.country') }}</b> <a
                            class="pull-right">{{ $company->country }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.fis_number') }}</b> <a
                            class="pull-right">{{ $company->fis_number }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.contact_person') }}</b> <a
                            class="pull-right">{{ $company->contact_person }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.settings_details.starting_balance') }}</b> <a
                            class="pull-right">{{ $company->starting_balance }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.tax_number') }}</b> <a
                            class="pull-right">{{ $company->tax_number }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans('adminlte::adminlte.res_number') }}</b> <a
                            class="pull-right">{{ $company->res_number }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Failed Attempts</b> <a href="{{ url('/failed-attempts') }}" class="pull-right">
                            <span class="label label-primary"> VIEW </span></a>
                    </li>
                    <li class="list-group-item">
                        <b>Tracking Commands</b> <a href="{{ url('/tracking_command') }}" class="pull-right">
                            <span class="label label-primary"> VIEW </span></a>
                    </li>
                    <li class="list-group-item">
                        <b>Test Email</b> <a href="{{ url('/test/email') }}" class="pull-right">
                            <span class="label label-primary"> TEST </span></a>
                    </li>
                </ul>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">{{ trans('adminlte::adminlte.settings') }}</a>
                </li>
                <li><a href="#running_process"
                        data-toggle="tab">{{ trans('adminlte::adminlte.settings_details.running_process') }}</a></li>
                <li><a href="#api" data-toggle="tab">{{ trans('adminlte::adminlte.api') }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    {!! Form::model($company,['method'=>'PATCH',
                    'action'=>['SettingsController@update',$company->id],'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', trans('adminlte::adminlte.name')); !!}
                                {!! Form::text('name',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('fis_number', trans('adminlte::adminlte.fis_number')); !!}
                                {!! Form::text('fis_number',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('bis_number', trans('adminlte::adminlte.bis_number')); !!}
                                {!! Form::text('bis_number',null,['class'=>'form-control']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('tax_number', trans('adminlte::adminlte.tax_number')); !!}
                                {!! Form::text('tax_number',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('contact_person', trans('adminlte::adminlte.contact_person')); !!}
                                {!! Form::text('contact_person',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('printer_id', trans('adminlte::adminlte.settings_details.printer_ip'));
                                !!}
                                {!! Form::text('printer_id',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group ">
                                <label for="print">{{ trans('adminlte::adminlte.settings_details.print_transaction') }}
                                </label>
                                <div class="input-radio">
                                    <input type="radio" name="print_transaction" value="1" @if (isset($company) &&
                                        $company->print_transaction == 1) checked @endif> Yes &nbsp;
                                    <input type="radio" name="print_transaction" value="0" @if (isset($company) &&
                                        $company->print_transaction == 0) checked @endif> No<br>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="print">{{ trans('adminlte::adminlte.settings_details.hide_views') }}
                                </label>
                                <div class="input-radio">
                                    <input type="radio" name="direct_login" value="1" @if (isset($company) &&
                                        $company->direct_login == 1) checked @endif> Yes &nbsp;
                                    <input type="radio" name="direct_login" value="0" @if (isset($company) &&
                                        $company->direct_login == 0) checked @endif> No<br>
                                </div>
                            </div>

                            <div class="form-group" id="show_transaction_time_div" @if (isset($company) && $company->
                                show_transaction == 0) style="display:none;" @endif>
                                {!! Form::label('show_transaction_time',
                                trans('adminlte::adminlte.settings_details.transactions_date')); !!}
                                {!!
                                Form::select('show_transaction_time',$time,$company->show_transaction_time,['class'=>'form-control']);
                                !!}
                            </div>



                            <div class="form-group">
                                {!! Form::label('photo', trans('adminlte::adminlte.photo')); !!}
                                @if (asset('/images/company/'.$company->images))
                                <br>
                                <img class="img-responsive img-thumbnail"
                                    src="{{asset('/images/company/'.$company->images)}}" height="100" width="100">
                                @else
                                <p>No image found</p>
                                @endif
                                {!! Form::file('image',['class'=>'form-control']); !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('res_number', trans('adminlte::adminlte.res_number')); !!}
                                {!! Form::text('res_number',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('tel_number', trans('adminlte::adminlte.phone')); !!}
                                {!! Form::text('tel_number',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', trans('adminlte::adminlte.email')); !!}
                                {!! Form::text('email',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('address', trans('adminlte::adminlte.address')); !!}
                                {!! Form::text('address',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('city', trans('adminlte::adminlte.city')); !!}
                                {!! Form::text('city',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('country', trans('adminlte::adminlte.country')); !!}
                                {!! Form::text('country',null,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('transaction_location',
                                trans('adminlte::adminlte.settings_details.transaction_file_location')); !!}
                                {!!
                                Form::text('transaction_location',null,['class'=>'form-control','placeholder'=>'Example:
                                D:\FuelSystem']); !!}
                            </div>

                            <div class="form-group ">
                                <label for="print">{{ trans('adminlte::adminlte.settings_details.show_transactions_if_loggedin')}} </label>
                                <div class="input-radio">
                                    <input type="radio" name="show_transaction" id="show_transaction_yes" value="1" @if(isset($company) && $company->show_transaction == 1) checked @endif> Yes &nbsp;
                                    <input type="radio" name="show_transaction" id="show_transaction_no" value="0" @if(isset($company) && $company->show_transaction == 0) checked @endif> No<br>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fas fa-save"></i> {{ trans('adminlte::adminlte.save') }}
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>

                <div class="tab-pane" id="running_process">
                    @include('admin.settings.running_process')
                </div>

                <div class="tab-pane" id="api">
                    <li class="list-group-item">
                        <b>Export RFID</b> <a href="{{ url('/api/rfids') }}" class="pull-right">
                            <span class="label label-primary"> EXPORT </span></a>
                    </li>
                    <li class="list-group-item">
                        <b>Export Transactions</b> <a href="{{ url('/api/transactions') }}" class="pull-right">
                            <span class="label label-primary"> EXPORT </span></a>
                    </li>
                    <li class="list-group-item">
                        <b>Export Companies</b> <a href="{{ url('/api/companies') }}" class="pull-right">
                            <span class="label label-primary"> EXPORT </span></a>
                    </li>
                    <li class="list-group-item">
                        <b>Export Payments</b> <a href="{{ url('/api/payments') }}" class="pull-right">
                            <span class="label label-primary"> EXPORT </span></a>
                    </li>
                    <li class="list-group-item">
                        <b>Import RFID</b> <a href="{{ url('/api/rfids/import') }}" class="pull-right">
                            <span class="label label-primary"> IMPORT </span></a>
                    </li>
                </div>

            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
    $(document).on('click', function () {
        if (document.getElementById('show_transaction_yes').checked) {
            document.getElementById("show_transaction_time_div").style.display = "block";
        } else if (document.getElementById('show_transaction_no').checked) {
            $("#show_transaction_time").val('0');
            document.getElementById("show_transaction_time_div").style.display = "none";
        }
    });

    $(document).ready(function () {
        setInterval(function () {
            $('.running_process').load('{{ url(' / get_refresh_time ')}}').fadeIn('slow');
        }, 10000)
    });

    $(document).on('click', '#delete_process', function (e) {
        var id = this.getAttribute('data-id');

        swal({
                title: "A dëshironi të vazhdoni?",
                icon: "warning",
                buttons: true,
                dangerMode: false,
                buttons: ['Jo', 'Po']
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "GET",
                        data: {
                            id: id
                        },
                        url: "{{ URL('/delete_process')}}",
                        dataType: 'JSON',
                        beforeSend: function () {
                            window.swal({
                                title: "Ju lutem prisni!",
                                icon: "info",
                                text: "Të dhënat janë duke u fshirë",
                                buttons: false,
                            });
                        },
                        success: function (e) {
                            if (e == 'success') {
                                $("#table_data").empty();
                                swal("Sukses", "Të dhënat janë fshirë me sukses", "success")
                            } else {
                                swal("Gabim", "Ndodhi një gabim.", "error")
                            }
                        }
                    });
                } else {
                    swal("Kërkesa është anuluar.");
                }
            });
    });

</script>

@endsection
