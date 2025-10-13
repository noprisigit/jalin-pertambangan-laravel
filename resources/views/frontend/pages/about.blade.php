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

        /* ===== ABOUT SECTION ===== */
        .rs-about.inner {
            background: var(--secondary-50);
            position: relative;
        }

        .rs-about.inner::before {
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

        .rs-about.inner .container {
            position: relative;
            z-index: 2;
        }

        /* Image Part */
        .rs-about.inner .image-part {
            position: relative;
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            transition: var(--transition-normal);
        }

        .rs-about.inner .image-part:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
        }

        .rs-about.inner .image-part img {
            width: 100%;
            height: auto;
            transition: var(--transition-normal);
            filter: brightness(1) contrast(1.1);
        }

        .rs-about.inner .image-part:hover img {
            transform: scale(1.05);
            filter: brightness(1.1) contrast(1.2);
        }

        /* Author Info */
        .rs-about.inner .author-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(135deg,
                    rgba(38, 123, 250, 0.95) 0%,
                    rgba(62, 136, 248, 0.9) 100%);
            backdrop-filter: blur(20px);
            padding: var(--space-6);
            /* margin-top: -5000px; */
            color: var(--white);
        }

        .rs-about.inner .author-info .name {
            font-size: var(--font-size-xl);
            font-weight: 700;
            margin-bottom: var(--space-2);
            color: var(--white);
        }

        .rs-about.inner .author-info .designation {
            font-size: var(--font-size-sm);
            opacity: 0.9;
            color: var(--white);
        }

        /* Content Part */
        .rs-about.inner .sec-title .sub-title {
            color: var(--primary-600);
            font-size: var(--font-size-sm);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: var(--space-4);
        }

        .rs-about.inner .sec-title .title {
            font-size: var(--font-size-3xl);
            font-weight: 800;
            line-height: 1.2;
            color: var(--secondary-800);
            margin-bottom: var(--space-4);
        }

        .rs-about.inner .sec-title .desc {
            font-size: var(--font-size-lg);
            line-height: 1.6;
            color: var(--secondary-600);
            margin-bottom: var(--space-6);
        }

        /* Listing Style */
        .rs-about.inner .listing-style2 {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .rs-about.inner .listing-style2 li {
            position: relative;
            padding-left: var(--space-8);
            margin-bottom: var(--space-4);
            font-size: var(--font-size-base);
            line-height: 1.6;
            color: var(--secondary-700);
        }

        .rs-about.inner .listing-style2 li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 0;
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: var(--white);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: var(--font-size-xs);
            font-weight: 700;
        }

        /* Button */
        .rs-about.inner .btn-part .readon {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: var(--white);
            padding: var(--space-4) var(--space-8);
            border-radius: var(--radius-xl);
            text-decoration: none;
            font-weight: 600;
            font-size: var(--font-size-base);
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
        }

        .rs-about.inner .btn-part .readon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition-normal);
        }

        .rs-about.inner .btn-part .readon:hover::before {
            left: 100%;
        }

        .rs-about.inner .btn-part .readon:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: var(--white);
        }

        /* ===== COUNTER SECTION ===== */
        .rs-counter.bg21 {
            background: linear-gradient(135deg, var(--secondary-800), var(--secondary-900));
            position: relative;
            overflow: hidden;
        }

        .rs-counter.bg21::before {
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

        .rs-counter .container {
            position: relative;
            z-index: 2;
        }

        .rs-counter .sec-title .sub-title {
            color: var(--primary-400);
            font-size: var(--font-size-sm);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: var(--space-4);
        }

        .rs-counter .sec-title .title {
            font-size: var(--font-size-3xl);
            font-weight: 800;
            line-height: 1.2;
            color: var(--white);
        }

        /* Counter Items */
        .rs-counter .couter-part {
            text-align: center;
            padding: var(--space-8);
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: var(--radius-2xl);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition-normal);
        }

        .rs-counter .couter-part:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(38, 123, 250, 0.3);
            transform: translateY(-8px);
        }

        .rs-counter .rs-count {
            font-size: var(--font-size-5xl);
            font-weight: 800;
            color: var(--primary-400);
            line-height: 1;
            margin-bottom: var(--space-4);
            display: block;
        }

        .rs-counter .couter-part .title {
            font-size: var(--font-size-lg);
            font-weight: 600;
            color: var(--white);
            margin: 0;
        }

        /* ===== TEAM SECTION ===== */
        .rs-team.inner {
            background: var(--white);
            position: relative;
        }

        .rs-team.inner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 10% 20%, rgba(38, 123, 250, 0.02) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(62, 136, 248, 0.02) 0%, transparent 50%);
            pointer-events: none;
        }

        .rs-team.inner .container {
            position: relative;
            z-index: 2;
        }

        .rs-team.inner .sec-title .sub-title {
            color: var(--primary-600);
            font-size: var(--font-size-sm);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: var(--space-4);
        }

        .rs-team.inner .sec-title .title {
            font-size: var(--font-size-3xl);
            font-weight: 800;
            line-height: 1.2;
            color: var(--secondary-800);
            margin-bottom: var(--space-4);
        }

        .rs-team.inner .sec-title .desc {
            font-size: var(--font-size-lg);
            line-height: 1.6;
            color: var(--secondary-600);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Team Items */
        .rs-team.inner .team-item {
            background: var(--white);
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: var(--transition-normal);
            border: 1px solid rgba(38, 123, 250, 0.1);
            position: relative;
        }

        .rs-team.inner .team-item::before {
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

        .rs-team.inner .team-item:hover::before {
            opacity: 1;
        }

        .rs-team.inner .team-item:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-2xl);
        }

        .rs-team.inner .team-image {
            position: relative;
            overflow: hidden;
            height: 300px;
        }

        .rs-team.inner .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-normal);
            filter: brightness(1) contrast(1.1);
        }

        .rs-team.inner .team-item:hover .team-image img {
            transform: scale(1.1);
            filter: brightness(1.1) contrast(1.2);
        }

        .rs-team.inner .text-bottom {
            padding: var(--space-6);
            position: relative;
            z-index: 2;
        }

        .rs-team.inner .person-name {
            font-size: var(--font-size-xl);
            font-weight: 700;
            margin-bottom: var(--space-2);
        }

        .rs-team.inner .person-name a {
            color: var(--secondary-800);
            text-decoration: none;
            transition: var(--transition-normal);
        }

        .rs-team.inner .person-name a:hover {
            color: var(--primary-600);
        }

        .rs-team.inner .designation {
            color: var(--primary-600);
            font-size: var(--font-size-sm);
            font-weight: 600;
            margin-bottom: var(--space-4);
            display: block;
        }

        .rs-team.inner .desc {
            color: var(--secondary-600);
            line-height: 1.6;
            margin-bottom: var(--space-6);
            font-size: var(--font-size-sm);
        }

        /* Team Social */
        .rs-team.inner .team-social {
            margin-top: var(--space-4);
        }

        .rs-team.inner .team-social ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: var(--space-3);
        }

        .rs-team.inner .team-social li a {
            width: 40px;
            height: 40px;
            background: var(--secondary-100);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-600);
            text-decoration: none;
            transition: var(--transition-normal);
            border: 1px solid var(--secondary-200);
        }

        .rs-team.inner .team-social li a:hover {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: var(--white);
            border-color: var(--primary-500);
            transform: translateY(-2px);
        }

        /* ===== FREE QUOTE SECTION ===== */
        .rs-freequote.bg21 {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-700));
            position: relative;
            overflow: hidden;
        }

        .rs-freequote.bg21::before {
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

        .rs-freequote .container {
            position: relative;
            z-index: 2;
        }

        .rs-freequote .sec-title .sub-title {
            color: var(--primary-200);
            font-size: var(--font-size-sm);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: var(--space-4);
        }

        .rs-freequote .sec-title .title {
            font-size: var(--font-size-3xl);
            font-weight: 800;
            line-height: 1.2;
            color: var(--white);
        }

        /* Quote Form */
        .rs-freequote .quote-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: var(--radius-2xl);
            padding: var(--space-8);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .rs-freequote .quote-form input,
        .rs-freequote .quote-form textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-lg);
            padding: var(--space-4);
            color: var(--white);
            font-size: var(--font-size-base);
            transition: var(--transition-normal);
            margin-bottom: var(--space-4);
        }

        .rs-freequote .quote-form input::placeholder,
        .rs-freequote .quote-form textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .rs-freequote .quote-form input:focus,
        .rs-freequote .quote-form textarea:focus {
            outline: none;
            border-color: var(--primary-300);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(38, 123, 250, 0.2);
        }

        .rs-freequote .quote-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .rs-freequote .quote-form .readon.modify {
            background: var(--white);
            color: var(--primary-600);
            padding: var(--space-4) var(--space-8);
            border-radius: var(--radius-xl);
            border: none;
            font-weight: 600;
            font-size: var(--font-size-base);
            transition: var(--transition-normal);
            cursor: pointer;
            box-shadow: var(--shadow-md);
            width: 100%;
        }

        .rs-freequote .quote-form .readon.modify:hover {
            background: var(--primary-100);
            color: var(--primary-700);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 991.98px) {
            .rs-breadcrumbs.bg-1 {
                margin-top: 70px;
                padding: 80px 0 60px;
            }

            .rs-about.inner .image-part {
                margin-bottom: var(--space-8);
            }

            .rs-counter .couter-part {
                padding: var(--space-6);
            }

            .rs-counter .rs-count {
                font-size: var(--font-size-4xl);
            }
        }

        @media (max-width: 768px) {
            .rs-breadcrumbs.bg-1 {
                padding: 60px 0 40px;
            }

            .breadcrumbs-title {
                font-size: 2rem;
            }

            .breadcrumbs-desc {
                font-size: var(--font-size-base);
            }

            .rs-about.inner .sec-title .title {
                font-size: var(--font-size-2xl);
            }

            .rs-counter .sec-title .title {
                font-size: var(--font-size-2xl);
            }

            .rs-team.inner .sec-title .title {
                font-size: var(--font-size-2xl);
            }

            .rs-freequote .sec-title .title {
                font-size: var(--font-size-2xl);
            }

            .rs-team.inner .team-image {
                height: 250px;
            }

            .rs-freequote .quote-form {
                padding: var(--space-6);
            }
        }

        @media (max-width: 576px) {
            .rs-breadcrumbs.bg-1 {
                padding: 40px 0 30px;
            }

            .breadcrumbs-title {
                font-size: 1.75rem;
            }

            .rs-about.inner .sec-title .title {
                font-size: var(--font-size-xl);
            }

            .rs-counter .rs-count {
                font-size: var(--font-size-3xl);
            }

            .rs-team.inner .team-image {
                height: 200px;
            }

            .rs-team.inner .text-bottom {
                padding: var(--space-4);
            }
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

        .rs-about.inner .image-part,
        .rs-about.inner .sec-title,
        .rs-counter .couter-part,
        .rs-team.inner .team-item {
            animation: fadeInUp 0.6s ease-out;
        }

        .rs-counter .couter-part:nth-child(1) {
            animation-delay: 0.1s;
        }

        .rs-counter .couter-part:nth-child(2) {
            animation-delay: 0.2s;
        }

        .rs-counter .couter-part:nth-child(3) {
            animation-delay: 0.3s;
        }

        .rs-counter .couter-part:nth-child(4) {
            animation-delay: 0.4s;
        }

        .rs-team.inner .team-item:nth-child(1) {
            animation-delay: 0.1s;
        }

        .rs-team.inner .team-item:nth-child(2) {
            animation-delay: 0.2s;
        }

        .rs-team.inner .team-item:nth-child(3) {
            animation-delay: 0.3s;
        }

        .rs-team.inner .team-item:nth-child(4) {
            animation-delay: 0.4s;
        }

        .rs-team.inner .team-item:nth-child(5) {
            animation-delay: 0.5s;
        }

        .rs-team.inner .team-item:nth-child(6) {
            animation-delay: 0.6s;
        }

        /* Modern Author Info Styling */
        .jp-author-card {
            position: relative;
            background: linear-gradient(135deg,
                    rgba(255, 255, 255, 0.95) 0%,
                    rgba(248, 250, 252, 0.9) 100%);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px 30px;
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 8px 32px rgba(14, 165, 233, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .jp-author-card::before {
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

        .jp-author-card:hover {
            transform: translateY(-8px);
            box-shadow:
                0 32px 64px rgba(0, 0, 0, 0.15),
                0 16px 48px rgba(14, 165, 233, 0.2);
        }

        .jp-author-image {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 30px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.15),
                0 8px 32px rgba(14, 165, 233, 0.2);
            transition: all 0.4s ease;
        }

        .jp-author-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .jp-author-image:hover img {
            transform: scale(1.05);
        }

        .jp-author-image::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            background: linear-gradient(45deg,
                    var(--primary-400),
                    var(--primary-600),
                    var(--primary-400));
            border-radius: 50%;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .jp-author-info {
            text-align: center;
            position: relative;
        }

        .jp-author-name {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-900);
            margin-bottom: 8px;
            line-height: 1.2;
            background: linear-gradient(135deg,
                    var(--primary-700) 0%,
                    var(--primary-500) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .jp-author-designation {
            font-size: 16px;
            font-weight: 600;
            color: var(--primary-600);
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }

        .jp-author-designation::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg,
                    var(--primary-400) 0%,
                    var(--primary-600) 100%);
            border-radius: 2px;
        }

        .jp-author-bio {
            font-size: 15px;
            line-height: 1.7;
            color: var(--secondary-600);
            margin-bottom: 25px;
            text-align: left;
        }

        .jp-author-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .jp-stat-item {
            text-align: center;
            padding: 20px 15px;
            background: rgba(14, 165, 233, 0.05);
            border-radius: 16px;
            border: 1px solid rgba(14, 165, 233, 0.1);
            transition: all 0.3s ease;
        }

        .jp-stat-item:hover {
            background: rgba(14, 165, 233, 0.1);
            transform: translateY(-2px);
        }

        .jp-stat-number {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-600);
            display: block;
            margin-bottom: 5px;
        }

        .jp-stat-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--secondary-500);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .jp-author-social {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
        }

        .jp-social-link {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: linear-gradient(135deg,
                    var(--primary-500) 0%,
                    var(--primary-600) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
        }

        .jp-social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
            color: white;
        }

        .jp-social-link i {
            font-size: 18px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .jp-author-card {
                padding: 30px 20px;
            }

            .jp-author-image {
                width: 150px;
                height: 150px;
                margin-bottom: 25px;
            }

            .jp-author-name {
                font-size: 24px;
            }

            .jp-author-stats {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Breadcrumbs Section Start -->
    <div class="rs-breadcrumbs bg-1">
        <div class="container">
            <div class="content-part text-center">
                <h1 class="breadcrumbs-title white-color mb-0">Tentang Kami</h1>
                <p class="breadcrumbs-desc white-color mt-3 mb-0">Mengenal Jalin Pertambangan dan Tim Ahli Kami</p>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs Section End -->

    <!-- About Section Start -->
    <div class="rs-about inner pt-100 lg-pt-92 md-pt-80 pb-100 md-pb-80">
        <div class="container">
            <div class="row y-middle mb-64 lg-mb-30 md-mb-0">
                <div class="col-lg-6 md-mb-95">
                    <div class="jp-author-card">
                        <div class="jp-author-image">
                            <img src="assets/images/bahan/founder.jpg" alt="Dr. Ichwan Azwardi">
                        </div>

                        <div class="jp-author-info">
                            <h3 class="jp-author-name">Dr. Ir. Ichwan Azwardi</h3>
                            <span class="jp-author-designation">Founder & Principal Consultant</span>
                            <hr>

                            <p class="jp-author-bio">
                                Seorang profesional berpengalaman dengan keahlian mendalam dalam bidang pertambangan,
                                tata kelola perusahaan, dan pengembangan sumber daya manusia. Memiliki track record
                                yang solid dalam mengembangkan strategi bisnis dan meningkatkan kinerja organisasi.
                            </p>

                            <div class="jp-author-stats">
                                <div class="jp-stat-item">
                                    <span class="jp-stat-number">15+</span>
                                    <span class="jp-stat-label">Tahun Pengalaman</span>
                                </div>
                                <div class="jp-stat-item">
                                    <span class="jp-stat-number">50+</span>
                                    <span class="jp-stat-label">Proyek Selesai</span>
                                </div>
                                <div class="jp-stat-item">
                                    <span class="jp-stat-number">100+</span>
                                    <span class="jp-stat-label">Klien Puas</span>
                                </div>
                            </div>

                            <div class="jp-author-social">
                                <a href="#" class="jp-social-link" title="LinkedIn">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#" class="jp-social-link" title="Email">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <a href="#" class="jp-social-link" title="WhatsApp">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pl-50 md-pl-15 pr-50 lg-pr-15">
                    <div class="sec-title mb-25">
                        <div class="sub-title primary">Tentang JP</div>
                        <h2 class="title mb-18">Solusi Konsultasi Pertambangan yang Adaptif & Inovatif</h2>
                        <div class="desc">Jalin Pertambangan (JP) adalah konsultan pertambangan yang menyediakan diskusi,
                            edukasi, pelatihan, asistensi, dan pendampingan untuk tata kelola dan kinerja operasi tambang
                            yang adaptif, responsif, dan inovatif.</div>
                    </div>
                    <ul class="listing-style2 mb-33">
                        <li>Diskusi & Clinic Session untuk pemetaan masalah dan solusi</li>
                        <li>Edukasi & Coaching untuk peningkatan kompetensi teknis</li>
                        <li>Pelatihan Terstruktur untuk perubahan perilaku dan produktivitas</li>
                        <li>Asistensi Profesional untuk dukungan hands-on tim</li>
                        <li>Pendampingan Transformasi untuk pengambilan keputusan berkelanjutan</li>
                    </ul>
                    <div class="btn-part mt-20">
                        <a class="readon" href="#our-services">Jelajahi Layanan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Counter Section Start -->
    <div class="rs-counter style1 modify bg21 pt-92 pb-100 md-pt-72 md-pb-80">
        <div class="container">
            <div class="sec-title text-center mb-52 md-mb-29">
                <div class="sub-title white-color">Pencapaian</div>
                <h2 class="title mb-0 white-color">Prestasi & Pengalaman JP</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="couter-part thousand">
                        <div class="rs-count">25</div>
                        <h5 class="title">Tahun Pengalaman</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="couter-part plus">
                        <div class="rs-count">50</div>
                        <h5 class="title">Proyek Konsultasi</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 xs-mb-30">
                    <div class="couter-part plus">
                        <div class="rs-count">10</div>
                        <h5 class="title">Peran Strategis</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="couter-part thousand">
                        <div class="rs-count">100</div>
                        <h5 class="title">Workshop & Training</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Section End -->

    <!-- Team Section Start -->
    <div class="rs-team inner pt-100 pb-60 md-pt-80 md-pb-40">
        <div class="container">
            <div class="sec-title text-center mb-60 md-mb-42">
                <div class="sub-title primary">Tim Ahli</div>
                <h2 class="title mb-14">Our Expert Team</h2>
                <div class="desc">Dipimpin oleh Dr. Ir. Ichwan Azwardi S.T., M.T., IPU — CPI (PERHAPI), IPU (PII),
                    pengalaman eksekutif & kebijakan minerba.</div>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-lg-device="3"
                data-md-device-nav="false" data-md-device-dots="false">
                <div class="team-item">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop&crop=face"
                            alt="Dr. Ichwan Azwardi">
                    </div>
                    <div class="text-bottom">
                        <h3 class="person-name"><a href="team-single.html">Dr. Ir. Ichwan Azwardi</a></h3>
                        <span class="designation">Founder & Principal Consultant</span>
                        <div class="desc">Ahli pertambangan dengan pengalaman komprehensif: eksplorasi, operasi,
                            strategi, hingga transformasi korporasi. IPU (PII), CPI (PERHAPI).</div>
                        <div class="team-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=face"
                            alt="Mining Expert">
                    </div>
                    <div class="text-bottom">
                        <h3 class="person-name"><a href="team-single.html">Mining Operations Expert</a></h3>
                        <span class="designation">Senior Mining Consultant</span>
                        <div class="desc">Spesialis operasi tambang dengan fokus pada perencanaan produksi, optimasi
                            biaya, dan implementasi sistem K3L yang efektif.</div>
                        <div class="team-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop&crop=face"
                            alt="Geology Expert">
                    </div>
                    <div class="text-bottom">
                        <h3 class="person-name"><a href="team-single.html">Geology & Exploration Expert</a></h3>
                        <span class="designation">CPI Certified Geologist</span>
                        <div class="desc">Ahli geologi dengan sertifikasi CPI untuk estimasi cadangan mineral, evaluasi
                            prospek, dan studi kelayakan tambang.</div>
                        <div class="team-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=400&h=400&fit=crop&crop=face"
                            alt="Training Expert">
                    </div>
                    <div class="text-bottom">
                        <h3 class="person-name"><a href="team-single.html">Training & Development Expert</a></h3>
                        <span class="designation">Learning & Development Specialist</span>
                        <div class="desc">Spesialis pengembangan SDM dengan pengalaman dalam desain dan implementasi
                            program pelatihan untuk industri pertambangan.</div>
                        <div class="team-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop&crop=face"
                            alt="Safety Expert">
                    </div>
                    <div class="text-bottom">
                        <h3 class="person-name"><a href="team-single.html">K3L & Safety Expert</a></h3>
                        <span class="designation">Safety & Environment Consultant</span>
                        <div class="desc">Ahli K3L dengan pengalaman dalam implementasi sistem keselamatan kerja dan
                            lingkungan di operasi pertambangan.</div>
                        <div class="team-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=face"
                            alt="Strategy Expert">
                    </div>
                    <div class="text-bottom">
                        <h3 class="person-name"><a href="team-single.html">Strategy & Governance Expert</a></h3>
                        <span class="designation">Strategic Advisor</span>
                        <div class="desc">Konsultan strategis dengan fokus pada transformasi korporat, tata kelola
                            perusahaan, dan pengembangan kebijakan industri pertambangan.</div>
                        <div class="team-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Free Quote Section Start -->
    <div id="rs-freequote" class="rs-freequote style1 modify pt-80 pb-106 md-pt-72 md-pb-78">
        <div class="container">
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6 pl-65 md-pl-15">
                    <div id="form-messages" class="white-color"></div>
                    <form id="contact-form" class="quote-form" method="post" action="#">
                        <div class="sec-title mb-53">
                            <div class="sub-title white-color">Mari Berdiskusi</div>
                            <h2 class="title white-color mb-0">Konsultasi Gratis</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Nama Lengkap" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="No. Telepon/WA" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="company" placeholder="Perusahaan" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message"
                                    placeholder="Jelaskan kebutuhan konsultasi Anda (Diskusi/Edukasi/Pelatihan/Asistensi/Pendampingan)"
                                    required=""></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="readon modify">Kirim Permintaan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Free Quote Section End -->
@endsection
