@extends('admin.app')

@section('title', __('Artikel'))

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">
                {{ __('Manajemen Artikel') }}
            </h3>

            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                {{ __('Tambah Artikel') }}
            </a>
        </div>
        <div class="card-body">
            <livewire:tables.posts-table />
        </div>
    </div>
@endsection
