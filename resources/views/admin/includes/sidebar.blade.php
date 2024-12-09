<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <a href="{{ route('admin.projects.index') }}">
            <img class="my-4" src="/img/logo.png" alt="" style="max-height:50px;">
        </a>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-group">

            <a class="nav-link" href="{{ route('admin.projects.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="/admin-src/vendors/@coreui/icons/svg/free.svg#cil-diamond"></use>
                </svg> Projects
            </a>

            <a class="nav-link" href="{{ route('admin.about.edit') }}">
                <svg class="nav-icon">
                    <use xlink:href="/admin-src/vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg> About Us
            </a>

            <a class="nav-link" href="{{ route('admin.settings.edit') }}">
                <svg class="nav-icon">
                    <use xlink:href="/admin-src/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg> Settings
            </a>
        </li>
    </ul>
</div>
