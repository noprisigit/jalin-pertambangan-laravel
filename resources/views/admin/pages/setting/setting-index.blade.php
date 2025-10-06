@extends('admin.app')

@section('title', __('Pengaturan Sistem'))

@section('content')
    <div class="row">
        <div class="col-12">
            <form class="card" id="settingForm" method="POST" action="{{ route('admin.settings.store') }}">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">{{ __('Pengaturan Umum') }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="address" class="col-3 col-lg-2 col-form-label required">
                            {{ __('Alamat') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="{{ __('Masukkan Alamat Lengkap Anda') }}"
                                value="{{ getStaticContent('address') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone" class="col-3 col-lg-2 col-form-label required">
                            {{ __('Nomor Telepon') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="{{ __('Masukkan Nomor Telepon Anda') }}"
                                value="{{ getStaticContent('phone') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-3 col-lg-2 col-form-label required">
                            {{ __('Email') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="{{ __('Masukkan Email Anda') }}" value="{{ getStaticContent('email') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="workingHour" class="col-3 col-lg-2 col-form-label required">
                            {{ __('Jam Kerja') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="text" name="workingHour" id="workingHour" class="form-control"
                                placeholder="{{ __("Senin - Jum'at: 08.00 - 16.00 WIB") }}" value="{{ getStaticContent('workingHour') }}">
                        </div>
                    </div>
                    <div class="text-start row">
                        <div class="col-3 col-lg-2"></div>
                        <div class="col col-lg-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                {{ __('Simpan') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <form class="card" id="socialMediaForm" method="POST" action="{{ route('admin.settings.store-social-media') }}">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">{{ __('Pengaturan Sosial Media') }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="facebook" class="col-3 col-lg-2 col-form-label">
                            {{ __('Facebook') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="url" name="facebook" id="facebook" class="form-control"
                                placeholder="{{ __('Masukkan Alamat Facebook Anda') }}"
                                value="{{ getStaticContent('facebook') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="twitter" class="col-3 col-lg-2 col-form-label">
                            {{ __('Twitter') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="url" name="twitter" id="twitter" class="form-control"
                                placeholder="{{ __('Masukkan Alamat Twitter Anda') }}"
                                value="{{ getStaticContent('twitter') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="youtube" class="col-3 col-lg-2 col-form-label">
                            {{ __('Youtube') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="url" name="youtube" id="youtube" class="form-control"
                                placeholder="{{ __('Masukkan Alamat Youtube Anda') }}"
                                value="{{ getStaticContent('youtube') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="instagram" class="col-3 col-lg-2 col-form-label">
                            {{ __('Instagram') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="url" name="instagram" id="instagram" class="form-control"
                                placeholder="{{ __('Masukkan Alamat Instagram Anda') }}"
                                value="{{ getStaticContent('instagram') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tiktok" class="col-3 col-lg-2 col-form-label">
                            {{ __('Tiktok') }}
                        </label>
                        <div class="col col-lg-10">
                            <input type="url" name="tiktok" id="tiktok" class="form-control"
                                placeholder="{{ __('Masukkan Alamat Tiktok Anda') }}"
                                value="{{ getStaticContent('tiktok') }}">
                        </div>
                    </div>
                    <div class="text-start row">
                        <div class="col-3 col-lg-2"></div>
                        <div class="col col-lg-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                {{ __('Simpan') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#settingForm', function(e) {
                e.preventDefault();

                const $form = $(this);
                const $submitBtn = $form.find('[type="submit"]');
                const originalBtnHtml = $submitBtn.html();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#settingForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#settingForm', originalBtnHtml);
                    }
                });
            });

            $(document).on('submit', '#socialMediaForm', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#socialMediaForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#socialMediaForm', `
                            <i class="fa fa-save me-1"></i>
                            {{ __('Simpan') }}
                        `);
                    }
                });
            });
        });
    </script>
@endpush
