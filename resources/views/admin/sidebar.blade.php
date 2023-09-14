<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{ Route('bookstore_admin') }}">
            <img src="admin/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Bookstore Admin</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
            <a href="{{ Route('bookstore_admin') }}">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ Route('books') }}">
                <i class="fa-solid fa-book" style="margin-right: 10px"></i> <span>Books</span>
            </a>
        </li>
        <li>
            <a href="{{ Route('categories') }}">
                <i class="zmdi zmdi-format-list-bulleted"></i> <span>Categories</span>
            </a>
        </li>
        <li>
            @if(Auth::user()->role === 'admin')
                <a href="{{ Route('users') }}">
                    <i class="fa-solid fa-users" style="margin-right: 10px"></i> <span>Users</span>
                    <small class="badge float-right badge-light">New</small>
                </a>
            @endif
        </li>
        <li class="sidebar-header">LABELS</li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>
    </ul>
</div>
