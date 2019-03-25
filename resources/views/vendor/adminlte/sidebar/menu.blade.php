<li class="header">MAIN NAVIGATION</li>

@if(Auth::check() && Auth::user()->type == 3)

    <li>
        <a href="{{ URL('/') }}"">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.home') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/companies') }}">
            <i class="fa fa-building" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.company') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/tanks') }}"">
            <i class="fa fas fa-gas-pump" ></i>
            <span>{{ trans('adminlte::adminlte.tank') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/transactions') }}"">
            <i class="fa fas fa-exchange-alt" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.transaction') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/products') }}">
            <i class="fa fa-align-justify" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.products') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/dispanesers') }}"">
            <i class="fa fas fa-gas-pump" ></i>
            <span>{{ trans('adminlte::adminlte.dispanesers') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/branches') }}"">
            <i class="fa fa-university" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.branches') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/users') }}"">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.users') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/payments') }}"">
            <i class="fa fa-eur" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.payments') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/pfc') }}"">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.pfc') }}</span>
        </a>
    </li>

    <li class="header">Settings</li>

    <li>
        <a href="{{ URL('admin/settings') }}"">
            <i class="fa fa-cog" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.settings') }}</span>
        </a>
    </li>
    
@else

    <li>
        <a href="{{ URL('/') }}"">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.home') }}</span>
        </a>
    </li>

    <li>
        <a href="{{ URL('admin/transactions') }}"">
            <i class="fa fas fa-exchange-alt" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.transaction') }}</span>
        </a>
    </li>

@endif


