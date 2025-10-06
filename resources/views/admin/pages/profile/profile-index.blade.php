@extends('admin.app')

@section('title', __('Profil'))

@php
    $breadcrumbs = [
        [
            'label' => __('Profil'),
        ],
    ];
@endphp

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Profil Saya') }}</h3>
        </div>
        <div class="card-body">
            <form class="app-form" id="profileForm" action="{{ route('admin.profile.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-3 col-lg-2">
                        <label class="form-label" for="name">
                            {{ __('Nama Lengkap') }}
                        </label>
                    </div>
                    <div class="col-md-9 col-lg-10">
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="{{ __('Nama Lengkap Anda') }}" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-lg-2">
                        <label class="form-label" for="email">
                            {{ __('Email') }}
                        </label>
                    </div>
                    <div class="col-md-9 col-lg-10">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="{{ __('Email Anda') }}" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-lg-2"></div>
                    <div class="col-md-9 col-lg-10 text-start">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            {{ __('Perbarui') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">{{ __('Form Ubah Kata Sandi') }}</h3>
        </div>
        <div class="card-body">
            <form class="app-form" id="changePasswordForm" action="{{ route('admin.profile.change-password') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-3 col-lg-2">
                        <label class="form-label" for="password">
                            {{ __('Kata Sandi Baru') }}
                        </label>
                    </div>
                    <div class="col-md-9 col-lg-10">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="{{ __('Kata Sandi Baru') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-lg-2">
                        <label class="form-label" for="password_confirmation">
                            {{ __('Konfirmasi Kata Sandi') }}
                        </label>
                    </div>
                    <div class="col-md-9 col-lg-10">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            placeholder="{{ __('Konfirmasi Kata Sandi') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-lg-2"></div>
                    <div class="col-md-9 col-lg-10 text-start">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            {{ __('Ubah Kata Sandi') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#profileForm', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#profileForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);

                        setTimeout(() => {
                            window.location.reload();
                        }, 500);
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#profileForm', `
                            <i class="fa fa-save me-2"></i>
                            {{ __('Perbarui') }}
                        `);
                    }
                });
            });

            $(document).on('submit', '#changePasswordForm', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#changePasswordForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);

                        setTimeout(() => {
                            window.location.reload();
                        }, 500);
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#changePasswordForm', `
                            <i class="fa fa-save me-2"></i>
                            {{ __('Ubah Kata Sandi') }}
                        `);
                    }
                });
            });
        });
    </script>
@endpush
