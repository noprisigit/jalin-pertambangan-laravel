<header id="rs-header" class="rs-header">
    <!-- Menu Start -->
    <div class="menu-area menu-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo-area">
                        <a href="">
                            <img src="{{ asset('assets/logo_bg.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 text-right">
                    <div class="rs-menu-area">
                        <div class="main-menu">
                            <div class="mobile-menu">
                                <a class="rs-menu-toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <nav class="rs-menu pr-0">
                                <!-- NAVBAR disederhanakan untuk one-page -->
                                <ul class="nav-menu">
                                    <li class="@if (Request::is('/')) active @endif">
                                        <a class="jp-scroll" href="{{ route('landing.home') }}">
                                            {{ __('Home') }}
                                        </a>
                                    </li>
                                    <li class="@if (Request::is('blogs*')) active @endif">
                                        <a class="jp-scroll" href="{{ route('landing.blogs') }}">
                                            {{ __('News') }}
                                        </a>
                                    </li>
                                    <li class="@if (Request::is('about*')) active @endif">
                                        <a class="jp-scroll" href="{{ route('landing.about') }}">
                                            {{ __('About Us') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="jp-scroll" href="{{ route('landing.home') }}#our-expert">
                                            {{ __('Our Expert') }}
                                        </a>
                                    </li>
                                    <li class="@if (Request::is('services*')) active @endif">
                                        <a class="jp-scroll" href="{{ route('landing.services') }}">
                                            {{ __('Our Services') }}
                                        </a>
                                    </li>
                                    <li class="@if (Request::is('products*')) active @endif">
                                        <a class="jp-scroll" href="{{ route('landing.products') }}">
                                            {{ __('Our Products') }}
                                        </a>
                                    </li>

                                    <!-- <li class="menu-item-has-children">
                                        <a class="jp-scroll" href="#our-services">Our Services</a>
                                        <ul class="sub-menu">
                                            <li><a class="jp-scroll" href="#our-services">Diskusi</a></li>
                                            <li><a class="jp-scroll" href="#our-services">Pelatihan</a></li>
                                            <li><a class="jp-scroll" href="#our-services">Pendampingan</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li>
                                        <a class="jp-scroll" href="{{ route('landing.home') }}#rs-contact">
                                            {{ __('Contact') }}
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="expand-btn-inner">
                            <ul>
                                <li class="search-parent">
                                    <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal"
                                        href="#"><i class="flaticon-search"></i></a>
                                </li>
                                <li>
                                    <a id="nav-expander" class="humburger nav-expander" href="#">
                                        <span class="dot1"></span><span class="dot2"></span><span
                                            class="dot3"></span>
                                        <span class="dot4"></span><span class="dot5"></span><span
                                            class="dot6"></span>
                                        <span class="dot7"></span><span class="dot8"></span><span
                                            class="dot9"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
</header>
