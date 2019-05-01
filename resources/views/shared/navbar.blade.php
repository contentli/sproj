<nav class="navbar is-primary has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('home') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">

                <div class="navbar-item">
                    <div class="dropdown is-hoverable">
                        <div class="dropdown-trigger">
                            <a href="{{ route('categories') }}" class="button is-primary" aria-haspopup="true" aria-controls="category-dropdown-menu">
                                <span>Product categories</span>
                                <span class="icon">
                                    <i class="mdi mdi-18px mdi-chevron-down" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                        <div class="dropdown-menu" id="category-dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-item">
                                    <p>You can insert <strong>any type of content</strong> within the dropdown menu.</p>
                                </div>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item">
                                    <p>You simply need to use a <code>&lt;div&gt;</code> instead.</p>
                                </div>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    This is a link
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="buttons">
                        <a href="{{ route('guides') }}" class="button is-primary">
                            Guides
                        </a>
                        <a href="{{ route('tests') }}" class="button is-primary">
                            Tests
                        </a>
                    </div>
                </div>

            </div>

            <div class="navbar-end">
                <div class="navbar-item">

                    <a class="button is-primary">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-magnify" aria-hidden="true"></i>
                        </span>
                        {{-- <span class="is-sr-only">Search</span> --}}
                    </a>

                    @if (Auth::guest())

                    <a class="button is-primary " href="{{ route('login') }}">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-account" aria-hidden="true"></i>
                        </span>
                    </a>

                    @else

                    <div class="dropdown is-hoverable">
                        <div class="dropdown-trigger">
                            <a href="#" class="button is-primary" aria-haspopup="true" aria-controls="category-dropdown-menu">
                                <span>{{ Auth::user()->name }}</span>
                                <span class="icon">
                                    <i class="mdi mdi-18px mdi-chevron-down" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                        <div class="dropdown-menu" id="category-dropdown-menu" role="menu">
                            <div class="dropdown-content">

                                <a href="{{ route('dashboard') }}" class="dropdown-item">
                                    Dashboard
                                </a>

                                <hr class="dropdown-divider">
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </div>
                    </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
</nav>
