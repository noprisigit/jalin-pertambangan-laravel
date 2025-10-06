<!DOCTYPE html>
<html lang="id">
<!-- index.html – Jalin Pertambangan (JP) -->

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Jalin Pertambangan (JP) — Konsultan Pertambangan & Transformasi Operasional</title>
    <meta name="description"
        content="Jalin Pertambangan (JP) adalah konsultan pertambangan yang menyediakan diskusi, edukasi, pelatihan, asistensi, dan pendampingan untuk tata kelola dan kinerja operasi tambang yang adaptif, responsif, dan inovatif.">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">

    <!-- CSS bawaan template (dipertahankan) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/off-canvas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/linea-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rsmenu-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/nivo-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/preview.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rsmenu-transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rs-spacing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Bootstrap 5 & Icons (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Swiper (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" rel="stylesheet">

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

        .full-width-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition-normal);
        }

        /* ===== Hero Wrapper ===== */
        .jp-hero {
            position: relative;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-700));
            color: var(--white);
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin-top: 80px;
            /* Offset for fixed header */
        }

        /* Decorative Elements */
        .jp-hero .blob {
            position: absolute;
            width: 300px;
            height: 300px;
            opacity: 0.1;
            filter: blur(40px);
            background: radial-gradient(circle, var(--accent-cyan), transparent 70%);
            animation: float 20s ease-in-out infinite;
            border-radius: 50%;
        }

        .jp-hero .blob-1 {
            top: -150px;
            left: -150px;
            animation-delay: 0s;
        }

        .jp-hero .blob-2 {
            bottom: -150px;
            right: -150px;
            animation-delay: -10s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-20px) scale(1.1);
            }
        }

        /* Swiper Container */
        .jp-hero .swiper {
            width: 100%;
            height: 100%;
        }

        .jp-hero .swiper-slide {
            padding: var(--space-20) 0;
        }

        /* Content Styling */
        .jp-hero .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-4);
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: var(--font-size-sm);
            color: var(--secondary-800);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            margin-bottom: var(--space-4);
        }

        .jp-hero .eyebrow i {
            color: var(--primary-600);
        }

        .jp-hero .title {
            font-weight: 800;
            line-height: 1.1;
            font-size: clamp(2rem, 5vw, 3.5rem);
            margin: var(--space-4) 0;
            color: var(--white);
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .jp-hero .lead {
            font-size: var(--font-size-lg);
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: var(--space-6);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* CTA Buttons */
        .jp-hero .cta-wrap {
            display: flex;
            gap: var(--space-4);
            flex-wrap: wrap;
            margin-bottom: var(--space-6);
        }

        .jp-hero .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-4) var(--space-6);
            border: none;
            border-radius: var(--radius-xl);
            font-weight: 700;
            font-size: var(--font-size-base);
            text-decoration: none;
            transition: var(--transition-normal);
            cursor: pointer;
        }

        .jp-hero .btn-primary-hero {
            background: var(--white);
            color: var(--secondary-800);
            box-shadow: var(--shadow-lg);
        }

        .jp-hero .btn-primary-hero:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            color: var(--secondary-800);
        }

        .jp-hero .btn-outline-hero {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .jp-hero .btn-outline-hero:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-3px);
            color: var(--white);
        }

        /* Trust Chips */
        .jp-hero .trust {
            display: flex;
            gap: var(--space-3);
            flex-wrap: wrap;
            margin-top: var(--space-6);
        }

        .jp-hero .trust .chip {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-4);
            border-radius: var(--radius-full);
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            font-size: var(--font-size-sm);
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Illustration Box */
        .jp-hero .illobox {
            position: relative;
            border-radius: var(--radius-2xl);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            overflow: hidden;
            padding: var(--space-8);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 300px;
        }

        .jp-hero .illobox img {
            width: 100%;
            height: auto;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            transition: var(--transition-normal);
        }

        .jp-hero .illobox img:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-2xl);
        }

        .jp-hero .illobox i {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: var(--space-4);
        }

        .jp-hero .illobox h5 {
            color: var(--white);
            font-size: var(--font-size-xl);
            font-weight: 600;
            margin-bottom: var(--space-2);
        }

        .jp-hero .illobox p {
            color: rgba(255, 255, 255, 0.7);
            font-size: var(--font-size-sm);
            margin: 0;
        }

        /* Swiper Controls */
        .jp-hero .swiper-button-next,
        .jp-hero .swiper-button-prev {
            width: 50px;
            height: 50px;
            border-radius: var(--radius-full);
            /* background: rgba(255, 255, 255, 0.2); */
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: var(--white);
            transition: var(--transition-normal);
        }

        .jp-hero .swiper-button-next:after,
        .jp-hero .swiper-button-prev:after {
            font-size: 18px;
            font-weight: 900;
        }

        .jp-hero .swiper-button-next:hover,
        .jp-hero .swiper-button-prev:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .jp-hero .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 1;
            transition: var(--transition-normal);
        }

        .jp-hero .swiper-pagination-bullet-active {
            background: var(--white);
            width: 30px;
            border-radius: var(--radius-full);
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 991.98px) {
            .jp-hero {
                margin-top: 70px;
            }

            .jp-hero .illobox {
                margin-top: var(--space-8);
                min-height: 250px;
            }

            .rs-menu .nav-menu {
                gap: 0;
            }

            .rs-menu .nav-menu>li>a {
                padding: var(--space-2) var(--space-3);
                font-size: var(--font-size-xs);
            }
        }

        @media (max-width: 768px) {
            .jp-hero .cta-wrap {
                flex-direction: column;
            }

            .jp-hero .btn-hero {
                justify-content: center;
            }

            .jp-hero .trust {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .jp-hero .illobox img {
                max-height: 200px;
                object-fit: cover;
            }

            .jp-hero .title {
                font-size: 2rem;
            }

            .jp-hero .lead {
                font-size: var(--font-size-base);
            }
        }


        .jp-wa-float {
            position: fixed;
            right: 70px;
            bottom: 25px;
            z-index: 9999
        }

        .jp-wa-float a {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #25D366;
            color: #fff;
            padding: 12px 16px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2)
        }

        .jp-wa-float a .wa-badge {
            background: rgba(255, 255, 255, .15);
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 12px
        }

        #scrollUp {
            animation: pulse 2.2s infinite
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(47, 92, 233, .45)
            }

            70% {
                box-shadow: 0 0 0 20px rgba(47, 92, 233, 0)
            }

            100% {
                box-shadow: 0 0 0 0 rgba(47, 92, 233, 0)
            }
        }




        .jp-about-section .images-part {
            position: relative;
            margin-top: -700px;
            padding: 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.8));
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .jp-about-section .images-part::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            background: linear-gradient(45deg, #0ea5e9, #22d3ee, #0284c7, #22d3ee, #0ea5e9);
            border-radius: 24px;
            z-index: 0;
            opacity: 0;
            transition: all 0.3s ease;
            animation: gradient-rotate 3s linear infinite;
            background-size: 400% 400%;
        }

        .jp-about-section .images-part:hover::before {
            opacity: 1;
        }

        .jp-about-section .images-part img {
            width: 100%;
            height: auto;
            border-radius: 16px;
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
            filter: contrast(1.1) saturate(1.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .jp-about-section .images-part:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        .jp-about-section .images-part:hover img {
            transform: scale(1.02);
            filter: contrast(1.2) saturate(1.2) brightness(1.05);
        }

        /* Decorative Elements */
        .jp-about-section .images-part::after {
            content: '';
            position: absolute;
            top: 20px;
            right: -20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            border-radius: 50%;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
            z-index: 1;
        }

        /* Service Items Enhancement */
        .jp-about-section .services-part {
            padding: 20px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(14, 165, 233, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .jp-about-section .services-part::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            transform: scaleY(0);
            transition: all 0.3s ease;
        }

        .jp-about-section .services-part:hover::before {
            transform: scaleY(1);
        }

        .jp-about-section .services-part:hover {
            transform: translateX(8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.8);
        }

        /* Service Icon Enhancement */
        .jp-about-section .services-icon {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), rgba(34, 211, 238, 0.05));
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 15px;
            border: 2px solid rgba(14, 165, 233, 0.2);
            transition: all 0.3s ease;
        }

        .jp-about-section .services-part:hover .services-icon {
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            border-color: #0ea5e9;
            transform: scale(1.1);
        }

        /* Button Enhancement */
        .jp-about-section .btn-part .readon2 {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.3);
        }

        .jp-about-section .btn-part .readon2::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.3s ease;
        }

        .jp-about-section .btn-part .readon2:hover::before {
            left: 100%;
        }

        .jp-about-section .btn-part .readon2:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(14, 165, 233, 0.4);
            color: white;
        }

        /* Video Button Enhancement */
        .jp-about-section .video-btn {
            position: relative;
        }

        .jp-about-section .video-btn a {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #22d3ee, #0ea5e9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(34, 211, 238, 0.3);
            position: relative;
            overflow: hidden;
        }

        .jp-about-section .video-btn a::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: all 0.3s ease;
            transform: translate(-50%, -50%);
        }

        .jp-about-section .video-btn a:hover::before {
            width: 100%;
            height: 100%;
        }

        .jp-about-section .video-btn a:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(34, 211, 238, 0.4);
        }

        /* Animations */
        @keyframes gradient-rotate {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .jp-about-section .images-part {
                padding: 15px;
            }

            .jp-about-section .services-part {
                padding: 15px;
            }
        }

        /* Modern Why Choose Us Section */
        .jp-whychoose-section {
            position: relative;
            background: linear-gradient(135deg,
                    rgba(248, 250, 252, 0.95) 0%,
                    rgba(255, 255, 255, 0.9) 100%);
            overflow: hidden;
        }

        .jp-whychoose-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 10% 20%, rgba(14, 165, 233, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(34, 211, 238, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Title Section */
        .jp-whychoose-section .sec-title3 {
            position: relative;
            z-index: 2;
        }

        .jp-whychoose-section .sub-title {
            color: #0ea5e9;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            display: block;
        }

        .jp-whychoose-section .title {
            color: #1e293b;
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            position: relative;
        }

        .jp-whychoose-section .title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            border-radius: 2px;
        }

        /* Service Items */
        .jp-whychoose-section .services-part {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(14, 165, 233, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .jp-whychoose-section .services-part::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            transform: scaleY(0);
            transition: all 0.3s ease;
        }

        .jp-whychoose-section .services-part:hover::before {
            transform: scaleY(1);
        }

        .jp-whychoose-section .services-part:hover {
            transform: translateX(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.9);
        }

        /* Service Icon */
        .jp-whychoose-section .services-icon {
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg,
                    rgba(14, 165, 233, 0.1) 0%,
                    rgba(34, 211, 238, 0.05) 100%);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 2px solid rgba(14, 165, 233, 0.2);
        }

        .jp-whychoose-section .services-icon i {
            font-size: 24px;
            color: #0ea5e9;
            transition: all 0.3s ease;
        }

        .jp-whychoose-section .services-part:hover .services-icon {
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            border-color: #0ea5e9;
            transform: scale(1.1);
        }

        .jp-whychoose-section .services-part:hover .services-icon i {
            color: white;
        }

        /* Service Content */
        .jp-whychoose-section .services-text {
            flex: 1;
        }

        .jp-whychoose-section .services-text h3 {
            color: #1e293b;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .jp-whychoose-section .services-text h3 a {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .jp-whychoose-section .services-text h3 a:hover {
            color: #0ea5e9;
        }

        .jp-whychoose-section .services-txt {
            color: #64748b;
            line-height: 1.6;
            margin: 0;
        }

        /* Image Section */
        .jp-whychoose-section .images-part {
            position: relative;
            padding: 20px;
            background: linear-gradient(135deg,
                    rgba(255, 255, 255, 0.9) 0%,
                    rgba(248, 250, 252, 0.8) 100%);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .jp-whychoose-section .images-part::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            background: linear-gradient(45deg, #0ea5e9, #22d3ee, #0284c7, #22d3ee, #0ea5e9);
            border-radius: 24px;
            z-index: 0;
            opacity: 0;
            transition: all 0.3s ease;
            animation: gradient-rotate 3s linear infinite;
            background-size: 400% 400%;
        }

        .jp-whychoose-section .images-part:hover::before {
            opacity: 1;
        }

        .jp-whychoose-section .images-part img {
            width: 100%;
            height: auto;
            border-radius: 16px;
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
            filter: contrast(1.1) saturate(1.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .jp-whychoose-section .images-part:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        .jp-whychoose-section .images-part:hover img {
            transform: scale(1.02);
            filter: contrast(1.2) saturate(1.2) brightness(1.05);
        }

        /* Decorative Elements */
        .jp-whychoose-section .images-part::after {
            content: '';
            position: absolute;
            top: 20px;
            right: -20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            border-radius: 50%;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
            z-index: 1;
        }

        /* Animation Elements */
        .jp-whychoose-section .rs-animations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 3;
        }

        .jp-whychoose-section .shape-icons {
            position: absolute;
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            border-radius: 50%;
            opacity: 0.08;
            animation: float 8s ease-in-out infinite;
        }

        .jp-whychoose-section .shape-icons.one {
            width: 80px;
            height: 80px;
            top: 15%;
            left: -40px;
            animation-delay: 0s;
        }

        .jp-whychoose-section .shape-icons.two {
            width: 50px;
            height: 50px;
            bottom: 20%;
            right: -25px;
            animation-delay: 4s;
        }

        /* Animations */
        @keyframes gradient-rotate {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .jp-whychoose-section .images-part {
                margin-top: 40px;
                padding: 15px;
            }

            .jp-whychoose-section .title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .jp-whychoose-section .services-part {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .jp-whychoose-section .services-icon {
                align-self: center;
            }

            .jp-whychoose-section .title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 576px) {
            .jp-whychoose-section .services-icon {
                width: 50px;
                height: 50px;
            }

            .jp-whychoose-section .services-icon i {
                font-size: 20px;
            }

            .jp-whychoose-section .title {
                font-size: 1.5rem;
            }
        }

        /* Modern Blog Section */
        .jp-blog-section {
            position: relative;
            background: linear-gradient(135deg,
                    rgba(248, 250, 252, 0.95) 0%,
                    rgba(255, 255, 255, 0.9) 100%);
            overflow: hidden;
        }

        .jp-blog-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(38, 123, 250, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(62, 136, 248, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .jp-blog-section .sec-title .sub-title {
            color: #267bfa;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            position: relative;
        }

        .jp-blog-section .sec-title .sub-title::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 2px;
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            border-radius: 1px;
        }

        .jp-blog-section .sec-title .title {
            color: #1e293b;
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            position: relative;
        }

        .jp-blog-section .sec-title .title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            border-radius: 2px;
        }

        /* Modern Blog Cards */
        .jp-blog-section .blog-wrap {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            position: relative;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(38, 123, 250, 0.1);
            height: 100%;
        }

        .jp-blog-section .blog-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(38, 123, 250, 0.05) 0%,
                    rgba(62, 136, 248, 0.03) 100%);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .jp-blog-section .blog-wrap:hover::before {
            opacity: 1;
        }

        .jp-blog-section .blog-wrap:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Image Part */
        .jp-blog-section .img-part {
            position: relative;
            overflow: hidden;
            border-radius: 20px 20px 0 0;
        }

        .jp-blog-section .img-part img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.4s ease;
            filter: brightness(1) contrast(1.1);
        }

        .jp-blog-section .blog-wrap:hover .img-part img {
            transform: scale(1.1);
            filter: brightness(1.1) contrast(1.2);
        }

        /* Overlay Effect */
        .jp-blog-section .img-part::after {
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
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .jp-blog-section .fly-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .jp-blog-section .fly-btn a {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #267bfa;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .jp-blog-section .fly-btn a:hover {
            background: #267bfa;
            color: white;
            transform: scale(1.1);
        }

        .jp-blog-section .blog-wrap:hover .img-part::after {
            opacity: 1;
        }

        .jp-blog-section .blog-wrap:hover .fly-btn {
            opacity: 1;
        }

        /* Content Part */
        .jp-blog-section .content-part {
            padding: 25px;
            position: relative;
            z-index: 2;
        }

        /* Categories */
        .jp-blog-section .categories {
            display: inline-block;
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            color: white !important;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .jp-blog-section .categories:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(38, 123, 250, 0.3);
            color: white !important;
        }

        /* Title */
        .jp-blog-section .content-part .title {
            margin: 0 0 15px 0;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.4;
        }

        .jp-blog-section .content-part .title a {
            color: #1e293b;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .jp-blog-section .content-part .title a:hover {
            color: #267bfa;
        }

        /* Blog Meta */
        .jp-blog-section .blog-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(38, 123, 250, 0.1);
        }

        .jp-blog-section .user-data {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .jp-blog-section .user-data img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            object-fit: cover;
        }

        .jp-blog-section .user-data span {
            font-size: 13px;
            color: #64748b;
            font-weight: 500;
        }

        .jp-blog-section .date {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #64748b;
        }

        .jp-blog-section .date i {
            color: #267bfa;
            font-size: 12px;
        }

        /* Button Part */
        .jp-blog-section .btn-part .readon {
            background: linear-gradient(135deg, #267bfa, #0d6efd);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(38, 123, 250, 0.3);
            display: inline-block;
        }

        .jp-blog-section .btn-part .readon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.3s ease;
        }

        .jp-blog-section .btn-part .readon:hover::before {
            left: 100%;
        }

        .jp-blog-section .btn-part .readon:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(38, 123, 250, 0.4);
            color: white;
        }

        /* Carousel Dots Enhancement */
        .jp-blog-section .owl-dots {
            text-align: center;
            margin-top: 40px;
        }

        .jp-blog-section .owl-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(38, 123, 250, 0.3);
            margin: 0 6px;
            transition: all 0.3s ease;
            border: none;
        }

        .jp-blog-section .owl-dot.active {
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            transform: scale(1.2);
        }

        .jp-blog-section .owl-dot:hover {
            background: rgba(38, 123, 250, 0.6);
            transform: scale(1.1);
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .jp-blog-section .img-part img {
                height: 200px;
            }
        }

        @media (max-width: 768px) {
            .jp-blog-section .img-part img {
                height: 180px;
            }

            .jp-blog-section .content-part {
                padding: 20px;
            }

            .jp-blog-section .blog-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        @media (max-width: 576px) {
            .jp-blog-section .img-part img {
                height: 160px;
            }

            .jp-blog-section .content-part .title {
                font-size: 16px;
            }

            .jp-blog-section .sec-title .title {
                font-size: 2rem;
            }
        }

        /* Animation for blog items */
        .jp-blog-section .blog-wrap {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .jp-blog-section .blog-wrap.jp-animate {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered animation delay */
        .jp-blog-section .blog-wrap:nth-child(1) {
            transition-delay: 0.1s;
        }

        .jp-blog-section .blog-wrap:nth-child(2) {
            transition-delay: 0.2s;
        }

        .jp-blog-section .blog-wrap:nth-child(3) {
            transition-delay: 0.3s;
        }

        /* Modern Footer Section */
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

        /* Newsletter Section */
        .jp-footer .footer-newsletter {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
        }

        .jp-footer .footer-newsletter::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #267bfa, #3e88f8, #0d6efd, #3e88f8, #267bfa);
            background-size: 400% 100%;
            animation: gradient-slide 3s ease-in-out infinite;
        }

        .jp-footer .footer-newsletter .title {
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0;
            position: relative;
        }

        .jp-footer .footer-newsletter .title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            border-radius: 2px;
        }

        /* Newsletter Form */
        .jp-footer .newsletter-form {
            display: flex;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .jp-footer .newsletter-form:focus-within {
            border-color: #267bfa;
            box-shadow: 0 0 20px rgba(38, 123, 250, 0.3);
        }

        .jp-footer .newsletter-form input {
            flex: 1;
            background: transparent;
            border: none;
            padding: 15px 20px;
            color: #ffffff;
            font-size: 14px;
            outline: none;
        }

        .jp-footer .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .jp-footer .newsletter-form button {
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            border: none;
            padding: 15px 20px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .jp-footer .newsletter-form button:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            transform: scale(1.05);
        }

        /* Footer Content */
        .jp-footer .footer-content {
            position: relative;
            z-index: 2;
        }

        /* Footer Widgets */
        .jp-footer .footer-widget {
            margin-bottom: 40px;
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

        /* About Widget */
        .jp-footer .about-widget .logo-part img {
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .jp-footer .about-widget .logo-part img:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 35px rgba(38, 123, 250, 0.3);
        }

        .jp-footer .about-widget .desc {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
            margin: 20px 0;
            font-size: 15px;
        }

        .jp-footer .about-widget .readon {
            background: linear-gradient(135deg, #267bfa, #3e88f8);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(38, 123, 250, 0.3);
        }

        .jp-footer .about-widget .readon:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(38, 123, 250, 0.4);
            color: white;
        }

        /* Address Widget */
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

        /* Footer Posts */
        .jp-footer .footer-post {
            margin-top: 10px;
        }

        .jp-footer .post-wrap {
            display: flex;
            gap: 15px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .jp-footer .post-wrap:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(38, 123, 250, 0.3);
            transform: translateX(5px);
        }

        .jp-footer .post-img {
            flex-shrink: 0;
        }

        .jp-footer .post-img img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .jp-footer .post-wrap:hover .post-img img {
            transform: scale(1.1);
        }

        .jp-footer .post-desc {
            flex: 1;
        }

        .jp-footer .post-desc a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            line-height: 1.4;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 8px;
        }

        .jp-footer .post-desc a:hover {
            color: #3e88f8;
        }

        .jp-footer .date-post {
            display: flex;
            align-items: center;
            gap: 5px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
        }

        .jp-footer .date-post i {
            color: #267bfa;
            font-size: 10px;
        }

        /* Footer Bottom */
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

        /* Social Links */
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

        /* Animations */
        @keyframes gradient-slide {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .jp-footer .footer-newsletter {
                padding: 30px 20px;
            }

            .jp-footer .footer-newsletter .title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .jp-footer .footer-newsletter {
                text-align: center;
            }

            .jp-footer .footer-newsletter .newsletter-form {
                margin-top: 20px;
            }

            .jp-footer .footer-social {
                justify-content: center;
            }

            .jp-footer .address-widget li {
                padding: 12px;
            }

            .jp-footer .post-wrap {
                padding: 12px;
            }
        }

        @media (max-width: 576px) {
            .jp-footer .footer-newsletter .title {
                font-size: 1.3rem;
            }

            .jp-footer .newsletter-form {
                flex-direction: column;
                border-radius: 12px;
            }

            .jp-footer .newsletter-form input {
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }

            .jp-footer .newsletter-form button {
                border-radius: 0 0 12px 12px;
            }
        }

        /* Alternative CSS dengan flexbox approach */
        .jp-about-section-alt {
            position: relative;
            padding: 100px 0;
        }

        .jp-about-section-alt .container {
            position: relative;
        }

        .jp-about-section-alt .row {
            display: flex;
            align-items: center;
            min-height: 500px;
            position: relative;
        }

        .jp-about-section-alt .images-part {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 25px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.9));
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            z-index: 10;
        }

        .jp-about-section-alt .images-part img {
            width: 100%;
            height: auto;
            border-radius: 12px;
        }

        /* Responsive breakpoints */
        @media (max-width: 1200px) {
            .jp-about-section-alt .images-part {
                width: 350px;
            }
        }

        @media (max-width: 991.98px) {
            .jp-about-section-alt .images-part {
                position: static;
                transform: none;
                width: 100%;
                max-width: 400px;
                margin: 30px auto;
                order: -1;
                /* Pindah ke atas pada mobile */
            }

            .jp-about-section-alt .row {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .jp-about-section-alt .images-part {
                max-width: 350px;
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .jp-about-section-alt .images-part {
                max-width: 300px;
                padding: 15px;
            }
        }
    </style>
</head>

<body class="defult-home">

    <!-- Preloader area start here -->
    <div id="loader" class="loader">
        <div class="spinner"></div>
    </div>
    <!--End preloader here -->

    <!--Full width header Start-->
    <div class="full-width-header">
        <!-- Toolbar Start -->
        <div class="toolbar-area hidden-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="toolbar-contact">
                            <ul>
                                @if (getStaticContent('email'))
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <a href="mailto:{{ getStaticContent('email') }}">
                                            {{ getStaticContent('email') }}
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('phone'))
                                    <li>
                                        <i class="flaticon-call"></i>
                                        <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank">
                                            {{ getStaticContent('phone') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="toolbar-sl-share">
                            <ul>
                                @if (getStaticContent('workingHour'))
                                    <li class="opening">
                                        <i class="flaticon-clock"></i>
                                        {{ getStaticContent('workingHour') }}
                                    </li>
                                @endif

                                @if (getStaticContent('facebook'))
                                    <li>
                                        <a href="{{ getStaticContent('facebook') }}" target="_blank">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('twitter'))
                                    <li>
                                        <a href="{{ getStaticContent('twitter') }}" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('youtube'))
                                    <li>
                                        <a href="{{ getStaticContent('youtube') }}" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('instagram'))
                                    <li>
                                        <a href="{{ getStaticContent('instagram') }}" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('tiktok'))
                                    <li>
                                        <a href="{{ getStaticContent('tiktok') }}" target="_blank">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toolbar End -->

        <!--Header Start-->
        @include('frontend.layouts.header')
        <!--Header End-->
    </div>
    <!--Full width header End-->

    <!-- Main content Start -->
    <div class="main-content">
        @yield('content')
    </div>
    <!-- Main content End -->

    <!-- Footer Start -->
    @include('frontend.layouts.footer')
    <!-- Footer End -->

    <!-- start scrollUp  -->
    <div id="scrollUp"><i class="fa fa-angle-up"></i></div>

    <!-- End scrollUp  -->

    <!-- Floating WhatsApp -->
    @if (getStaticContent('phone'))
        <div class="jp-wa-float">
            <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank"
                aria-label="WhatsApp Jalin Pertambangan">
                <i class="fa fa-whatsapp"></i>
                WhatsApp
                <span class="wa-badge">Chat JP</span>
            </a>
        </div>
    @endif

    <!-- Search Modal Start -->
    <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                class="flaticon-cross"></span></button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group"><input class="form-control" placeholder="Search Here..."
                                type="text" required><button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->

    <!-- Swiper JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        // Reduce motion respect
        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const heroSwiper = new Swiper('.jp-hero-swiper', {
            loop: true,
            speed: prefersReduced ? 300 : 700,
            autoplay: prefersReduced ? false : {
                delay: 5500,
                disableOnInteraction: false
            },
            effect: 'slide',
            grabCursor: true,
            slidesPerView: 1,
            spaceBetween: 24,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            // Pause autoplay on pointer hover (desktop)
            on: {
                init() {
                    const el = document.querySelector('.jp-hero-swiper');
                    if (el && this.autoplay) {
                        el.addEventListener('mouseenter', () => this.autoplay.stop());
                        el.addEventListener('mouseleave', () => this.autoplay.start());
                    }
                }
            }
        });
    </script>


    <!-- JS (dipertahankan) -->
    <x-sweetalert />
    <x-custom-scripts />

    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/rsmenu-main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/inc/custom-slider/js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/contact.form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('js')
    <script>
        // Tahun dinamis di footer
        (function() {
            var y = document.querySelector('.jp-year');
            if (y) {
                y.textContent = new Date().getFullYear();
            }
        })();
    </script>

    <!-- Ganti bagian offcanvas yang ada dengan versi modern -->
    <!-- Modern Offcanvas Menu -->
    <nav class="jp-offcanvas" id="jp-offcanvas">
        <div class="jp-offcanvas-header">
            <div class="jp-offcanvas-logo">
                <a href="index.html">
                    <img src="assets/logo_bg.png" alt="Jalin Pertambangan Logo">
                </a>
            </div>
            <button class="jp-offcanvas-close" id="jp-offcanvas-close" aria-label="Close Menu">
                <i class="fa fa-times"></i>
            </button>
        </div>

        <div class="jp-offcanvas-content">
            <div class="jp-offcanvas-description">
                <p>Konsultan pertambangan untuk tata kelola, produktivitas, dan transformasi operasi. JP membantu Anda
                    merancang strategi yang adaptif, responsif, dan inovatif.</p>
            </div>

            <div class="jp-offcanvas-nav">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="#home" class="jp-scroll">Home</a></li>
                    <li><a href="#news" class="jp-scroll">News</a></li>
                    <li><a href="#about_us" class="jp-scroll">About Us</a></li>
                    <li><a href="#our-expert" class="jp-scroll">Our Expert</a></li>
                    <li><a href="#our-services" class="jp-scroll">Our Services</a></li>
                    <li><a href="#contact" class="jp-scroll">Contact</a></li>
                </ul>
            </div>

            <div class="jp-offcanvas-contact">
                <h3>Kontak Kami</h3>
                <ul>
                    <li>
                        <i class="flaticon-location"></i>
                        <div>
                            <strong>Alamat</strong>
                            <div>Kompleks Perumahan Taman Kota, Jl. Batu Dinding Blok D 3, Air Itam, Bukit Intan,
                                Pangkalpinang, Bangka Belitung</div>
                        </div>
                    </li>
                    <li>
                        <i class="flaticon-call"></i>
                        <div>
                            <strong>Telepon/WA</strong>
                            <a href="https://wa.me/6281943290320" target="_blank">(+62) 819-4329-0320</a>
                        </div>
                    </li>
                    <li>
                        <i class="flaticon-email"></i>
                        <div>
                            <strong>Email</strong>
                            <a href="mailto:jalinpertambangan@gmail.com">jalinpertambangan@gmail.com</a>
                        </div>
                    </li>
                    <li>
                        <i class="flaticon-clock"></i>
                        <div>
                            <strong>Jam Operasional</strong>
                            <div>09:00 - 18:00 WIB</div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="jp-offcanvas-social">
                <h3>Ikuti Kami</h3>
                <ul>
                    <li><a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" aria-label="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" aria-label="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                    <li><a href="#" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>

            <div class="jp-offcanvas-footer">
                <p>&copy; 2024 Jalin Pertambangan. All Rights Reserved.</p>
            </div>
        </div>
    </nav>

    <!-- Modern Overlay -->
    <div class="jp-offcanvas-overlay" id="jp-offcanvas-overlay"></div>

    <!-- Tambahkan link ke CSS modern offcanvas -->
    <link rel="stylesheet" href="{{ asset('assets/css/modern-offcanvas.css') }}">

    <!-- Tambahkan script modern offcanvas sebelum closing body tag -->
    <script src="{{ asset('assets/js/offcanvas-fix.js') }}"></script>

    <!-- Tambahkan JavaScript untuk blog animation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Blog animation on scroll
            const blogItems = document.querySelectorAll('.jp-blog-section .blog-wrap');

            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('jp-animate');
                    }
                });
            }, observerOptions);

            blogItems.forEach((item) => {
                observer.observe(item);
            });
        });
    </script>
</body>

</html>
