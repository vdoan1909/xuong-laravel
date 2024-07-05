<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span>Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link">
                    <i class="ri-dashboard-2-line"></i> <span>Dashboards</span>
                </a>
            </li>

            @foreach ($menuItems as $menuItem)
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#{{ $menuItem['id'] }}" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="{{ $menuItem['id'] }}">
                        <i class="{{ $menuItem['icon'] }}"></i> <span>{{ $menuItem['name'] }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="{{ $menuItem['id'] }}">
                        <ul class="nav nav-sm flex-column">
                            @if (isset($menuItem['data']))
                                @foreach ($menuItem['data'] as $parent)
                                    @include('admin.catalogue.nested-catalogue', ['catalogue' => $parent])
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
