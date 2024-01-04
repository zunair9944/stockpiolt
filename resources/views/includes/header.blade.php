<style>
    /* Style The Dropdown Button */
    /* .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    } */

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    /* .dropdown-content a:hover {
        background-color: #f1f1f1
    } */

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        /* background-color: #3e8e41; */
    }
</style>

<header id="header" class="mb-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a class="menu-btn d-lg-none" href="#"><img src="/images/menu.png"></a>
            @if ($logo)
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ $logo }}" alt="items" class="img-fluid"></a>
                </div>
            @endif
            <nav id="nav">
                <a class="menu-btn d-lg-none" href="#"><img src="/images/menu.png"></a>
                <ul class="list-unstyled d-lg-flex m-0 p-0">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/demo') }}">Demo</a></li>
                    <li><a href="{{ url('/subscribers') }}">Subscribers</a></li>
                    <li><a href="{{ url('/pilot') }}">Traders</a></li>
                    <li><a href="{{ url('/strategy') }}">Strategies</a></li>
                    <div class="dropdown">
                        <button class="dropbtn "
                            style="    background-color: transparent;border: none; color: #fff;margin-top: 5px;">Resources</button>
                        <div class="dropdown-content">
                            <a href="/faqs">FAQs</a>
                            <a href="/blogs">Blogs</a>
                            <a href="/case-studies">case Studies</a>
                            <a href="/partners">Partners</a>
                            <a href="/products">Features</a>
                            <a href="/about-us">About Us</a>
                        </div>
                    </div>
                    {{-- <li><a href="{{ url('/about-us') }}">About</a></li> --}}
                    {{-- <li><a href="{{ url('/products') }}">Services</a></li> --}}
                    {{-- <li><a href="{{ url('/blogs') }}">Blog</a></li> --}}
                    <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                </ul>
                <div class="d-block d-lg-none">
                    @guest
                        <a class="btn custom-btn" href="{{ route('login') }}">Login</a>
                    @else
                        <div class="d-flex flex-column justify-content-start gap-2">
                            <div>
                                <a class="btn custom-btn" href="{{ route('login') }}">{{ Auth::user()->name }}</a>
                            </div>
                            <div>
                                <a class="btn custom-btn"
                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </nav>
            <!--<div class="mobile-icon d-lg-none">-->
            <!--    <a href="#"><img src="images/header-icon.png"></a>-->
            <!--</div>-->
            <div class="header-right d-none d-lg-block">
                <div class="d-flex align-items-center">
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle bg-transparent border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i> EN <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div> -->
                    @guest
                        <a class="btn custom-btn" href="{{ route('login') }}">Login</a>
                    @else
                        <a class="btn custom-btn" href="{{ route('login') }}">{{ Auth::user()->name }}</a>
                        <a class="btn custom-btn"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest

                </div>
            </div>
        </div>
    </div>
</header>
