@extends('admin.app')

@section('title', __('Manajemen Layanan'))

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond@4/dist/filepond.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.min.css"
        rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                {{ __('Manajemen Layanan') }}
            </h3>
            <button type="button" class="btn btn-primary btn-add" data-action="{{ route('admin.services.store') }}">
                <i class="fas fa-plus me-2"></i>
                {{ __('Tambah Layanan') }}
            </button>
        </div>
        <div class="card-body">
            <livewire:tables.services-table />
        </div>
    </div>

    <div class="modal modal-blur fade" id="serviceModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-3 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.services.store') }}" id="serviceForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label required"> {{ __('Nama Layanan') }} </label>
                            <input type="text" name="name" id="name" placeholder="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label required">{{ __('Keterangan') }}</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="icon" class="form-label required">{{ __('Icon') }}</label>
                            <input type="file" name="icon" id="icon" accept="image/*" class="form-control">
                            <small class="text-muted fst-italic">
                                Upload Icon (.jpg, .jpeg, .png).
                                <br>Ukuran maksimalnya adalah <strong>2 MB</strong>.
                            </small>
                        </div>

                        <div id="icon-wrapper" class="d-none">
                            <img id="icon-image" src="" alt="" width="80" height="80"
                                class="img-fluid img-thumbnail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>
                            {{ __('Batal') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- FilePond core + plugins -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type@1/dist/filepond-plugin-file-validate-type.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond@4/dist/filepond.min.js"></script>

    <script>
        $(document).ready(function() {
            FilePond.registerPlugin(
                FilePondPluginFileValidateType,
                FilePondPluginImagePreview
            );

            // Thumbnail (hanya 1 file gambar)
            const pondIcon = FilePond.create(document.getElementById('icon'), {
                allowMultiple: false,
                credits: false,
                acceptedFileTypes: ['image/*'],
                storeAsFile: true, // supaya file ikut ke FormData Laravel
                instantUpload: false,
                labelIdle: 'Seret & lepaskan file di sini atau <span class="filepond--label-action">Telusuri</span>'
            });

            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();

                const action = $(this).attr('data-action')
                const modalEl = $('#serviceModal');
                const form = modalEl.find('form');
                form.attr('action', action);
                form.find('input[name="_method"]').remove();
                form.trigger('reset');
                form.find('button[type="submit"]').html(`
                    <i class="fas fa-paper-plane me-2"></i>
                    {{ __('Kirim') }}
                `);

                modalEl.find('h5').html(`{{ __('Form Tambah Layanan') }}`);
                modalEl.find('#icon-wrapper').add('d-none');
                modalEl.modal('show');
            });

            $(document).on('submit', '#serviceForm', function(e) {
                e.preventDefault();

                const $form = $(this);
                const $submitBtn = $form.find('[type="submit"]');
                const originalBtnHtml = $submitBtn.html(); // simpan isi tombol asli

                let formData = new FormData($(this)[0]);

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#serviceForm');
                    },
                    success: function(res) {
                        $('#serviceModal').modal('hide');

                        show_sweetalert_success(res.message);
                        Livewire.dispatch('refreshDatatable');

                        // ✅ Reset form dan FilePond
                        const form = $('#serviceForm')[0];
                        form.reset();

                        // Kosongkan file di FilePond
                        pondIcon.removeFiles();
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#serviceForm', originalBtnHtml);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function(e) {
                e.preventDefault();

                const service = JSON.parse($(this).attr('data-service'));
                const action = $(this).attr('data-action');

                const modalEl = $('#serviceModal');
                const form = modalEl.find('form');
                form.attr('action', action);
                if (form.find('input[name="_method"]').length === 0) {
                    form.append('<input type="hidden" name="_method" value="PUT">');
                } else {
                    form.find('input[name="_method"]').val('PUT');
                }

                form.find('button[type="submit"]').html(`
                    <i class="fas fa-save me-2"></i>
                    {{ __('Simpan') }}
                `);

                form.find('input[name="name"]').val(service.name);
                form.find('textarea[name="description"]').val(service.description);
                form.find('#icon-image').attr('src', service.icon_url);

                modalEl.find('h5').html(`{{ __('Form Edit Layanan') }}`);
                modalEl.find('#icon-wrapper').removeClass('d-none');
                modalEl.modal('show');
            });
        });
    </script>
@endpush
