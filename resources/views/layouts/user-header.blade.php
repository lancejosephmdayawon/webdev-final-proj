@php
// Define the current route to determine active links
$currentRoute = request()->route() ? request()->route()->getName() : '';
use Illuminate\Support\Str;
@endphp

<style>
    :root {
        --color-maroon: #800000;
        --color-yellow: #FFDF00;
        --color-light-maroon: #B30000;
        --color-light-yellow: #FFE74D;


        --active-link-color: var(--color-dark-green);
        --active-border-color: var(--color-dark-green);
    }

    .navbar {
        margin: 0 !important;
        padding: 0 !important;
        background-color: var(--color-maroon);
    }

    .navbar-iskolib {
        background-color: var(--color-maroon);
        height: 100px;
        padding-left: 50px;
        padding-right: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 2rem;
    }

    .navbar-title {
        color: var(--color-yellow);
        font-weight: bold;
        text-decoration: none;
        font-size: 28px;
        letter-spacing: 1px;
    }

    .navbar-title:hover {
        color: #FFFFFF !important;
    }

    .nav-center {
        display: flex;
        gap: 2rem;
        padding: 0;
        list-style: none;
    }


    .nav-item {
        margin: 0;
    }

    .nav-link {
        color: #FFFFFF !important;
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        padding: 0.5rem 0;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: var(--color-yellow) !important;
    }

    .nav-link.active {
        color: var(--color-yellow) !important;
        font-weight: bold;
        border-bottom: 3px solid var(--color-yellow);
    }

    .profile-section {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .profile-icon-link {
        display: flex;
        align-items: center;
    }

    .profile-img-top {
        width: 32px;
        height: 32px;
        object-fit: contain;
        filter: brightness(0) invert(1);
    }

    .logout-btn {
        background-color: var(--color-yellow);
        color: var(--color-maroon);
        font-weight: bold;
        padding: 5px 60px;
        border-radius: 5px;
        border: 1px solid;
        cursor: pointer;

        box-shadow: 0 0 15px rgba(0, 0, 0, 0.25);
    }

    .logout-btn:hover {
        background: linear-gradient(to top, #FFDF00, #FFE74D);
        transform: scale(1.02);
    }
</style>

<nav class="navbar">
    <div class="navbar-iskolib container-fluid">
        <a class="navbar-title" href="#">ISKO-LIB</a>

        <ul class="nav-center">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('iskolib.user.home') ? 'active' : '' }}"
                    href="{{ route('iskolib.user.home') }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('iskolib.user.books') ? 'active' : '' }}"
                    href="{{ route('iskolib.user.books') }}">
                    Books
                </a>
            </li>
        </ul>

        <div class="profile-section">
            <a href="#" class="profile-icon-link">
                <img src="{{ asset('images/pfp_icon.png') }}" class="profile-img-top" alt="Profile">
            </a>
            <a href="{{ route('iskolib.welcome') }}" class="logout-btn">Logout</a>
        </div>
    </div>
</nav>