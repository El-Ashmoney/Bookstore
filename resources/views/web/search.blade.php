<section class="py-3" style="background-color:#10203F;">
    <div class="container" id="topNav">
        <div class="row justify-content-between">
            <div class="col-auto">
                <a class="navbar-brand" href="/">
                    <img src="web/assets/img/logos/logo.png" width="141" alt="logo" />
                </a>
            </div>
            <div class="header-profile col-auto order-2 d-none d-sm-block">
                @if(Auth::user())
                    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'instructor')
                        <a class="nav-link" href="{{ route('profile.show') }}">
                            <i class="fa-solid fa-crown me-2" style="color:#fed42d"></i>{{ Auth::user()->name }}
                        </a>
                        <a class="nav-link" href="{{ route('bookstore_admin') }}" target="_blank">
                            <i class="zmdi zmdi-view-dashboard me-2" style="font-size: 20px"></i> Admin Dashboard
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('profile.show') }}">
                            <i class="fas fa-user text-info me-2"></i> {{ Auth::user()->name }}
                        </a>
                    @endif
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="icon-power me-2" style="font-weight: bold"></i> {{ __('Logout') }}
                            </a>
                        </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="zmdi zmdi-lock me-2"></i>{{ __('Login') }}
                    </a>
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="zmdi zmdi-account-circle me-2"></i>{{ __('Register') }}
                    </a>
                @endif
            </div>
            <div class="col-auto d-none d-lg-block">
                <div class="d-flex align-items-center">
                    <p class="mb-0 me-3 text-primary text-end fw-bolder lh-1 opacity-50">SEARCH <br />ANYTHING</p>
                    <form action="{{ route('books.search') }}" method="GET">
                        <div class="input-group d-flex flex-end-center">
                            <input class="form-control form-eduprixsearch-control rounded-pill" id="formGroupExampleInput" type="text" name="query" placeholder="Ex: Computer Science" />
                            <img class="input-box-icon" src="web/assets/img/illustrations/search.png" width="39" alt="" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
