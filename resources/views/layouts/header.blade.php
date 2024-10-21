<!--Main Navigation-->
<header id="main_navbar" class="container" style=" overflow:visible;">

    <!-- Navbar -->
    <nav class="main_navbar navbar navbar-expand-lg navbar-light bg-light mt-3 border border-secondary">
        <!-- Container wrapper -->
        <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center">
            
            <!-- Brand and Toggle button container -->
            <div class="d-flex align-items-center">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="offcanvas"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" id="app_logo" href="{{ route('home') }}">
                    <!-- <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy" /> -->
                    <img src="/img/{{ get_settings('app_logo') }}" height="50"
                        alt="{{ get_settings('app_name') }}" loading="lazy" />
                </a>
            </div>
            
            <!-- Collapsible wrapper -->
            <div class="offcanvas offcanvas-start"  tabindex="-1" id="navbarSupportedContent" id="offcanvas" >
                <button type="button" id='cross_button' data-mdb-dismiss="offcanvas" data-mdb-target="#navbarSupportedContent" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-sm-3 ms-4">

                    
                    <li class="nav-item" style="visibility: hidden;">&nbsp;</li>
                    <li class="nav-item" style="visibility: hidden;">&nbsp;</li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">HOME</a>
                    </li>
                    
                    @php
                        $categories = get_categories();
                    @endphp
                    @foreach ($categories as $category)
                        <li class="nav-item dropdown" style="position: relative; z-index: 1100;">
                            <a class="nav-link dropdown-toggle" href="#" id="plcunlockmenu" role="button" 
                                data-mdb-toggle="dropdown" aria-expanded="true">
                                {{ $category->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="plcunlockmenu">
                                @foreach ($category->subcategories as $sub)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('blog.subs', ['subcategory' => $sub->slug]) }}">{{ $sub->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">BLOG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactPage') }}">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutPage') }}">ABOUT</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="faqmenu" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            FAQ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="faqmenu">
                            <li>
                                <a class="dropdown-item" href="{{ route('privacyPage') }}">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('termsPage') }}">Terms & Condition</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Search -->
                <form class="d-flex input-group w-auto" method="GET" action="{{ route('blog.search') }}" id="form-search">
                    <input type="search" name="search" class="form-control rounded" id='searchbarnav' placeholder="Search"
                        aria-label="Search" aria-describedby="search-addon" />
                    <span style="{{ Auth::check() ? 'display: none;' : '' }}"  class="input-group-text border-0" id="search-addon" onclick="document.getElementById('form-search').submit();">
                        <i class="fas fa-search"></i>
                    </span>
                </form>

                @auth
                    <!-- Avatar -->
                    <div class="dropdown ms-3">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                            id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            <img src="/img/profile.webp" class="rounded-circle"
                                height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li id='dropdown-item-whenauth'>
                                <a class="dropdown-item" id="login"  href="{{ route('user.logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" id="login" class="nav-link ms-3">LOGIN</a>
                @endauth

            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->


    
</header>
<!--Main Navigation-->
