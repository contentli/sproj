<nav class="navbar is-dark">
    <div class="container">
        <div class="navbar-brand">
            <div class="navbar-item">
                <a class="logo image" href="{{ route('home') }}">
                    <img src="../images/logo.png" alt="{{ config('app.name', 'Leetmark') }}">
                </a>
                <a class="brand-name">{{ config('app.name', 'Leetmark') }}</a>
            </div>


            <div class="navbar-item">
                <div class="dropdown is-hoverable mr-05">
                    <div class="dropdown-trigger">
                        <a href="{{ route('categories') }}" class="button is-text" aria-haspopup="true" aria-controls="category-dropdown-menu">
                            <span>Product categories</span>
                            <span class="icon">
                                <i class="mdi mdi-18px mdi-chevron-down" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                    <div class="dropdown-menu" id="category-dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            @foreach ($categories as $category)
                            @if($category->parent_id == null)
                                <a href="{{ route('category.show', $category->slug) }}" class="dropdown-item">{{ $category->name }}</a>
                            @endif
                            @endforeach

                            {{-- <div class="dropdown-item">
                                <p>You can insert <strong>any type of content</strong> within the dropdown menu.</p>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="dropdown-item">
                                <p>You simply need to use a <code>&lt;div&gt;</code> instead.</p>
                            </div>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                This is a link
                            </a> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="buttons">
                    <a href="{{ route('guides') }}" class="button is-light">
                        Guides
                    </a>
                    <a href="{{ route('tests') }}" class="button is-light">
                        Tests
                    </a>
                </div> --}}
            </div>

            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu">
            {{-- <div class="navbar-start"></div> --}}

            <div class="navbar-end">
                <div class="navbar-item">

                    <a href="{{ route('search') }}" class="button is-text mr-05" aria-label="Search the site">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-magnify" aria-hidden="true"></i>
                        </span>
                        {{-- <span class="is-sr-only">Search</span> --}}
                    </a>

                    @if (Auth::guest())

                    <a class="button is-text " href="{{ route('login') }}" aria-label="Login" rel="nofollow">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-account" aria-hidden="true"></i>
                        </span>
                    </a>

                    @else

                    <div class="dropdown is-hoverable is-right">
                        <div class="dropdown-trigger">
                            <a href="#" class="button is-dark" aria-haspopup="true" aria-controls="category-dropdown-menu">
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
</nav>
