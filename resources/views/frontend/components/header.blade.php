<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item"><a href="mailto:support@gmail.com"><i
                                    class="icofont-support-faq mr-2"></i>support@novena.com</a></li>
                        <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New York,
                            USA </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                        <a href="tel:+23-345-67890">
                            <span>Call Now : </span>
                            <span class="h4">823-4565-13456</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="Logo" class="img-fluid">
            </a>

            <!-- Custom Toggler -->
            <input type="checkbox" id="menu-toggle" class="menu-toggle">
            <label for="menu-toggle" class="menu-icon">&#9776;</label>

            <!-- Collapsible Menu -->
            <ul class="nav-menu">


                @if (Session::get('lang') == 'bangla')
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">হোম </a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">এবাউট </a></li>
                    <li class="nav-item"><a class="nav-link" href="service.html">কন্টাক্ট </a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.html">Contact</a></li>
                @endif

                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">
                                @if (Session::get('lang') == 'bangla')
                                    ড্যাশবোর্ড
                                @else
                                    Dashboard
                                @endif
                            </a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.dashboard') }}">
                                @if (Session::get('lang') == 'bangla')
                                    ড্যাশবোর্ড
                                @else
                                    Dashboard
                                @endif
                            </a></li>
                    @endif
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">

                            @if (Session::get('lang') == 'bangla')
                                লগিন/সাইন আপ
                            @else
                                Login/Signup
                            @endif
                        </a></li>
                @endif

                @if (Session::get('lang') == 'bangla')
                    <li class="nav-item"><a class="nav-link text-danger" href="{{ route('set.english') }}">English</a>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link text-danger" href="{{ route('set.bangla') }}">বাংলা</a></li>
                @endif
            </ul>
        </div>
    </nav>

</header>

<style>
    /* 🔹 General Navbar Styles */
    .navbar {
        background: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 15px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    /* 🔹 Logo */
    .navbar-brand img {
        max-height: 50px;
    }

    /* 🔹 Navigation Menu */
    .nav-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .nav-menu .nav-item {
        margin: 0 15px;
    }

    .nav-menu .nav-link {
        color: #333;
        font-weight: 500;
        padding: 10px 15px;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .nav-menu .nav-link:hover {
        color: #007bff;
    }

    /* 🔹 Mobile Menu Toggle */
    .menu-toggle {
        display: none;
    }

    .menu-icon {
        font-size: 28px;
        cursor: pointer;
        display: none;
    }

    /* 🔹 Responsive Menu */
    @media (max-width: 991px) {
        .menu-icon {
            display: block;
        }

        .nav-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            right: 20px;
            width: 200px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
        }

        .nav-menu .nav-item {
            margin-bottom: 10px;
            text-align: center;
        }

        /* Show Menu When Checkbox is Checked */
        .menu-toggle:checked+.menu-icon+.nav-menu {
            display: flex;
        }
    }
</style>
