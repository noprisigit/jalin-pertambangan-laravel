@extends('frontend.app')

@section('title', $post->title)

@push('css')
    <style>
        /* ===== CSS RESET & MODERN FOUNDATION ===== */
        * {
            box-sizing: border-box;
        }

        :root {
            /* Modern Color Palette */
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-200: #bae6fd;
            --primary-300: #89b7fc;
            --primary-400: #3e88f8;
            --primary-500: #267bfa;
            --primary-600: #0d6efd;
            --primary-700: #0369a1;
            --primary-800: #075985;
            --primary-900: #0c4a6e;

            --secondary-50: #f8fafc;
            --secondary-100: #f1f5f9;
            --secondary-200: #e2e8f0;
            --secondary-300: #cbd5e1;
            --secondary-400: #94a3b8;
            --secondary-500: #64748b;
            --secondary-600: #475569;
            --secondary-700: #334155;
            --secondary-800: #1e293b;
            --secondary-900: #0f172a;

            --accent-cyan: #22d3ee;
            --accent-emerald: #10b981;
            --accent-amber: #f59e0b;

            --white: #ffffff;
            --black: #000000;

            /* Spacing System */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-5: 1.25rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-10: 2.5rem;
            --space-12: 3rem;
            --space-16: 4rem;
            --space-20: 5rem;

            /* Border Radius */
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-full: 9999px;

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);

            /* Typography */
            --font-size-xs: 0.75rem;
            --font-size-sm: 0.875rem;
            --font-size-base: 1rem;
            --font-size-lg: 1.125rem;
            --font-size-xl: 1.25rem;
            --font-size-2xl: 1.5rem;
            --font-size-3xl: 1.875rem;
            --font-size-4xl: 2.25rem;
            --font-size-5xl: 3rem;
            --font-size-6xl: 3.75rem;

            /* Transitions */
            --transition-fast: 150ms ease-in-out;
            --transition-normal: 300ms ease-in-out;
            --transition-slow: 500ms ease-in-out;
        }

        /* ===== HEADER STYLING ===== */
        .full-width-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition-normal);
        }

        /* ===== BREADCRUMBS SECTION ===== */
        .rs-breadcrumbs.bg-1 {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-700));
            position: relative;
            overflow: hidden;
            margin-top: 80px;
            padding: 120px 0 80px;
        }

        .rs-breadcrumbs.bg-1::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .rs-breadcrumbs .content-part {
            position: relative;
            z-index: 2;
        }

        .breadcrumbs-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            line-height: 1.2;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .breadcrumbs-desc {
            font-size: var(--font-size-lg);
            opacity: 0.9;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* ===== BLOG SECTION ===== */
        .rs-blog.inner {
            background: var(--secondary-50);
            position: relative;
        }

        .rs-blog.inner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 10% 20%, rgba(38, 123, 250, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(62, 136, 248, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .rs-blog.inner .container {
            position: relative;
            z-index: 2;
        }

        /* ===== BLOG POSTS ===== */
        .blog-wrap {
            background: var(--white);
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: var(--transition-normal);
            border: 1px solid rgba(38, 123, 250, 0.1);
            position: relative;
        }

        .blog-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(38, 123, 250, 0.02) 0%,
                    rgba(62, 136, 248, 0.01) 100%);
            opacity: 0;
            transition: var(--transition-normal);
            z-index: 1;
        }

        .blog-wrap:hover::before {
            opacity: 1;
        }

        .blog-wrap:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
        }

        /* Image Part */
        .blog-wrap .image-part {
            position: relative;
            overflow: hidden;
            height: 280px;
        }

        .blog-wrap .image-part img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-normal);
            filter: brightness(1) contrast(1.1);
        }

        .blog-wrap:hover .image-part img {
            transform: scale(1.05);
            filter: brightness(1.1) contrast(1.2);
        }

        /* Overlay Effect */
        .blog-wrap .image-part::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(38, 123, 250, 0.8) 0%,
                    rgba(62, 136, 248, 0.6) 100%);
            opacity: 0;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .blog-wrap:hover .image-part::after {
            opacity: 1;
        }

        /* Content Part */
        .blog-wrap .content-part {
            padding: var(--space-6);
            position: relative;
            z-index: 2;
        }

        /* Title */
        .blog-wrap .title {
            font-size: var(--font-size-xl);
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: var(--space-3);
        }

        .blog-wrap .title a {
            color: var(--secondary-800);
            text-decoration: none;
            transition: var(--transition-normal);
        }

        .blog-wrap .title a:hover {
            color: var(--primary-600);
        }

        /* Blog Meta */
        .blog-wrap .blog-meta {
            display: flex;
            align-items: center;
            gap: var(--space-4);
            margin-bottom: var(--space-4);
            padding-bottom: var(--space-4);
            border-bottom: 1px solid var(--secondary-200);
        }

        .blog-wrap .blog-meta li {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            font-size: var(--font-size-sm);
            color: var(--secondary-600);
        }

        .blog-wrap .blog-meta li i {
            color: var(--primary-500);
            font-size: var(--font-size-xs);
        }

        .blog-wrap .blog-meta li a {
            color: var(--primary-600);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-normal);
        }

        .blog-wrap .blog-meta li a:hover {
            color: var(--primary-700);
        }

        /* Description */
        .blog-wrap .desc {
            color: var(--secondary-600);
            line-height: 1.6;
            margin-bottom: var(--space-4);
            font-size: var(--font-size-sm);
        }

        /* Button Part */
        .blog-wrap .btn-part .readon-arrow {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: var(--white);
            padding: var(--space-3) var(--space-5);
            border-radius: var(--radius-xl);
            text-decoration: none;
            font-weight: 600;
            font-size: var(--font-size-sm);
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
        }

        .blog-wrap .btn-part .readon-arrow::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition-normal);
        }

        .blog-wrap .btn-part .readon-arrow:hover::before {
            left: 100%;
        }

        .blog-wrap .btn-part .readon-arrow:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: var(--white);
        }

        .blog-wrap .btn-part .readon-arrow::after {
            content: '→';
            transition: var(--transition-normal);
        }

        .blog-wrap .btn-part .readon-arrow:hover::after {
            transform: translateX(4px);
        }

        /* ===== SIDEBAR ===== */
        .blog-sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-grid {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: var(--space-6);
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(38, 123, 250, 0.1);
            transition: var(--transition-normal);
        }

        .sidebar-grid:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        /* Sidebar Title */
        .sidebar-title .title {
            font-size: var(--font-size-lg);
            font-weight: 700;
            color: var(--secondary-800);
            position: relative;
            padding-bottom: var(--space-3);
        }

        .sidebar-title .title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border-radius: var(--radius-full);
        }

        /* Search Widget */
        .search-bar {
            position: relative;
            display: flex;
            background: var(--secondary-50);
            border-radius: var(--radius-xl);
            overflow: hidden;
            border: 2px solid var(--secondary-200);
            transition: var(--transition-normal);
        }

        .search-bar:focus-within {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(38, 123, 250, 0.1);
        }

        .search-bar input {
            flex: 1;
            background: transparent;
            border: none;
            padding: var(--space-4);
            font-size: var(--font-size-sm);
            outline: none;
            color: var(--secondary-700);
        }

        .search-bar input::placeholder {
            color: var(--secondary-500);
        }

        .search-bar span {
            display: flex;
            align-items: center;
            padding: var(--space-2);
        }

        .search-bar button {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border: none;
            color: var(--white);
            width: 36px;
            height: 36px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .search-bar button:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            transform: scale(1.05);
        }

        /* Recent Posts */
        .single-post {
            display: flex;
            gap: var(--space-3);
            padding: var(--space-3);
            background: var(--secondary-50);
            border-radius: var(--radius-lg);
            transition: var(--transition-normal);
            margin-bottom: var(--space-4);
        }

        .single-post:last-child {
            margin-bottom: 0;
        }

        .single-post:hover {
            background: var(--primary-50);
            transform: translateX(4px);
        }

        .single-post .post-image {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            border-radius: var(--radius-md);
            overflow: hidden;
        }

        .single-post .post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-normal);
        }

        .single-post:hover .post-image img {
            transform: scale(1.1);
        }

        .single-post .post-desc {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .single-post .post-title h5 {
            font-size: var(--font-size-sm);
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: var(--space-2);
        }

        .single-post .post-title a {
            color: var(--secondary-800);
            text-decoration: none;
            transition: var(--transition-normal);
        }

        .single-post .post-title a:hover {
            color: var(--primary-600);
        }

        .single-post ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .single-post ul li {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            font-size: var(--font-size-xs);
            color: var(--secondary-500);
        }

        .single-post ul li i {
            color: var(--primary-500);
            font-size: 10px;
        }

        /* Categories */
        .sidebar-categories ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-categories ul li {
            margin-bottom: var(--space-3);
        }

        .sidebar-categories ul li:last-child {
            margin-bottom: 0;
        }

        .sidebar-categories ul li a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: var(--space-3);
            background: var(--secondary-50);
            border-radius: var(--radius-lg);
            text-decoration: none;
            color: var(--secondary-700);
            transition: var(--transition-normal);
            font-size: var(--font-size-sm);
            font-weight: 500;
        }

        .sidebar-categories ul li a:hover {
            background: var(--primary-50);
            color: var(--primary-700);
            transform: translateX(4px);
        }

        .sidebar-categories ul li a::after {
            content: '→';
            opacity: 0;
            transition: var(--transition-normal);
        }

        .sidebar-categories ul li a:hover::after {
            opacity: 1;
            transform: translateX(2px);
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 991.98px) {
            .rs-breadcrumbs.bg-1 {
                margin-top: 70px;
            }

            .blog-sidebar {
                position: static;
                top: auto;
            }
        }

        @media (max-width: 768px) {
            .rs-breadcrumbs.bg-1 {
                padding: 80px 0;
            }

            .breadcrumbs-title {
                font-size: 2rem;
            }

            .breadcrumbs-desc {
                font-size: var(--font-size-base);
            }

            .blog-wrap .image-part {
                height: 220px;
            }

            .blog-wrap .content-part {
                padding: var(--space-4);
            }

            .blog-wrap .blog-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-2);
            }

            .single-post {
                padding: var(--space-2);
            }

            .single-post .post-image {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-width: 576px) {
            .rs-breadcrumbs.bg-1 {
                padding: 60px 0;
            }

            .breadcrumbs-title {
                font-size: 1.75rem;
            }

            .sidebar-grid {
                padding: var(--space-4);
            }

            .blog-wrap .image-part {
                height: 200px;
            }

            .blog-wrap .title {
                font-size: var(--font-size-lg);
            }
        }

        /* ===== FOOTER STYLING (sama dengan index) ===== */
        .jp-footer {
            position: relative;
            background: linear-gradient(135deg,
                    rgba(15, 23, 42, 0.95) 0%,
                    rgba(30, 41, 59, 0.98) 100%);
            overflow: hidden;
        }

        .jp-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(38, 123, 250, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(62, 136, 248, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .jp-footer .footer-content {
            position: relative;
            z-index: 2;
        }

        .jp-footer .footer-widget .widget-title {
            color: #ffffff;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
        }

        .jp-footer .footer-widget .widget-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            border-radius: 2px;
        }

        .jp-footer .about-widget .desc {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
            margin: 20px 0;
            font-size: 15px;
        }

        .jp-footer .address-widget {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .jp-footer .address-widget li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .jp-footer .address-widget li:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(38, 123, 250, 0.3);
            transform: translateX(5px);
        }

        .jp-footer .address-widget li i {
            color: #267bfa;
            font-size: 18px;
            margin-top: 2px;
            min-width: 20px;
        }

        .jp-footer .address-widget li .desc {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            line-height: 1.6;
        }

        .jp-footer .address-widget li .desc a {
            color: #3e88f8;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .jp-footer .address-widget li .desc a:hover {
            color: #267bfa;
            text-decoration: underline;
        }

        .jp-footer .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px 0;
            position: relative;
        }

        .jp-footer .footer-bottom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(38, 123, 250, 0.5), transparent);
        }

        .jp-footer .copyright p {
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
            font-size: 14px;
        }

        .jp-footer .jp-year {
            color: #267bfa;
            font-weight: 600;
        }

        .jp-footer .footer-social {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .jp-footer .footer-social li a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .jp-footer .footer-social li a:hover {
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            border-color: #267bfa;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(38, 123, 250, 0.3);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .blog-wrap {
            animation: fadeInUp 0.6s ease-out;
        }

        .blog-wrap:nth-child(1) {
            animation-delay: 0.1s;
        }

        .blog-wrap:nth-child(2) {
            animation-delay: 0.2s;
        }

        .blog-wrap:nth-child(3) {
            animation-delay: 0.3s;
        }

        .blog-wrap:nth-child(4) {
            animation-delay: 0.4s;
        }

        .blog-wrap:nth-child(5) {
            animation-delay: 0.5s;
        }

        .blog-wrap:nth-child(6) {
            animation-delay: 0.6s;
        }

        .blog-wrap:nth-child(7) {
            animation-delay: 0.7s;
        }

        .blog-wrap:nth-child(8) {
            animation-delay: 0.8s;
        }

        .blog-wrap:nth-child(9) {
            animation-delay: 0.9s;
        }
    </style>
@endpush

@section('content')
    <div class="rs-breadcrumbs bg-1">
        <div class="container">
            <div class="content-part text-center">
                <h1 class="breadcrumbs-title white-color mb-0">{{ $post->title }}</h1>
            </div>
        </div>
    </div>

    <!-- Blog Section Start -->
    <div class="rs-blog inner single pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-part">
                        <div class="blog-img">
                            <a href="javascript:void">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="article-content shadow mb-60">
                            <ul class="blog-meta mb-22">
                                <li>
                                    <i class="fas fa-calendar-check"></i>
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}
                                </li>

                                @if ($post->user)
                                    <li>
                                        <i class="fas fa-user"></i>
                                        {{ $post->user?->name }}
                                    </li>
                                @endif

                                @if ($post->category)
                                    <li>
                                        <i class="fas fa-book"></i>
                                        <a href="#">{{ $post->category?->name }}</a>
                                    </li>
                                @endif

                                <li>
                                    <i class="fas fa-eye"></i>
                                    {{ $post->read_by }}
                                </li>
                            </ul>

                            {!! $post->content !!}
                        </div>

                        @if ($nextPost)
                            <div class="article-nav">
                                <ul>
                                    <li class="next">
                                        <a href="{{ route('landing.blogs.detail', ['slug' => $nextPost->slug]) }}">
                                            <span class="next-link">{{ __('Selanjutnya') }} <i
                                                    class="flaticon-next"></i></span>
                                            <span class="link-text">{{ $nextPost->title }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 md-mb-50 pl-35 lg-pl-15 md-order-first">
                    <div id="sticky-sidebar" class="blog-sidebar">
                        <div class="sidebar-search sidebar-grid shadow mb-50">
                            <form class="search-bar" method="GET" action="{{ route('landing.blogs') }}">
                                <input type="text" placeholder="{{ __('Cari') }}..." name="q"
                                    value="{{ request()->get('q', '') }}">
                                <span>
                                    <button type="submit"><i class="flaticon-search"></i></button>
                                </span>
                            </form>
                        </div>

                        <div class="sidebar-popular-post sidebar-grid shadow mb-50">
                            <div class="sidebar-title">
                                <h3 class="title mb-20">{{ __('Postingan Terbaru') }}</h3>
                            </div>
                            @foreach ($newestPosts as $post)
                                <div class="single-post mb-20">
                                    <div class="post-image">
                                        <a href="{{ route('landing.blogs.detail', ['slug' => $post->slug]) }}">
                                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="post image">
                                        </a>
                                    </div>
                                    <div class="post-desc">
                                        <div class="post-title">
                                            <h5 class="margin-0">
                                                <a href="{{ route('landing.blogs.detail', ['slug' => $post->slug]) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>
                                        </div>
                                        <ul>
                                            <li><i class="fa fa-calendar"></i> 28 June, 2019</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="sidebar-categories sidebar-grid shadow">
                            <div class="sidebar-title">
                                <h3 class="title mb-20">{{ __('Kategori') }}</h3>
                            </div>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-end"></div>
        </div>
    </div>
@endsection
