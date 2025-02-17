<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="/admin-src/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="Logo">
                <use xlink:href="/admin-src/assets/brand/bde.png"></use>
            </svg></a>
        <!--<ul class="header-nav d-none d-md-flex">-->
        <!--    <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>-->
        <!--    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>-->
        <!--    <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>-->
        <!--</ul>-->
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md">
                        <img class="avatar-img"src="{{ asset('admin-src/assets/img/avatars/new.png') }}" alt="user@email.com">
                    </div>
                </a>
                
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <svg class="icon me-2">
                            <use xlink:href="/admin-src/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
    </div>
</header>
