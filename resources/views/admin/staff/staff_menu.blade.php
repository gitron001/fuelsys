@php $url = substr(strrchr(Request::fullUrl(), '?'),0); @endphp
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li @if(Request::path() == 'admin/staff') class="active" @endif><a href="{{ URL::to('/admin/staff'.$url) }}">{{ trans('adminlte::adminlte.shift') }}</a></li>
      <li @if(Request::path() == 'admin/staff/dispensers') class="active" @endif><a href="{{ URL::to('/admin/staff/dispensers'.$url) }}">{{ trans('adminlte::adminlte.staff_details.totalizers') }}</a></li>
      <li @if(Request::path() == 'admin/staff/products') class="active" @endif><a href="{{ URL::to('/admin/staff/products'.$url) }}">{{ trans('adminlte::adminlte.products') }}</a></li>
      <li @if(Request::path() == 'admin/staff/companies') class="active" @endif><a href="{{ URL::to('/admin/staff/companies'.$url) }}">{{ trans('adminlte::adminlte.companies') }}</a></li>
      <li @if(Request::path() == 'admin/staff/payments') class="active" @endif><a href="{{ URL::to('/admin/staff/payments'.$url) }}">{{ trans('adminlte::adminlte.payments') }}</a></li>
      <li @if(Request::path() == 'admin/staff/expenses') class="active" @endif><a href="{{ URL::to('/admin/staff/expenses'.$url) }}">{{ trans('adminlte::adminlte.expenses') }}</a></li>
      <li @if(Request::path() == 'admin/staff/stock') class="active" @endif><a href="{{ URL::to('/admin/staff/stock'.$url) }}">{{ trans('adminlte::adminlte.stock') }}</a></li>
      <li @if(Request::path() == 'admin/staff/products-daily') class="active" @endif><a href="{{ URL::to('/admin/staff/products-daily'.$url) }}">{{ trans('adminlte::adminlte.products_daily') }}</a></li>
    </ul>
    <br>
    <form class="form-inline text-center" method="GET" action="{{ URL::to(Request::path()) }}" role="form">
        <div class="box-body">
            <div class="form-group date_range_js" @if(request()->get("search_type") != 'date_range') style="display: none;" @endif>
                <label for="Start Date:">{{ trans('adminlte::adminlte.start_date') }}:</label>
                <input class="form-control" autocomplete="off" id="datetimepicker4" type="text" name="fromDate"
                    value="{{ date('m/d/Y H:i', request()->get('fromDate')) }}">
            </div>

            <div class="form-group date_range_js"  @if(request()->get("search_type") != 'date_range') style="display: none;" @endif>
                <label for="End Date:">{{ trans('adminlte::adminlte.end_date') }}:</label>
                <input class="form-control" autocomplete="off" id="datetimepicker5" type="text" name="toDate"
                value="{{ date('m/d/Y H:i', request()->get('toDate')) }}">
            </div>

            <div class="form-group shift_range_js" @if(request()->get("search_type") == 'date_range') style="display: none;" @endif>
                <label for="Shift:">{{ trans('adminlte::adminlte.shift') }}</label>
                <select class="form-control shift_range_reset" name="shift" id="shift">
                    <option value="">Select shift</option>
                    @foreach($shift as $shift)
                        <option value="{{ $shift->id }}" @if($shift->id == request()->get("shift")) selected @endif>
                            {{ date('m/d/Y H:i:s', $shift->start_date) }} -
                            @if($shift->end_date == NULL)
                               NOW
                            @else
                                {{ date('m/d/Y H:i:s', $shift->end_date) }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" id="search" title="Search"><i class="fa fa-search"></i> Search</button>
            </div>
			@if (Request::path() == 'admin/staff')
                <button type="button" data-toggle="tooltip" class="btn btn-success" id="export_excel_staff_view" title="Export Excel"><i class="fas fa-file-excel"></i> Excel</button>
                <button type="button" data-toggle="tooltip" class="btn btn-info" id="send_shift_email" title="Send shift in email"><i class="fa fa-envelope"></i> Send Email</button>
			@endif
            <a href="{{ route('generate_staff_pdf/pdf', ['search_type' => request()->get("search_type"), 'fromDate' => date('m/d/Y H:i', request()->get("fromDate")),'toDate' => date('m/d/Y H:i',request()->get("toDate")),'shift' => request()->get("shift"),'url'=> request()->segment(count(request()->segments()))
                ] ) }}" target="_blank" data-toggle="tooltip" class="btn btn-warning" title="Export PDF"><i class="fas fa-file-pdf"></i> PDF</a>
            <button type="button" data-toggle="tooltip" class="btn btn-danger" id="close_shift" title="Close Shift"><i class="fas fa-exclamation-triangle"></i> Close Shift</button>
            <div class="btn-group" role="group">
              <input type="radio" name="search_type" class="btn btn-secondary search_type_js" value="shifts" @if(request()->get("search_type") != 'date_range') checked @endif >{{ trans('adminlte::adminlte.shift') }}<br>
              <input type="radio" name="search_type" class="btn btn-secondary search_type_js" value="date_range" @if(request()->get("search_type") == 'date_range') checked @endif> {{ trans('adminlte::adminlte.staff_details.date_range') }}
            </div>
        </div>
    </form>
    <br>
</div>
