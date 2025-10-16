@extends('admin.app')

@section('title', __('Dashboard'))

@push('css')
    <style>
        .dashboard-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 1rem;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            color: white;
            opacity: 0.9;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #198754, #20c997);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #ffc107, #fd7e14);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #0dcaf0, #0d6efd);
        }

        .welcome-banner {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            color: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    <div class="welcome-banner mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h3 class="fw-bold mb-1">
                    Selamat Datang, {{ Auth::user()->name ?? 'Admin' }} 👋
                </h3>
                <p class="mb-0 fs-6">Senang melihatmu kembali! Berikut rangkuman data terkini aplikasi kamu.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('admin.profile.index') ?? '#' }}" class="btn btn-light btn-sm">
                    <i class="bi bi-person-circle me-1"></i> Profil Saya
                </a>
            </div>
        </div>
    </div>

    {{-- Statistik Cards --}}
    <div class="row g-4">
        {{-- Artikel --}}
        <div class="col-md-6 col-xl-3">
            <div class="card dashboard-card bg-gradient-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase fw-semibold mb-1">Artikel</h6>
                        <h3 class="fw-bold mb-0">{{ $totalArticles ?? 0 }}</h3>
                        <small>Total artikel aktif di sistem</small>
                    </div>
                    <i class="bi bi-journal-richtext card-icon"></i>
                </div>
            </div>
        </div>

        {{-- Layanan --}}
        <div class="col-md-6 col-xl-3">
            <div class="card dashboard-card bg-gradient-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase fw-semibold mb-1">Layanan</h6>
                        <h3 class="fw-bold mb-0">{{ $totalServices ?? 0 }}</h3>
                        <small>Jumlah layanan yang tersedia</small>
                    </div>
                    <i class="bi bi-headset card-icon"></i>
                </div>
            </div>
        </div>

        {{-- Produk --}}
        <div class="col-md-6 col-xl-3">
            <div class="card dashboard-card bg-gradient-warning text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase fw-semibold mb-1">Produk</h6>
                        <h3 class="fw-bold mb-0">{{ $totalProducts ?? 0 }}</h3>
                        <small>Total produk aktif di toko</small>
                    </div>
                    <i class="bi bi-box-seam card-icon"></i>
                </div>
            </div>
        </div>

        {{-- Feedback --}}
        <div class="col-md-6 col-xl-3">
            <div class="card dashboard-card bg-gradient-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase fw-semibold mb-1">Feedback</h6>
                        <h3 class="fw-bold mb-0">{{ $totalFeedbacks ?? 0 }}</h3>
                        <small>Masukan dari pengguna</small>
                    </div>
                    <i class="bi bi-chat-dots card-icon"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
