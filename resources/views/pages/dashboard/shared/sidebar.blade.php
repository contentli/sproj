
<nav class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('dashboard') }}" {!! Request::is('dashboard') ? 'class="is-active"' : '' !!}>
                Dashboard
            </a>
        </li>
    </ul>

    <p class="menu-label">
        Content
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('dashboard.products') }}" {!! Request::is('dashboard/products*') ? 'class="is-active"' : '' !!}>
                Products
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.categories') }}" {!! Request::is('dashboard/categories*') ? 'class="is-active"' : '' !!}>
                Categories
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.brands') }}" {!! Request::is('dashboard/brands*') ? 'class="is-active"' : '' !!}>
                Brands
            </a>
        </li>
    </ul>

    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li><a>Team Settings</a></li>
        <li>
            <a>Manage Your Team</a>
            <ul>
                <li><a>Members</a></li>
                <li><a>Plugins</a></li>
                <li><a>Add a member</a></li>
            </ul>
        </li>
        <li><a>Invitations</a></li>
        <li><a>Cloud Storage Environment Settings</a></li>
        <li><a>Authentication</a></li>
    </ul>

    <p class="menu-label">
        Transactions
    </p>
    <ul class="menu-list">
        <li><a>Payments</a></li>
        <li><a>Transfers</a></li>
        <li><a>Balance</a></li>
    </ul>
</nav>

