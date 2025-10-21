@extends('frontend.app')

@section('title', $product->name)

@push('css')
    <style>
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

        /* Product Detail Styles */
        .jp-product-detail-section {
            position: relative;
            background: linear-gradient(135deg,
                    rgba(248, 250, 252, 0.95) 0%,
                    rgba(255, 255, 255, 0.9) 100%);
            overflow: hidden;
        }

        .jp-product-detail-section::before {
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

        .jp-product-detail-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .jp-product-gallery {
            position: relative;
        }

        .jp-product-main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: var(--border-radius-xl);
        }

        .jp-product-thumbnails {
            display: flex;
            gap: var(--space-2);
            margin-top: var(--space-4);
            overflow-x: auto;
        }

        .jp-product-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: var(--border-radius-md);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .jp-product-thumbnail:hover,
        .jp-product-thumbnail.active {
            border-color: var(--primary-500);
            transform: scale(1.05);
        }

        .jp-product-info {
            padding: var(--space-8);
        }

        .jp-product-category {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
            padding: var(--space-2) var(--space-4);
            border-radius: var(--border-radius-full);
            font-size: var(--font-size-sm);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: var(--space-4);
        }

        .jp-product-title {
            font-size: var(--font-size-3xl);
            font-weight: 700;
            color: var(--primary-900);
            margin-bottom: var(--space-6);
            line-height: 1.2;
        }

        .jp-product-price {
            font-size: var(--font-size-2xl);
            font-weight: 700;
            color: var(--success-500);
            margin-bottom: var(--space-6);
        }

        .jp-product-description {
            font-size: var(--font-size-lg);
            line-height: 1.7;
            color: var(--secondary-600);
            margin-bottom: var(--space-8);
        }

        .jp-product-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-4);
            margin-bottom: var(--space-8);
        }

        .jp-meta-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-4);
            background: rgba(255, 255, 255, 0.5);
            border-radius: var(--border-radius-lg);
            border: 1px solid rgba(38, 123, 250, 0.1);
        }

        .jp-meta-item i {
            color: var(--primary-500);
            font-size: var(--font-size-lg);
        }

        .jp-meta-text {
            color: var(--secondary-600);
            font-weight: 500;
        }

        .jp-contact-btn {
            display: inline-block;
            padding: var(--space-4) var(--space-8);
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius-lg);
            font-size: var(--font-size-lg);
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
            width: 100%;
            text-align: center;
        }

        .jp-contact-btn:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .jp-related-products {
            margin-top: var(--space-16);
        }

        .jp-related-title {
            font-size: var(--font-size-2xl);
            font-weight: 700;
            color: var(--primary-900);
            margin-bottom: var(--space-8);
            text-align: center;
        }

        .jp-related-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            height: 100%;
        }

        .jp-related-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .jp-related-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .jp-related-content {
            padding: var(--space-6);
        }

        .jp-related-name {
            font-size: var(--font-size-lg);
            font-weight: 600;
            color: var(--primary-900);
            margin-bottom: var(--space-3);
        }

        .jp-related-name a {
            color: inherit;
            text-decoration: none;
        }

        .jp-related-name a:hover {
            color: var(--primary-600);
        }

        .jp-related-price {
            font-size: var(--font-size-lg);
            font-weight: 700;
            color: var(--success-500);
        }

        .jp-product-btn {
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
            width: 100%;
            text-align: center;
        }

        .jp-product-btn:hover {
            background: linear-gradient(135deg,
                    var(--primary-600) 0%,
                    var(--primary-700) 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }
    </style>
@endpush

@section('content')
    <!-- Breadcrumbs Section Start -->
    <div class="rs-breadcrumbs bg-2 jp-breadcrumbs">
        <div class="container">
            <div class="content-part text-center">
                <h1 class="breadcrumbs-title white-color mb-0 jp-breadcrumbs-title">{{ $product->name }}</h1>
                <p class="breadcrumbs-desc white-color mt-3 mb-0 jp-breadcrumbs-desc">Detail produk dan informasi lengkap</p>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs Section End -->

    <!-- Product Detail Section Start -->
    <div class="rs-product-detail pt-100 pb-70 md-pt-80 md-pb-50 sm-pt-72 jp-product-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-30">
                    <div class="jp-product-detail-card">
                        <div class="jp-product-gallery">
                            <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}"
                                class="jp-product-main-image" id="mainImage">

                            @if ($product->files->count() > 0)
                                <div class="jp-product-thumbnails">
                                    <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}"
                                        class="jp-product-thumbnail active" onclick="changeMainImage(this.src)">

                                    @foreach ($product->files as $file)
                                        <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $product->name }}"
                                            class="jp-product-thumbnail" onclick="changeMainImage(this.src)">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-30">
                    <div class="jp-product-detail-card">
                        <div class="jp-product-info">
                            @if ($product->category)
                                <span class="jp-product-category">{{ $product->category->name }}</span>
                            @endif

                            <h1 class="jp-product-title">{{ $product->name }}</h1>

                            @if ($product->price)
                                <div class="jp-product-price">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            @endif

                            <div class="jp-product-description">
                                {!! $product->description !!}
                            </div>

                            <div class="jp-product-meta">
                                <div class="jp-meta-item">
                                    <i class="fa fa-calendar"></i>
                                    <span class="jp-meta-text">{{ $product->created_at->format('d M Y') }}</span>
                                </div>

                                @if ($product->creator)
                                    <div class="jp-meta-item">
                                        <i class="fa fa-user"></i>
                                        <span class="jp-meta-text">{{ $product->creator->name }}</span>
                                    </div>
                                @endif

                                @if ($product->updated_at != $product->created_at)
                                    <div class="jp-meta-item">
                                        <i class="fa fa-edit"></i>
                                        <span class="jp-meta-text">Diperbarui
                                            {{ $product->updated_at->format('d M Y') }}</span>
                                    </div>
                                @endif
                            </div>

                            @if (getStaticContent('phone'))
                                <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank"
                                    class="jp-product-btn">
                                    <i class="fas fa-phone"></i>
                                    {{ __('Hubungi Kami') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if ($relatedProducts->count() > 0)
                <div class="jp-related-products">
                    <h2 class="jp-related-title">Produk Terkait</h2>
                    <div class="row">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="col-lg-3 col-md-6 mb-30">
                                <div class="jp-related-card">
                                    <img src="{{ $relatedProduct->thumbnail_url }}" alt="{{ $relatedProduct->name }}"
                                        class="jp-related-image">
                                    <div class="jp-related-content">
                                        <h3 class="jp-related-name">
                                            <a href="{{ route('landing.product.detail', $relatedProduct->slug) }}">
                                                {{ $relatedProduct->name }}
                                            </a>
                                        </h3>
                                        @if ($relatedProduct->price)
                                            <div class="jp-related-price">
                                                Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Product Detail Section End -->
@endsection

@push('js')
    <script>
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;

            // Update active thumbnail
            document.querySelectorAll('.jp-product-thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            event.target.classList.add('active');
        }
    </script>
@endpush
