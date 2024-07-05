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

            <li class="nav-item">
                <a class="nav-link menu-link" href="#catalogue" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="catalogue">
                    <i class="ri-book-fill"></i> <span>Catalogue</span>
                </a>
                <div class="collapse menu-dropdown" id="catalogue">
                    <ul class="nav nav-sm flex-column">
                        @foreach ($data as $parent)
                            @include('admin.catalogue.nested-catalogue', ['catalogue' => $parent])
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>