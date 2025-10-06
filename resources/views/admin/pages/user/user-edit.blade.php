@extends('admin.app')

@section('title', __('Edit Pengguna'))

@php
    $breadcrumbs = [
        [
            'label' => __('Pengguna'),
            'url' => route('admin.users.index'),
        ],
        [
            'label' => __('Edit'),
        ],
    ];
@endphp

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Form Edit Pengguna') }}
            </h3>
        </div>
        <form class="app-form" id="userForm" action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label required">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>
                    {{ __('Simpan') }}
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                    <i class="fas fa-times me-2"></i>
                    {{ __('Batal') }}
                </a>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on('submit', '#userForm', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#userForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);

                        setTimeout(() => {
                            window.location.href = '{{ route('admin.users.index') }}'
                        }, 500);
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#userForm', `
                            <i class="fa fa-paper-plane me-1"></i>
                            {{ __('Kirim') }}
                        `);
                    }
                });
            });
        });
    </script>
@endpush
