@extends('frontend.app')

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
@endpush

@section('content')
    <section id="home" class="jp-hero">
        <!-- decorative flat blobs -->
        <span class="blob blob-1"></span>
        <span class="blob blob-2"></span>

        <div class="container position-relative">
            <div class="swiper jp-hero-swiper">
                <div class="swiper-wrapper">

                    <!-- ===== Slide 1: Jalin Pertambangan (Consulting) - dari Swiper Hero ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-shield-check"></i> Jalin Pertambangan •
                                    Konsultan</span>
                                <h1 class="title mt-2">Solusi Konsultasi Pertambangan yang Adaptif &amp; Inovatif
                                </h1>
                                <p class="lead mb-3">
                                    Diskusi, edukasi, pelatihan, asistensi, dan pendampingan — fleksibel sesuai
                                    kebutuhan klien.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#our-services" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-rocket-takeoff me-2"></i>Jelajahi Layanan
                                    </a>
                                    <a href="#contact" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-whatsapp me-2"></i>Hubungi via WhatsApp
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-award"></i> IPU & CPI Certified</span>
                                    <span class="chip"><i class="bi bi-people"></i> Corporate & Education</span>
                                    <span class="chip"><i class="bi bi-graph-up-arrow"></i> Strategy &
                                        Governance</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <img src="assets/images/bahan/bahan1.jpg" alt="Mining Strategy Map"
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 2: Konsultan Pertambangan Strategis - dari RS-Slider ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-gear"></i> Konsultan Strategis</span>
                                <h1 class="title mt-2">Konsultan Pertambangan<br>Strategis & Implementatif</h1>
                                <p class="lead mb-3">
                                    Membantu organisasi menavigasi tantangan industri tambang yang cepat berubah
                                    melalui diskusi, edukasi, pelatihan, asistensi, dan pendampingan.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#rs-contact" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-telephone me-2"></i>Hubungi JP
                                    </a>
                                    <a href="#rs-services" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-list-ul me-2"></i>Lihat Layanan
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-shield-check"></i> Strategis &
                                        Implementatif</span>
                                    <span class="chip"><i class="bi bi-arrow-repeat"></i> Adaptif &
                                        Responsif</span>
                                    <span class="chip"><i class="bi bi-lightbulb"></i> Inovatif</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <img src="assets/images/bahan/bahan2.jpg" alt="Tata Kelola & Produktivitas"
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 3: Tata Kelola & Produktivitas - dari RS-Slider ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-graph-up"></i> Tata Kelola &
                                    Produktivitas</span>
                                <h2 class="title">Tata Kelola & Produktivitas Operasi</h2>
                                <p class="lead mb-3">
                                    Pendekatan adaptif–responsif untuk meningkatkan keselamatan, biaya, dan
                                    kualitas; dari pit ke pelabuhan.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#rs-services" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-list-ul me-2"></i>Lihat Layanan
                                    </a>
                                    <a href="#contact" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-calendar-check me-2"></i>Konsultasi Awal
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-shield"></i> Keselamatan</span>
                                    <span class="chip"><i class="bi bi-currency-dollar"></i> Efisiensi
                                        Biaya</span>
                                    <span class="chip"><i class="bi bi-award"></i> Kualitas</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <div class="text-center p-4">
                                        <i class="bi bi-diagram-3" style="font-size:48px"></i>
                                        <h5 class="mt-3 mb-1">Pit-to-Port Excellence</h5>
                                        <p class="mb-0" style="opacity:.8">Mining • Processing • Logistics</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 4: Our Expert highlight - dari Swiper Hero ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-person-badge"></i> Our Expert</span>
                                <h2 class="title">Dr. Ir. Ichwan Azwardi, S.T., M.T., IPU</h2>
                                <p class="lead mb-3">
                                    Ahli pertambangan dengan pengalaman komprehensif: eksplorasi, operasi, strategi,
                                    hingga transformasi korporasi.
                                </p>
                                <div class="row text-center gy-3">
                                    <div class="col-4">
                                        <div class="py-3 px-2 rounded-3" style="background:rgba(255,255,255,.12);">
                                            <div class="fw-bold fs-4">25+</div>
                                            <small>Thn Pengalaman</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-3 px-2 rounded-3" style="background:rgba(255,255,255,.12);">
                                            <div class="fw-bold fs-4">10+</div>
                                            <small>Peran Strategis</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-3 px-2 rounded-3" style="background:rgba(255,255,255,.12);">
                                            <div class="fw-bold fs-4">CPI</div>
                                            <small>Competent Person</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap cta-wrap mt-3">
                                    <a href="#our-expert" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-info-circle me-2"></i>Profil Lengkap
                                    </a>
                                    <a href="#news" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-newspaper me-2"></i>Latest Updates
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <div class="text-center p-4">
                                        <i class="bi bi-magnet" style="font-size:48px"></i>
                                        <h5 class="mt-3 mb-1">Operational Excellence</h5>
                                        <p class="mb-0" style="opacity:.8">Exploration • Supply • Transformation
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 5: CTA strong - dari Swiper Hero ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-lightning-charge"></i> Mulai
                                    Kolaborasi</span>
                                <h2 class="title">Jadwalkan Sesi Konsultasi Sesuai Kebutuhan Anda</h2>
                                <p class="lead mb-3">
                                    Pilih format: Diskusi singkat, Pelatihan intensif, atau Pendampingan
                                    berkelanjutan — onsite maupun daring.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#contact" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-calendar-check me-2"></i>Jadwalkan Sekarang
                                    </a>
                                    <a href="https://wa.me/6281943290320?text=Halo%20Jalin%20Pertambangan%2C%20saya%20ingin%20konsultasi."
                                        target="_blank" rel="noopener" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-whatsapp me-2"></i>WhatsApp JP
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-laptop"></i> Online / Onsite</span>
                                    <span class="chip"><i class="bi bi-translate"></i> Bahasa Indonesia</span>
                                    <span class="chip"><i class="bi bi-shield-lock"></i> Privasi Terjaga</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <div class="text-center p-4">
                                        <i class="bi bi-headset" style="font-size:48px"></i>
                                        <h5 class="mt-3 mb-1">Client Relation</h5>
                                        <p class="mb-0" style="opacity:.8">+62 819-4329-0320 •
                                            jalinpertambangan@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination & Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev" aria-label="Previous slide"></div>
                <div class="swiper-button-next" aria-label="Next slide"></div>
            </div>
        </div>
    </section>

    <!-- Hapus rs-slider yang lama -->
    <!--
                                                                                    <div id="rs-slider" class="rs-slider slider1">
                                                                                      <div class="bend niceties">
                                                                                        <div id="nivoSlider" class="slides">
                                                                                          <img src="assets/images/bahan/bahan1.jpg" alt="JP Hero" title="#slide-1" />
                                                                                          <img src="assets/images/bahan/bahan2.jpg" alt="JP Hero 2" title="#slide-2" />
                                                                                        </div>
                                                                                        ...
                                                                                              </div>
                                                                                              </div>
                                                                                    -->

    <!-- Services Mini Section Start -->
    <div class="rs-services style1 pt-100 pb-84 md-pt-80 md-pb-64">
        <div class="container">
            <div class="row gutter-16">
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/1.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Solution Focused</a></h5>
                            <div class="desc">Solusi praktis untuk isu eksplorasi, operasi, hingga hilir—bukan
                                sekadar laporan.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/2.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Client Oriented</a></h5>
                            <div class="desc">Pendekatan fleksibel: diskusi, coaching, workshop, dan pendampingan
                                onsite/online.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/3.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Best Practice</a></h5>
                            <div class="desc">Mengacu CIP/PI, K3L, serta praktik global untuk operasi tambang
                                berkelanjutan.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/4.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Decision Maker</a></h5>
                            <div class="desc">Mendukung manajemen dalam pengambilan keputusan berbasis data &
                                risiko.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Mini Section End -->

    <!-- Div About -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-about style1 bg1 md-pt-80 jp-about-section">
        <div class="container">
            <div class="row y-bottom">
                <div class="col-lg-6 md-mb-50">
                    <div class="images-part"><img src="assets/images/bahan/bahan13.jpg" alt="about jp"></div>
                </div>
                <div class="col-lg-6 pl-66 pt-75 pb-75 md-pt-42 md-pb-72">
                    <div class="sec-title mb-47 md-mb-42">
                        <div class="sub-title primary">Tentang JP</div>
                        <h2 class="title mb-0">Membantu Perusahaan Tambang Menjadi Adaptif, Responsif, & Inovatif
                        </h2>
                    </div>
                    <div class="services-part mb-30">
                        <div class="services-icon"><img src="assets/images/about/icons/1.png" alt="image">
                        </div>
                        <div class="services-text">
                            <h4 class="title">Pendekatan Menyeluruh</h4>
                            <div class="desc">JP mendampingi melalui <strong>Diskusi</strong>,
                                <strong>Edukasi</strong>, <strong>Pelatihan</strong>, <strong>Asistensi</strong>,
                                dan <strong>Pendampingan</strong> untuk memperkuat kinerja organisasi.
                            </div>
                        </div>
                    </div>
                    <div class="services-part mb-30">
                        <div class="services-icon"><img src="assets/images/about/icons/2.png" alt="image">
                        </div>
                        <div class="services-text">
                            <h4 class="title">Dipimpin Ahli Industri</h4>
                            <div class="desc">Dikelola oleh <strong>Dr. Ir. Ichwan Azwardi S.T., M.T.,
                                    IPU</strong> — berlatar ITB (S1–S3), IPU (PII), CPI (PERHAPI), dan pengalaman
                                eksekutif di PT Timah Tbk serta kolaborasi kebijakan dengan Kementerian ESDM.</div>
                        </div>
                    </div>
                    <div>
                        <ul class="btn-part">
                            <li><a class="readon2 get-new" href="#rs-services">Lihat Layanan</a></li>
                            <li>
                                <div class="video-btn seo-agency text-center">
                                    <a class="popup-videos" href="https://www.youtube.com/watch?v=YLN1Argi7ik"><i
                                            class="fa fa-play"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Services Section Start (dikontekskan JP) -->
    @if ($services->isNotEmpty())
        <div id="rs-services" class="rs-services style1 modify pt-92 pb-84 md-pt-72 md-pb-64">
            <div class="container">
                <div class="sec-title text-center mb-47 md-mb-42">
                    <div class="sub-title primary">Layanan</div>
                    <h2 class="title mb-0">Layanan Utama JP</h2>
                </div>
                <div class="row gutter-16">
                    @foreach ($services ?? [] as $service)
                        <div class="col-lg-3 col-sm-6 mb-16">
                            <div class="service-wrap">
                                <div class="icon-part">
                                    <img src="{{ $service->icon_url }}" alt="{{ $service->name }}">
                                </div>
                                <div class="content-part">
                                    <h5 class="title">
                                        <a href="javascript:void(0)">
                                            {{ $service->name }}
                                        </a>
                                    </h5>
                                    <div class="desc">
                                        {{ $service->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    <!-- Services Section End -->

    <!-- Why Choose (Strategy) -->
    <!-- Update HTML untuk Why Choose Us section -->
    <div class="rs-whychooseus style8 bg31 jp-whychoose-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 md-mb-50">
                    <div class="sec-title3 mb-40">
                        <span class="sub-title">~ <span class="title-upper">Keunggulan</span> ~</span>
                        <h2 class="title">Menggabungkan Strategi & Eksekusi</h2>
                    </div>
                    <div class="services-part mb-40">
                        <div class="services-icon"><i class="fa fa-briefcase"></i></div>
                        <div class="services-text">
                            <div class="services-title">
                                <h3 class="title"><a href="#">Insight Governance</a></h3>
                            </div>
                            <p class="services-txt">Perspektif kebijakan & hubungan industrial untuk mitigasi
                                risiko.</p>
                        </div>
                    </div>
                    <div class="services-part mb-40">
                        <div class="services-icon"><i class="fa fa-signal"></i></div>
                        <div class="services-text">
                            <div class="services-title">
                                <h3 class="title"><a href="#">Result-Oriented</a></h3>
                            </div>
                            <p class="services-txt">Fokus pada outcome biaya, kualitas, keselamatan, & target
                                produksi.</p>
                        </div>
                    </div>
                    <div class="services-part">
                        <div class="services-icon"><i class="fa fa-users"></i></div>
                        <div class="services-text">
                            <div class="services-title">
                                <h3 class="title"><a href="#">Capability Building</a></h3>
                            </div>
                            <p class="services-txt">Transfer pengetahuan agar tim mandiri & berkelanjutan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pl-70 md-pl-15">
                    <div class="images-part">
                        <img src="assets/images/bahan/bahan1.jpg" alt="Strategy & Execution">
                    </div>
                    <div class="rs-animations">
                        <div class="shape-icons one"></div>
                        <div class="shape-icons two"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Why Choose -->


    <!-- Portfolio Section Start (disesuaikan pertambangan) -->
    <div id="rs-portfolio" class="rs-portfolio style1">
        <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="4" data-margin="22"
            data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
            data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
            data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
            data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2"
            data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-lg-device="4"
            data-md-device-nav="false" data-md-device-dots="true">
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/1.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Operasi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Optimasi Produksi Timah Darat</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/2.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Eksplorasi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Evaluasi Prospek Emas-Tembaga</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/3.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Governance</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Review SOP & Kepatuhan PKB</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/4.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">K3L</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Program Peningkatan Keselamatan</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/5.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Transformasi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Kantor Transformasi Korporat</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/6.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Rantai Pasok</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Pit-to-Port Optimization</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/7.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Pelatihan</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Workshop Manajemen Tambang</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/8.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Studi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Estimasi Cadangan (CPI)</a></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Section End -->

    <!-- Skillbar Section Start (reword) -->
    <div class="rs-skillbar style1 pt-92 pb-100 md-pt-72 md-pb-80 sm-pt-80" style="margin-bottom: 250px;">
        <div class="container">
            <div class="gray-bg">
                <div class="row">
                    <div class="col-lg-6 content-part">
                        <div class="sec-title mb-35 md-mb-30">
                            <div class="sub-title primary">MULAI DARI SINI</div>
                            <h2 class="title mb-0">Tingkatkan Kinerja Operasi Anda</h2>
                        </div>
                        <div class="cl-skill-bar">
                            <span class="skillbar-title">Tata Kelola & Kepatuhan</span>
                            <div class="skillbar" data-percent="90">
                                <p class="skillbar-bar"></p><span class="skill-bar-percent"></span>
                            </div>
                            <span class="skillbar-title">Perencanaan & Kontrol Produksi</span>
                            <div class="skillbar" data-percent="85">
                                <p class="skillbar-bar"></p><span class="skill-bar-percent"></span>
                            </div>
                            <span class="skillbar-title">Pengembangan SDM & Pelatihan</span>
                            <div class="skillbar" data-percent="88">
                                <p class="skillbar-bar"></p><span class="skill-bar-percent"></span>
                            </div>
                            <div class="btn-part mt-60"><a class="readon" href="#rs-contact">Konsultasi Awal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pl-0 md-order-first md-pl-pr-15">
                        <div class="bg-part md-pt-200 md-pb-200"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Skillbar Section End -->

    <!-- Testimonial Section Start (ringkas & relevan) -->
    <hr>
    <div class="rs-testimonial style11 gray-bg pt-92 md-pt-72">
        <div class="container">
            <div class="sec-title3 text-center mb-40">
                <span class="sub-title">~ <span class="title-upper">Testimoni</span> ~</span>
                <h2 class="title">Apa Kata Klien</h2>
            </div>
            <div class="testi-main-part bg32">
                <div class="slick-part single-product-slider">
                    <div class="slider slider-for">
                        <div class="images-slide-single">
                            <div class="single-testimonial">
                                <div class="content-part"><img class="quote"
                                        src="assets/images/testimonial/qoute-icon2.png" alt="">
                                    <p>"Pendampingan JP membantu kami menaikkan output sambil merapikan SOP & K3L."
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="images-slide-single">
                            <div class="single-testimonial">
                                <div class="content-part"><img class="quote"
                                        src="assets/images/testimonial/qoute-icon2.png" alt="">
                                    <p>"Workshop PPC sangat aplikatif—target produksi bulanan menjadi lebih
                                        konsisten."</p>
                                </div>
                            </div>
                        </div>
                        <div class="images-slide-single">
                            <div class="single-testimonial">
                                <div class="content-part"><img class="quote"
                                        src="assets/images/testimonial/qoute-icon2.png" alt="">
                                    <p>"Insight governance JP memperkaya mitigasi risiko hukum & hubungan
                                        industrial."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider slider-nav">
                        <div class="images-single"><img src="assets/images/testimonial/avatar/1.jpg" alt="">
                            <div class="testi-content">
                                <div class="testi-name">Manager Operasi</div><span class="testi-title">Timah</span>
                            </div>
                        </div>
                        <div class="images-single"><img src="assets/images/testimonial/avatar/2.jpg" alt="">
                            <div class="testi-content">
                                <div class="testi-name">Head of Mining</div><span class="testi-title">Au-Cu</span>
                            </div>
                        </div>
                        <div class="images-single"><img src="assets/images/testimonial/avatar/3.jpg" alt="">
                            <div class="testi-content">
                                <div class="testi-name">Direktur</div><span class="testi-title">Holding
                                    Minerba</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section End -->

    <!-- Partner/Affiliation Section -->
    <div class="rs-partner gray-bg pt-70 pb-98 md-pb-80">
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-center-mode="false" data-mobile-device="2" data-ipad-device="3"
                data-ipad-device2="2" data-md-device="4">
                <div class="partner-item"><a href="#"><img src="assets/images/partner/1.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/2.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/3.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/4.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/5.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Section End -->

    <!-- Team Section (optional placeholder, dipertahankan) -->
    <div id="our-expert" class="rs-team slider1 pt-92 pb-92 md-pt-72 md-pb-50">
        <div class="container">
            <div class="sec-title text-center mb-60 md-mb-42">
                <div class="sub-title primary">Expert</div>
                <h2 class="title mb-14">Our Expert</h2>
                <div class="desc">Dipimpin oleh Dr. Ir. Ichwan Azwardi S.T., M.T., IPU — CPI (PERHAPI), IPU
                    (PII), pengalaman eksekutif & kebijakan minerba.</div>
            </div>
            <!-- carousel bawaan dibiarkan -->
            <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="4" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="true" data-nav="false" data-center-mode="false" data-mobile-device="1" data-ipad-device="2"
                data-ipad-device2="2" data-md-device="3" data-lg-device="4">
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/1.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Dr. Ir. Ichwan Azwardi</a></h4>
                        <span class="designation">Founder & Principal</span>
                    </div>
                </div>
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/2.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Mining Trainer</a></h4>
                        <span class="designation">Instructor</span>
                    </div>
                </div>
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/3.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Ops Consultant</a></h4>
                        <span class="designation">Advisor</span>
                    </div>
                </div>
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/4.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Geo Specialist</a></h4>
                        <span class="designation">Geologist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Contact Section Start -->
    <div id="rs-contact" class="rs-contact style1 gray-bg pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="white-bg">
                <div class="row">
                    <div class="col-lg-8 form-part">
                        <div class="sec-title mb-35 md-mb-30">
                            <div class="sub-title primary">HUBUNGI KAMI</div>
                            <h2 class="title mb-0">Kirim Pesan</h2>
                        </div>
                        <div id="form-messages"></div>
                        <form id="feedbackForm" class="contact-form" method="post"
                            action="{{ route('feedback.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="text" name="name" id="name" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="email" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="text" name="phone" id="phone"
                                            placeholder="No. Telepon/WA">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="text" name="company" id="company" placeholder="Perusahaan">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="common-control">
                                        <textarea name="message" id="message"
                                            placeholder="Jenis kebutuhan (Diskusi/Edukasi/Pelatihan/Asistensi/Pendampingan) & waktu yang diinginkan"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-btn">
                                        <button type="submit" class="readon">
                                            {{ __('Kirim') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 pl-0 md-pl-pr-15 md-order-first">
                        <div class="contact-info">
                            <h3 class="title">Info Kontak</h3>

                            @if (getStaticContent('address'))
                                <div class="info-wrap mb-20">
                                    <div class="icon-part"><i class="flaticon-location"></i></div>
                                    <div class="content-part">
                                        <h4>Kantor</h4>
                                        {{ getStaticContent('address') }}
                                    </div>
                                </div>
                            @endif

                            @if (getStaticContent('phone'))
                                <div class="info-wrap mb-20">
                                    <div class="icon-part"><i class="flaticon-call"></i></div>
                                    <div class="content-part">
                                        <h4>Telepon/WA</h4>
                                        <p>
                                            <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank">
                                                {{ getStaticContent('phone') }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (getStaticContent('email'))
                                <div class="info-wrap mb-20">
                                    <div class="icon-part"><i class="flaticon-email"></i></div>
                                    <div class="content-part">
                                        <h4>Email</h4>
                                        <p>
                                            <a href="mailto:{{ getStaticContent('email') }}">
                                                {{ getStaticContent('email') }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (getStaticContent('workingHour'))
                                <div class="info-wrap">
                                    <div class="icon-part"><i class="flaticon-clock"></i></div>
                                    <div class="content-part">
                                        <h4>Jam Operasional</h4>
                                        <p>{{ getStaticContent('workingHour') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

    <!-- Blog/Insights Section Start (konten disesuaikan) -->
    <div class="rs-blog style1 pt-91 pb-92 md-pt-71 md-pb-72 sm-pb-75 jp-blog-section">
        <div class="container">
            <div class="row y-middle mb-53 md-mb-40 sm-mb-50">
                <div class="col-md-6 sm-mb-22">
                    <div class="sec-title">
                        <span class="sub-title primary right-line">INSIGHT TERBARU</span>
                        <h2 class="title mb-0">Artikel & Pembelajaran</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-part text-right sm-text-left">
                        <a class="readon" href="blog-single.html">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="3" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="true" data-nav="false" data-center-mode="false" data-mobile-device="1" data-ipad-device="2"
                data-ipad-device2="1" data-md-device="3" data-lg-device="3">
                @foreach ($posts as $post)
                    <div class="blog-wrap">
                        <div class="img-part">
                            <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}">
                            <div class="fly-btn">
                                <a href="blog-single.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                        <div class="content-part">
                            @if ($post->category)
                                <a class="categories" href="blog-single.html">{{ $post->category->name }}</a>
                            @endif

                            <h3 class="title">
                                <a href="blog-single.html">{{ $post->title }}</a>
                            </h3>

                            <div class="blog-meta">
                                <div class="user-data">
                                    <img src="https://ui-avatars.com/api/?name={{ $post->user->name }}"
                                        alt="{{ $post->user->name }}">
                                    <span>{{ $post->user->name }}</span>
                                </div>
                                <div class="date">
                                    <i class="fa fa-clock-o"></i> {{ $post->created_at->translatedFormat('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Section End -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#feedbackForm', function(e) {
                e.preventDefault();

                const $form = $(this);
                const $submitBtn = $form.find('[type="submit"]');
                const originalBtnHtml = $submitBtn.html();

                $form.find('.is-invalid').removeClass('is-invalid border border-danger');

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#feedbackForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);
                        $form.trigger('reset');
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#feedbackForm', originalBtnHtml);
                    }
                });
            });
        });
    </script>
@endpush
