<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar" action="{{ route('books.search') }}" method="GET">
                    <input type="text" class="form-control" placeholder="Enter keywords" name="query">
                    <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                    <i class="fa-solid fa-envelope"></i>
                </a>
            </li>
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                    <i class="fa-solid fa-bell"></i>
                </a>
            </li>
            <li class="nav-item language">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                    <i class="fa-solid fa-flag"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
                    <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
                    <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
                    <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="{{ route('profile.show') }}" target="_blank">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                                    <p class="user-subtitle">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item">

                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="icon-power mr-2"></i> {{ __('Logout') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
