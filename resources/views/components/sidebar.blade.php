<div class="sidebar">
    <h3 class="sidebar-title">SuperAdmin Panel</h3>
    <p class="sidebar-user">Username: {{ strtok(auth()->user()->name, ' ') }}</p>
    <p class="sidebar-role">Role: {{ strtoupper(auth()->user()->role) }}</p>
    <ul class="sidebar-menu">
        <li class="{{ request()->routeIs('superadmin.index') ? 'active' : '' }}">
            <a href="{{ route('superadmin.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="has-submenu {{ request()->routeIs('users.index') || request()->routeIs('users.admin') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="submenu-toggle"><i class="fas fa-users"></i> Users</a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">Pengguna</a>
                </li>
                <li class="{{ request()->routeIs('users.admin') ? 'active' : '' }}">
                    <a href="{{ route('users.admin') }}">Admin</a>
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="fas fa-database"></i> Master Data</a></li>
        <li class="{{ request()->routeIs('admin/superadmin/products') ? 'active' : '' }}">
            <a href="{{ route('admin/superadmin/products') }}"><i class="fas fa-box-open"></i> Product</a>
        </li>
        <li class="{{ request()->routeIs('articles.index') ? 'active' : '' }}">
            <a href="{{ route('articles.index') }}"><i class="fas fa-newspaper"></i> Articles</a>
        </li>
        <li><a href="#"><i class="fas fa-calendar-alt"></i> Jadwal Temu</a></li>
        <li><a href="#"><i class="fas fa-file-medical-alt"></i> ERM</a></li>
        <li><a href="#"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
        <li><a href="#"><i class="fas fa-chart-line"></i> Laporan</a></li>
        <li><a href="#"><i class="fas fa-key"></i> Ganti Password</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="sidebar-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </li>
    </ul>
</div>

<style>
    .sidebar {
        width: 250px;
        background-color: #2d3748;
        color: #ffffff;
        padding: 20px;
        box-sizing: border-box;
        position: fixed;
        height: 100%;
        font-family: 'Figtree', sans-serif;
        overflow-y: auto;
        scrollbar-width: none; /* For Firefox */
        -ms-overflow-style: none;  /* For Internet Explorer and Edge */
    }

    .sidebar::-webkit-scrollbar {
        display: none; /* For Chrome, Safari, and Opera */
    }

    .sidebar-title {
        margin: 0 0 20px 0;
        font-size: 1.5em;
        font-weight: bold;
    }

    .sidebar-user, .sidebar-role {
        margin: 0 0 10px 0;
        font-size: 0.9em;
        color: #cbd5e0;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
    }

    .sidebar-menu li {
        margin: 10px 0;
    }

    .sidebar-menu li a, .sidebar-menu li button {
        color: #ffffff;
        text-decoration: none;
        font-size: 1em;
        display: block;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s, color 0.3s;
    }

    .sidebar-menu li a i, .sidebar-menu li button i {
        margin-right: 10px;
    }

    .sidebar-menu li a:hover, .sidebar-menu li button:hover, .sidebar-menu li.active a {
        background-color: #4a5568;
        color: #e2e8f0;
    }

    .sidebar-menu li button {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s, color 0.3s;
    }

    .sidebar-menu li button:hover {
        background-color: #4a5568;
        color: #e2e8f0;
    }

    .sidebar-menu li.active button {
        background-color: #4a5568;
        color: #e2e8f0;
    }

    .logout-form {
        margin: 0;
    }

    .has-submenu .submenu {
        display: none;
        padding-left: 20px;
    }

    .has-submenu.open .submenu {
        display: block;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toggles = document.querySelectorAll('.submenu-toggle');
        toggles.forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                var parent = this.parentElement;
                parent.classList.toggle('open');
            });
        });
    });
</script>
