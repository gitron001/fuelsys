<li class="header">MAIN NAVIGATION</li>

@if(Auth::check() && Auth::user()->type == 3)

    <li class="{{ request()->is('/') ? 'active' : '' }}">
        <a href="{{ URL('/') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.home') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/companies') }}">
            <i class="fa fa-building" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.company') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/tanks') || request()->is('admin/tanks/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/tanks') }}">
            <i class="fa fas fa-gas-pump" ></i>
            <span>{{ trans('adminlte::adminlte.tank') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/transactions') }}">
            <i class="fa fas fa-exchange-alt" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.transaction') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/products') }}">
            <i class="fa fa-align-justify" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.products') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/products_group') || request()->is('admin/products_group/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/products_group') }}">
            <i class="fa fa-th-large" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.products_group') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/dispanesers') || request()->is('admin/dispanesers/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/dispanesers') }}">
            <i class="fa fas fa-gas-pump" ></i>
            <span>{{ trans('adminlte::adminlte.dispanesers') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/branches') || request()->is('admin/branches/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/branches') }}">
            <i class="fa fa-university" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.branches') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/users') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.users') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/payments') || request()->is('admin/payments/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/payments') }}">
            <i class="fas fa-euro-sign"></i>
            <span>{{ trans('adminlte::adminlte.payments') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/pfc') || request()->is('admin/pfc/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/pfc') }}">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.pfc') }}</span>
        </a>
    </li>

    <!--<li class="{{ request()->is('admin/reports') || request()->is('admin/reports/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/reports') }}">
            <i class="fas fa-chart-bar"></i>
            <span>{{ trans('adminlte::adminlte.report') }}</span>
        </a>
    </li>-->

    <li class="{{ request()->is('admin/stock') || request()->is('admin/stock/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/stock') }}">
            <i class="fa fa-database" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.stock') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/pumps') || request()->is('admin/pumps/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/pumps') }}">
            <i class="fa fa-tint" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.pumps') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/staff') || request()->is('admin/staff/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/staff') }}">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.staff') }}</span>
        </a>
    </li>

    <li class="header">Settings</li>

    <li class="{{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/settings') }}">
            <i class="fa fa-cog" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.settings') }}</span>
        </a>
    </li>


@elseif(Auth::check() && Auth::user()->type == 5)

    <li class="{{ request()->is('/') ? 'active' : '' }}">
        <a href="{{ URL('/') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.home') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/transactions') }}">
            <i class="fa fas fa-exchange-alt" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.transaction') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/payments') || request()->is('admin/payments/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/payments') }}">
            <i class="fas fa-euro-sign"></i>
            <span>{{ trans('adminlte::adminlte.payments') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/reports') || request()->is('admin/reports/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/reports') }}">
            <i class="fas fa-chart-bar"></i>
            <span>{{ trans('adminlte::adminlte.report') }}</span>
        </a>
    </li>

@else

    <li class="{{ request()->is('/') ? 'active' : '' }}">
        <a href="{{ URL('/') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.home') }}</span>
        </a>
    </li>

    <li class="{{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
        <a href="{{ URL('admin/transactions') }}">
            <i class="fa fas fa-exchange-alt" aria-hidden="true"></i>
            <span>{{ trans('adminlte::adminlte.transaction') }}</span>
        </a>
    </li>

@endif


