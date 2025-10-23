@extends('frontend.app')

@section('title', __('Produk Kami'))

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

        /* ===== MODERN PRODUCTS STYLING ===== */
        .jp-products-section {
            position: relative;
            background: linear-gradient(135deg,
                    rgba(248, 250, 252, 0.95) 0%,
                    rgba(255, 255, 255, 0.9) 100%);
            overflow: hidden;
        }

        .jp-products-section::before {
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

        /* Search and Filter Section */
        .jp-filter-section {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius-xl);
            padding: var(--space-8);
            margin-bottom: var(--space-12);
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .jp-search-form {
            display: flex;
            gap: var(--space-4);
            margin-bottom: var(--space-6);
            flex-wrap: wrap;
        }

        .jp-search-input {
            flex: 1;
            min-width: 250px;
            padding: var(--space-4);
            border: 2px solid var(--primary-200);
            border-radius: var(--border-radius-lg);
            font-size: var(--font-size-base);
            transition: all 0.3s ease;
        }

        .jp-search-input:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(38, 123, 250, 0.1);
        }

        .jp-search-btn {
            padding: var(--space-4) var(--space-8);
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
            border: none;
            border-radius: var(--border-radius-lg);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .jp-search-btn:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            transform: translateY(-2px);
        }

        /* Category Filter */
        .jp-category-filter {
            display: flex;
            justify-content: center;
            gap: var(--space-4);
            margin-bottom: var(--space-6);
            flex-wrap: wrap;
        }

        .jp-category-btn {
            padding: var(--space-3) var(--space-6);
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid var(--primary-200);
            border-radius: var(--border-radius-full);
            color: var(--primary-600);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .jp-category-btn:hover,
        .jp-category-btn.active {
            background: var(--primary-600);
            border-color: var(--primary-600);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Sort Section */
        .jp-sort-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-8);
            flex-wrap: wrap;
            gap: var(--space-4);
        }

        .jp-sort-info {
            color: var(--secondary-600);
            font-size: var(--font-size-sm);
        }

        .jp-sort-select {
            padding: var(--space-3) var(--space-4);
            border: 2px solid var(--primary-200);
            border-radius: var(--border-radius-lg);
            background: white;
            color: var(--primary-600);
            font-weight: 600;
            cursor: pointer;
        }

        /* Modern Product Cards */
        .jp-product-card {
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

        .jp-product-card::before {
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

        .jp-product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .jp-product-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .jp-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .jp-product-card:hover .jp-product-image img {
            transform: scale(1.05);
        }

        .jp-product-image::before {
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

        .jp-product-card:hover .jp-product-image::before {
            opacity: 1;
        }

        .jp-product-content {
            padding: var(--space-8);
        }

        .jp-product-category {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
            padding: var(--space-2) var(--space-4);
            border-radius: var(--border-radius-full);
            font-size: var(--font-size-xs);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: var(--space-4);
        }

        .jp-product-title {
            font-size: var(--font-size-xl);
            font-weight: 700;
            color: var(--primary-900);
            margin-bottom: var(--space-4);
            line-height: 1.3;
        }

        .jp-product-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .jp-product-title a:hover {
            color: var(--primary-600);
        }

        .jp-product-description {
            font-size: var(--font-size-base);
            line-height: 1.6;
            color: var(--secondary-600);
            margin-bottom: var(--space-6);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .jp-product-price {
            font-size: var(--font-size-xl);
            font-weight: 700;
            color: var(--success-500);
            margin-bottom: var(--space-6);
        }

        .jp-product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-6);
            font-size: var(--font-size-sm);
            color: var(--secondary-500);
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

        /* Pagination */
        .jp-pagination {
            display: flex;
            justify-content: center;
            margin-top: var(--space-12);
        }

        .jp-pagination .pagination {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius-lg);
            padding: var(--space-4);
            box-shadow: var(--shadow-md);
        }

        .jp-pagination .page-link {
            color: var(--primary-600);
            border: none;
            padding: var(--space-3) var(--space-4);
            margin: 0 var(--space-1);
            border-radius: var(--border-radius-md);
            transition: all 0.3s ease;
        }

        .jp-pagination .page-link:hover,
        .jp-pagination .page-item.active .page-link {
            background: var(--primary-600);
            color: white;
            transform: translateY(-2px);
        }

        /* Statistics Section */
        .jp-stats-section {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius-xl);
            padding: var(--space-8);
            margin-bottom: var(--space-12);
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .jp-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-8);
        }

        .jp-stat-item {
            text-align: center;
        }

        .jp-stat-number {
            font-size: var(--font-size-3xl);
            font-weight: 700;
            color: var(--primary-600);
            margin-bottom: var(--space-2);
        }

        .jp-stat-label {
            font-size: var(--font-size-base);
            color: var(--secondary-600);
            font-weight: 600;
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

            .jp-product-content {
                padding: var(--space-6);
            }

            .jp-category-filter {
                gap: var(--space-2);
            }

            .jp-category-btn {
                padding: var(--space-2) var(--space-4);
                font-size: var(--font-size-sm);
            }

            .jp-search-form {
                flex-direction: column;
            }

            .jp-search-input {
                min-width: auto;
            }

            .jp-sort-section {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Breadcrumbs Section Start -->
    <div class="rs-breadcrumbs bg-2 jp-breadcrumbs">
        <div class="container">
            <div class="content-part text-center">
                <h1 class="breadcrumbs-title white-color mb-0 jp-breadcrumbs-title">Produk Kami</h1>
                <p class="breadcrumbs-desc white-color mt-3 mb-0 jp-breadcrumbs-desc">Solusi dan produk terbaik untuk industri pertambangan</p>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs Section End -->

    <!-- Products Section Start -->
    <div id="rs-products" class="rs-products style2 gray-bg2 pt-100 pb-70 md-pt-80 md-pb-50 sm-pt-72 jp-products-section">
        <div class="container">
            <div class="sec-title style2 mb-60 md-mb-50 sm-mb-42 jp-section-title">
                <div class="first-half text-right">
                    <div class="sub-title primary jp-section-subtitle">Produk Unggulan</div>
                    <h2 class="title mb-0 jp-section-main-title">Solusi Pertambangan Terdepan</h2>
                </div>
                <div class="last-half">
                    <p class="desc mb-0 pr-50 jp-section-description">Temukan berbagai produk dan solusi inovatif yang dirancang khusus untuk memenuhi kebutuhan industri pertambangan modern dengan standar kualitas terbaik.</p>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="jp-stats-section">
                <div class="jp-stats-grid">
                    <div class="jp-stat-item">
                        <div class="jp-stat-number">{{ $totalProducts }}</div>
                        <div class="jp-stat-label">Total Produk</div>
                    </div>
                    <div class="jp-stat-item">
                        <div class="jp-stat-number">{{ $totalCategories }}</div>
                        <div class="jp-stat-label">Kategori</div>
                    </div>
                    <div class="jp-stat-item">
                        <div class="jp-stat-number">{{ $products->total() }}</div>
                        <div class="jp-stat-label">Menampilkan</div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="jp-filter-section">
                <!-- Search Form -->
                <form method="GET" action="{{ route('landing.products') }}" class="jp-search-form">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari produk..."
                           class="jp-search-input">
                    <button type="submit" class="jp-search-btn">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('landing.products') }}" class="jp-search-btn" style="background: var(--error-500);">Reset</a>
                    @endif
                </form>

                <!-- Category Filter -->
                <div class="jp-category-filter">
                    <a href="{{ route('landing.products') }}"
                       class="jp-category-btn {{ request()->get('category') ? '' : 'active' }}">
                        Semua Produk
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('landing.products', ['category' => $category->id]) }}"
                           class="jp-category-btn {{ request()->get('category') == $category->id ? 'active' : '' }}">
                            {{ $category->name }} ({{ $category->products_count }})
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Sort Section -->
            <div class="jp-sort-section">
                <div class="jp-sort-info">
                    Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
                </div>
                <form method="GET" action="{{ route('landing.products') }}" style="display: inline;">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <select name="sort" onchange="this.form.submit()" class="jp-sort-select">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                    </select>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="row gutter-20">
                @forelse($products as $product)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="product-wrap jp-product-card">
                            <div class="image-part jp-product-image">
                                <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}">
                            </div>
                            <div class="content-part jp-product-content">
                                @if($product->category)
                                    <span class="jp-product-category">{{ $product->category->name }}</span>
                                @endif
                                <h3 class="title jp-product-title">
                                    <a href="{{ route('landing.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <div class="desc jp-product-description">
                                    {{ Str::limit(strip_tags($product->description), 120) }}
                                </div>

                                <div class="jp-product-meta">
                                    <span><i class="fa fa-calendar"></i> {{ $product->created_at->format('d M Y') }}</span>
                                    @if($product->creator)
                                        <span><i class="fa fa-user"></i> {{ $product->creator->name }}</span>
                                    @endif
                                </div>

                                @if($product->price)
                                    <div class="jp-product-price">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                @endif

                                <a href="{{ route('landing.product.detail', $product->slug) }}" class="jp-product-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border-radius: var(--border-radius-xl); padding: var(--space-8);">
                            <h4>Tidak ada produk ditemukan</h4>
                            <p>Belum ada produk yang tersedia untuk kriteria pencarian ini.</p>
                            <a href="{{ route('landing.products') }}" class="jp-product-btn" style="width: auto; display: inline-block; margin-top: var(--space-4);">Lihat Semua Produk</a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="jp-pagination">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
    <!-- Products Section End -->

    <!-- CTA Section Start -->
    <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80 jp-cta-section">
        <div class="container">
            <div class="sec-title text-center jp-cta-content">
                <div class="sub-title modify white jp-cta-subtitle">Butuh produk khusus?</div>
                <h2 class="title3 white-color jp-cta-title">Tim ahli kami siap membantu <br> mewujudkan kebutuhan produk Anda.</h2>
                <div class="btn-part">
                    <a class="readon banner-style jp-cta-btn" href="{{ route('landing.home') }}#rs-contact">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Section End -->
@endsection
