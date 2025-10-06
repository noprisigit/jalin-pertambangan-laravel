@extends('admin.app')

@section('title', __('Pengguna'))

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">
                {{ __('Manajemen Pengguna') }}
            </h3>

            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                {{ __('Tambah Pengguna') }}
            </a>
        </div>
        <div class="card-body">
            <livewire:tables.users-table />
        </div>
    </div>
@endsection
