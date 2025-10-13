@extends('frontend.app')

@section('title', __('Layanan Kami'))

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

            --success-500: #10b981;
            --warning-500: #f59e0b;
            --error-500: #ef4444;

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

            --font-size-xs: 0.75rem;
            --font-size-sm: 0.875rem;
            --font-size-base: 1rem;
            --font-size-lg: 1.125rem;
            --font-size-xl: 1.25rem;
            --font-size-2xl: 1.5rem;
            --font-size-3xl: 1.875rem;
            --font-size-4xl: 2.25rem;

            --border-radius-sm: 0.375rem;
            --border-radius-md: 0.5rem;
            --border-radius-lg: 0.75rem;
            --border-radius-xl: 1rem;
            --border-radius-2xl: 1.5rem;
            --border-radius-full: 9999px;

            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* ===== MODERN SERVICES STYLING ===== */
        .jp-services-section {
            position: relative;
            background: linear-gradient(135deg,
                    rgba(248, 250, 252, 0.95) 0%,
                    rgba(255, 255, 255, 0.9) 100%);
            overflow: hidden;
        }

        .jp-services-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(38, 123, 250, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(14, 165, 233, 0.02) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Modern Breadcrumbs */
        .jp-breadcrumbs {
            position: relative;
            background: linear-gradient(135deg,
                    var(--primary-600) 0%,
                    var(--primary-700) 100%);
            padding: 120px 0 80px;
            overflow: hidden;
        }

        .jp-breadcrumbs::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
        }

        .jp-breadcrumbs-title {
            font-size: var(--font-size-4xl);
            font-weight: 700;
            color: white;
            margin-bottom: var(--space-4);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .jp-breadcrumbs-desc {
            font-size: var(--font-size-lg);
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
        }

        /* Modern Section Title */
        .jp-section-title {
            position: relative;
            z-index: 2;
            margin-bottom: var(--space-16);
        }

        .jp-section-subtitle {
            font-size: var(--font-size-lg);
            font-weight: 600;
            color: var(--primary-600);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: var(--space-4);
            position: relative;
        }

        .jp-section-subtitle::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg,
                    var(--primary-400) 0%,
                    var(--primary-600) 100%);
            border-radius: 2px;
        }

        .jp-section-main-title {
            font-size: var(--font-size-4xl);
            font-weight: 700;
            color: var(--primary-900);
            margin-bottom: var(--space-6);
            line-height: 1.2;
        }

        .jp-section-description {
            font-size: var(--font-size-lg);
            line-height: 1.7;
            color: var(--secondary-600);
            max-width: 600px;
        }

        /* Modern Service Cards */
        .jp-service-card {
            position: relative;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
        }

        .jp-service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg,
                    var(--primary-500) 0%,
                    var(--primary-400) 50%,
                    var(--primary-600) 100%);
        }

        .jp-service-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .jp-service-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .jp-service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .jp-service-card:hover .jp-service-image img {
            transform: scale(1.05);
        }

        .jp-service-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg,
                    rgba(38, 123, 250, 0.1) 0%,
                    rgba(14, 165, 233, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .jp-service-card:hover .jp-service-image::before {
            opacity: 1;
        }

        .jp-service-content {
            padding: var(--space-8);
            text-align: center;
        }

        .jp-service-title {
            font-size: var(--font-size-xl);
            font-weight: 700;
            color: var(--primary-900);
            margin-bottom: var(--space-4);
            line-height: 1.3;
        }

        .jp-service-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .jp-service-title a:hover {
            color: var(--primary-600);
        }

        .jp-service-description {
            font-size: var(--font-size-base);
            line-height: 1.6;
            color: var(--secondary-600);
            margin-bottom: var(--space-6);
        }

        .jp-service-features {
            list-style: none;
            padding: 0;
            margin: var(--space-6) 0;
        }

        .jp-service-features li {
            position: relative;
            padding-left: var(--space-6);
            margin-bottom: var(--space-2);
            font-size: var(--font-size-sm);
            color: var(--secondary-600);
        }

        .jp-service-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 0;
            color: var(--primary-500);
            font-weight: 700;
        }

        .jp-service-btn {
            display: inline-block;
            padding: var(--space-3) var(--space-6);
            background: linear-gradient(135deg,
                    var(--primary-500) 0%,
                    var(--primary-600) 100%);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius-lg);
            font-size: var(--font-size-sm);
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .jp-service-btn:hover {
            background: linear-gradient(135deg,
                    var(--primary-600) 0%,
                    var(--primary-700) 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        /* Modern CTA Section */
        .jp-cta-section {
            position: relative;
            background: linear-gradient(135deg,
                    var(--primary-700) 0%,
                    var(--primary-800) 100%);
            overflow: hidden;
        }

        .jp-cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
        }

        .jp-cta-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .jp-cta-subtitle {
            font-size: var(--font-size-lg);
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: var(--space-4);
        }

        .jp-cta-title {
            font-size: var(--font-size-4xl);
            font-weight: 700;
            color: white;
            margin-bottom: var(--space-8);
            line-height: 1.2;
        }

        .jp-cta-btn {
            display: inline-block;
            padding: var(--space-4) var(--space-8);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius-lg);
            font-size: var(--font-size-lg);
            font-weight: 600;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .jp-cta-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            color: white;
        }

        /* Modern Quote Form */
        .jp-quote-section {
            position: relative;
            background: linear-gradient(135deg,
                    var(--secondary-800) 0%,
                    var(--secondary-900) 100%);
            overflow: hidden;
        }

        .jp-quote-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(38, 123, 250, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(14, 165, 233, 0.05) 0%, transparent 50%);
        }

        .jp-quote-form {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius-2xl);
            padding: var(--space-12);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .jp-quote-title {
            font-size: var(--font-size-3xl);
            font-weight: 700;
            color: white;
            margin-bottom: var(--space-4);
        }

        .jp-quote-subtitle {
            font-size: var(--font-size-lg);
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: var(--space-8);
        }

        .jp-form-group {
            margin-bottom: var(--space-6);
        }

        .jp-form-input {
            width: 100%;
            padding: var(--space-4);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-lg);
            color: white;
            font-size: var(--font-size-base);
            transition: all 0.3s ease;
        }

        .jp-form-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .jp-form-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary-400);
            box-shadow: 0 0 0 3px rgba(38, 123, 250, 0.1);
        }

        .jp-form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .jp-submit-btn {
            background: linear-gradient(135deg,
                    var(--primary-500) 0%,
                    var(--primary-600) 100%);
            color: white;
            border: none;
            padding: var(--space-4) var(--space-8);
            border-radius: var(--border-radius-lg);
            font-size: var(--font-size-lg);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .jp-submit-btn:hover {
            background: linear-gradient(135deg,
                    var(--primary-600) 0%,
                    var(--primary-700) 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .jp-breadcrumbs {
                padding: 80px 0 60px;
            }

            .jp-breadcrumbs-title {
                font-size: var(--font-size-3xl);
            }

            .jp-section-main-title {
                font-size: var(--font-size-3xl);
            }

            .jp-service-content {
                padding: var(--space-6);
            }

            .jp-quote-form {
                padding: var(--space-8);
            }
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
@endpush

@section('content')
    <hr style="margin-top: 80px;">
    <!-- Breadcrumbs Section Start -->
    <div class="rs-breadcrumbs bg-2 jp-breadcrumbs">
        <div class="container">
            <div class="content-part text-center">
                <h1 class="breadcrumbs-title white-color mb-0 jp-breadcrumbs-title">Layanan Kami</h1>
                <p class="breadcrumbs-desc white-color mt-3 mb-0 jp-breadcrumbs-desc">Solusi konsultasi pertambangan yang
                    komprehensif dan profesional</p>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs Section End -->

    <!-- Premium Services Section Start -->
    <div id="rs-services" class="rs-services style2 gray-bg2 pt-100 pb-70 md-pt-80 md-pb-50 sm-pt-72 jp-services-section">
        <div class="container">
            <div class="sec-title style2 mb-60 md-mb-50 sm-mb-42 jp-section-title">
                <div class="first-half text-right">
                    <div class="sub-title primary jp-section-subtitle">Layanan Premium</div>
                    <h2 class="title mb-0 jp-section-main-title">Solusi Konsultasi Pertambangan</h2>
                </div>
                <div class="last-half">
                    <p class="desc mb-0 pr-50 jp-section-description">Jalin Pertambangan menyediakan layanan konsultasi yang
                        komprehensif untuk membantu perusahaan pertambangan mencapai kinerja optimal melalui pendekatan yang
                        adaptif, responsif, dan inovatif.</p>
                </div>
            </div>
            <div class="row gutter-20">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-wrap jp-service-card">
                        <div class="image-part jp-service-image">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Analisis Bisnis Pertambangan">
                        </div>
                        <div class="content-part text-center jp-service-content">
                            <h3 class="title jp-service-title"><a href="services-single.html">Analisis Bisnis
                                    Pertambangan</a></h3>
                            <div class="desc jp-service-description">Evaluasi menyeluruh terhadap operasi pertambangan untuk
                                mengidentifikasi peluang peningkatan efisiensi dan profitabilitas.</div>
                            <ul class="jp-service-features">
                                <li>Audit operasional</li>
                                <li>Analisis kinerja</li>
                                <li>Rekomendasi strategis</li>
                            </ul>
                            <a href="#" class="jp-service-btn">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-wrap jp-service-card">
                        <div class="image-part jp-service-image">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Pelatihan SDM">
                        </div>
                        <div class="content-part text-center jp-service-content">
                            <h3 class="title jp-service-title"><a href="services-single.html">Pelatihan & Pengembangan
                                    SDM</a></h3>
                            <div class="desc jp-service-description">Program pelatihan khusus untuk meningkatkan kompetensi
                                dan keterampilan sumber daya manusia di industri pertambangan.</div>
                            <ul class="jp-service-features">
                                <li>Pelatihan teknis</li>
                                <li>Pengembangan leadership</li>
                                <li>Sertifikasi profesional</li>
                            </ul>
                            <a href="#" class="jp-service-btn">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-wrap jp-service-card">
                        <div class="image-part jp-service-image">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Tata Kelola Perusahaan">
                        </div>
                        <div class="content-part text-center jp-service-content">
                            <h3 class="title jp-service-title"><a href="services-single.html">Tata Kelola Perusahaan</a>
                            </h3>
                            <div class="desc jp-service-description">Implementasi sistem tata kelola yang baik untuk
                                memastikan transparansi, akuntabilitas, dan kepatuhan regulasi.</div>
                            <ul class="jp-service-features">
                                <li>Corporate governance</li>
                                <li>Risk management</li>
                                <li>Compliance audit</li>
                            </ul>
                            <a href="#" class="jp-service-btn">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-wrap jp-service-card">
                        <div class="image-part jp-service-image">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Strategi Operasional">
                        </div>
                        <div class="content-part text-center jp-service-content">
                            <h3 class="title jp-service-title"><a href="services-single.html">Strategi Operasional</a></h3>
                            <div class="desc jp-service-description">Pengembangan strategi operasional yang efektif untuk
                                mengoptimalkan produktivitas dan mengurangi biaya operasional.</div>
                            <ul class="jp-service-features">
                                <li>Operational planning</li>
                                <li>Process optimization</li>
                                <li>Cost reduction</li>
                            </ul>
                            <a href="#" class="jp-service-btn">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-wrap jp-service-card">
                        <div class="image-part jp-service-image">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Manajemen Proyek">
                        </div>
                        <div class="content-part text-center jp-service-content">
                            <h3 class="title jp-service-title"><a href="services-single.html">Manajemen Proyek</a></h3>
                            <div class="desc jp-service-description">Pendampingan dan manajemen proyek pertambangan dari
                                perencanaan hingga implementasi dengan standar internasional.</div>
                            <ul class="jp-service-features">
                                <li>Project planning</li>
                                <li>Resource management</li>
                                <li>Quality assurance</li>
                            </ul>
                            <a href="#" class="jp-service-btn">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-wrap jp-service-card">
                        <div class="image-part jp-service-image">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Konsultasi Teknis">
                        </div>
                        <div class="content-part text-center jp-service-content">
                            <h3 class="title jp-service-title"><a href="services-single.html">Konsultasi Teknis</a></h3>
                            <div class="desc jp-service-description">Konsultasi teknis khusus untuk mengatasi tantangan
                                operasional dan meningkatkan efisiensi proses pertambangan.</div>
                            <ul class="jp-service-features">
                                <li>Technical assessment</li>
                                <li>Process improvement</li>
                                <li>Technology integration</li>
                            </ul>
                            <a href="#" class="jp-service-btn">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Premium Services Section End -->

    <!-- Cta Section Start -->
    <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80 jp-cta-section">
        <div class="container">
            <div class="sec-title text-center jp-cta-content">
                <div class="sub-title modify white jp-cta-subtitle">Siap memulai proyek pertambangan Anda?</div>
                <h2 class="title3 white-color jp-cta-title">Tim ahli kami siap membantu <br> mewujudkan visi bisnis Anda.
                </h2>
                <div class="btn-part">
                    <a class="readon banner-style jp-cta-btn" href="contact.html">Mulai Konsultasi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Cta Section End -->

    <!-- Free Quote Section Start -->
    <div id="rs-freequote" class="rs-freequote style3 pt-100 pb-100 md-pt-80 md-pb-80 jp-quote-section">
        <div class="container">
            <div class="row md-col-padding">
                <div class="col-lg-5 custom1 pr-0">
                    <div class="img-part"></div>
                </div>
                <div class="col-lg-7 custom2 pl-0">
                    <div id="form-messages"></div>
                    <form id="contact-form" class="quote-form jp-quote-form" method="post" action="#">
                        <div class="sec-title mb-53">
                            <div class="sub-title white-color jp-quote-subtitle">Mari Berdiskusi</div>
                            <h2 class="title white-color mb-0 jp-quote-title">Request Konsultasi Gratis</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="jp-form-group">
                                    <input type="text" name="name" placeholder="Nama Lengkap" required=""
                                        class="jp-form-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="jp-form-group">
                                    <input type="email" name="email" placeholder="Email" required=""
                                        class="jp-form-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="jp-form-group">
                                    <input type="text" name="phone" placeholder="Nomor Telepon" required=""
                                        class="jp-form-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="jp-form-group">
                                    <input type="text" name="company" placeholder="Nama Perusahaan" required=""
                                        class="jp-form-input">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="jp-form-group">
                                    <textarea name="message" placeholder="Ceritakan kebutuhan konsultasi Anda..." required=""
                                        class="jp-form-input jp-form-textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="readon modify jp-submit-btn">Kirim Permintaan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
