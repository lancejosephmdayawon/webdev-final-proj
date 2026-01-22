<style>
    :root {
        --color-maroon: #800000;
        --color-yellow: #FFDF00;
        --color-light-maroon: #B30000;
        --color-light-yellow: #FFE74D;
    }

    .navbar {
        width: 100%;
        margin: 0 !important;
        padding: 0 !important;
        background-color: var(--color-maroon);
    }

    .navbar-iskolib {
        background-color: var(--color-maroon);
        height: 100px;
        width: 70%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
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

    .nav-toggle {
        display: none;
        font-size: 24px;
        color: var(--color-yellow);
        cursor: pointer;
    }

    @media screen and (max-width: 1000px) {

        .nav-center,
        .profile-section {
            display: none;
            width: 100%;
            flex-direction: column;
            margin-top: 12px;
        }

        .navbar-iskolib {
            flex-wrap: wrap;
            height: auto;
            width: 90%;
            padding: 24px;
        }

        .nav-toggle {
            display: block;
        }

        .navbar-iskolib.responsive .nav-center,
        .navbar-iskolib.responsive .profile-section {
            display: flex;
        }

        .navbar-iskolib.responsive .profile-section {
            flex-direction: row;
            justify-content: flex-start;
            gap: 1rem;
            padding: 0.5rem 0;
        }

        .navbar-iskolib.responsive .logout-btn {
            padding: 8px 12px;
            min-width: 100px;
            text-align: center;
        }

        .nav-center {
            margin-bottom: 16px;
        }

        .nav-link.active {
            background: var(--color-yellow) !important;
            color: var(--color-maroon) !important;
            font-weight: bold;
            padding: 1rem;
            border-radius: 5px;
        }

        .nav-center {
            gap: 0.5rem;
        }

        .logout-btn {
            padding: 8px 12px;
            width: 100%;
            text-align: center;
        }

        .profile-section {
            margin-bottom: 16px;
        }
    }
</style>

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar">
    <div class="navbar-iskolib container-fluid" id="iskoNavbar">
        <a class="navbar-title" href="{{ route('admin.dashboard') }}">ISKO-LIB</a>

        <ul class="nav-center">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.inventory') ? 'active' : '' }}"
                    href="{{ route('admin.inventory') }}">
                    Inventory
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.transaction') ? 'active' : '' }}"
                    href="{{ route('admin.transaction') }}">
                    Transactions
                </a>
            </li>
        </ul>

        <div class="profile-section">
            <a href="{{ route('admin.profile') }}" class="profile-icon-link">
                <img src="{{ asset('images/pfp_icon.png') }}" class="profile-img-top" alt="Profile">
            </a>

            <!-- Logout link -->
            <a href="#" class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <a href="javascript:void(0);" class="nav-toggle" onclick="toggleNavbar()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</nav>

<script>
    function toggleNavbar() {
        const nav = document.getElementById("iskoNavbar");
        nav.classList.toggle("responsive");
    }
</script>