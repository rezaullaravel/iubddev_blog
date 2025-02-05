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
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">


                    @if (Session::get('lang') == 'bangla')
                        <li class="nav-item active">


                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">হোম</a>

                        </li>
                        <li class="nav-item"><a class="nav-link" href="about.html">এবাউট</a></li>
                        <li class="nav-item"><a class="nav-link" href="service.html">কন্টাক্ট</a></li>
                        @if (Auth::check())

                        @if (Auth::user()->role == 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">ড্যাশবোর্ড</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.dashboard') }}">ড্যাশবোর্ড</a></li>
                        @endif
                      @else
                      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">লগিন/সাইন আপ</a></li>
                      @endif
                    @else
                        <a class="nav-link" href="index.html">Home</a>

                        </li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="service.html">Contact</a></li>

                        @if (Auth::check())

                        @if (Auth::user()->role == 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        @endif
                      @else
                      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login/Signup</a></li>
                      @endif
                    @endif







                    @if (Session::get('lang') == 'bangla')
                        <li class="nav-item"><a class="nav-link text-danger"
                                href="{{ route('set.english') }}">English</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link text-danger" href="{{ route('set.bangla') }}">বাংলা</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>
