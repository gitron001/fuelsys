<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="{{ trans('adminlte::adminlte.search') }}"
    value="{{ !empty(request()->get('search')) ? request()->get('search') : '' }}"/>
    <span class="input-group-btn">
        <button class="btn btn-primary" type="submit" data-toggle="tooltip" title="{{ trans('adminlte::adminlte.search') }}">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
