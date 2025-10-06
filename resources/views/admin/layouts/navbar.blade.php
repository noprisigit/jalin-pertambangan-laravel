<ul class="navbar-nav pt-lg-3">
    <li class="nav-item">
        <a class="nav-link" href="./">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                <i class="fas fa-tachometer-alt"></i>
            </span>
            <span class="nav-link-title"> {{ __('Dashboard') }} </span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/posts*') ? 'active' : '' }} dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-article" data-bs-toggle="dropdown" data-bs-auto-close="false"
            role="button" aria-expanded="{{ Request::is('admin/posts*') ? 'true' : 'false' }}">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/layout-2 -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-1">
                    <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                </svg></span>
            <span class="nav-link-title"> {{ __('Manajemen Artikel') }} </span>
        </a>
        <div class="dropdown-menu {{ Request::is('admin/posts*') ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ Request::is('admin/posts') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
                        {{ __('Artikel') }}
                    </a>
                    <a class="dropdown-item {{ Request::is('admin/posts/categories*') ? 'active' : '' }}" href="{{ route('admin.posts.categories.index') }}">
                        {{ __('Kategori') }}
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::is('admin/feedbacks') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.feedbacks.index') }}">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                <i class="fas fa-comment-dots"></i>
            </span>
            <span class="nav-link-title"> {{ __('Tanggapan & Masukan') }} </span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                <i class="fas fa-users"></i>
            </span>
            <span class="nav-link-title"> {{ __('Manajemen Pengguna') }} </span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.settings.index') }}">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                <i class="fas fa-tachometer-alt"></i>
            </span>
            <span class="nav-link-title"> {{ __('Pengaturan Sistem') }} </span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.profile.index') }}">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                <i class="fas fa-user"></i>
            </span>
            <span class="nav-link-title"> {{ __('Profil') }} </span>
        </a>
    </li>
</ul>
