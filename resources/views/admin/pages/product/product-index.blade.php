@extends('admin.app')

@section('title', __('Produk'))

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">
                {{ __('Manajemen Produk') }}
            </h3>

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                {{ __('Tambah Produk') }}
            </a>
        </div>
        <div class="card-body">
            <livewire:tables.products-table />
        </div>
    </div>
@endsection
