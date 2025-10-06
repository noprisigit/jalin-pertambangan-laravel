@extends('admin.app')

@section('title', __('Edit Artikel'))

@php
    $breadcrumbs = [
        [
            'label' => __('Artikel'),
            'url' => route('admin.posts.index'),
        ],
        [
            'label' => __('Edit'),
        ],
    ];
@endphp

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond@4/dist/filepond.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">{{ __('Form Edit Artikel') }}</h3>
        </div>
        <form method="POST" id="postForm" class="app-form" action="{{ route('admin.posts.update', $post->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group mb-3">
                            <label class="form-label required" for="title">
                                {{ __('Judul') }}
                            </label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $post->title) }}" placeholder="Judul...">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @php
                        $col = 'col-md-12';
                    @endphp

                    <div class="col-12 {{ $col }}">
                        <div class="form-group mb-3">
                            <label class="form-label" for="post_category_id">
                                {{ __('Kategori') }}
                            </label>
                            <select name="post_category_id" id="post_category_id">
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" @selected($item->id == $post->post_category_id)>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted fst-italic d-block">
                                Pilih kategori yang sudah ada, atau ketik kategori baru lalu tekan <strong>Enter</strong>.
                            </small>
                        </div>
                    </div>


                    <div class="col-12 {{ $col }}">
                        <div class="form-group mb-3">
                            <label class="form-label" for="judul">
                                {{ __('Status') }}
                            </label>
                            <select name="status" id="status" class="form-control">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="draft" @selected($post->status == 'draft')>{{ __('Draft') }}</option>
                                <option value="publish" @selected($post->status == 'publish')>{{ __('Publish') }}</option>
                                <option value="unpublish" @selected($post->status == 'unpublish')>{{ __('Unpublish') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label required" for="konten">
                        {{ __('Konten') }}
                    </label>
                    <div id="quill-editor" style="height: 300px; background:#fff;">{!! $post->content !!}</div>
                    <!-- Hidden inputs untuk dikirim -->
                    <input type="hidden" class="@error('content_html') is-invalid @enderror" name="content_html"
                        id="content_html" value="{{ $post->content }}">
                    @error('content_html')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control">
                    <small class="text-muted fst-italic">
                        Upload gambar thumbnail (.jpg, .png).
                        <br>Ukuran maksimalnya adalah <strong>2 MB</strong>.
                    </small>
                    @if ($post->thumbnail)
                        <div class="mt-2">
                            <img src="{{ $post->thumbnail_url }}" alt="Thumbnail" class="img-thumbnail"
                                style="max-height: 150px;">
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">
                        Lampiran (opsional)
                    </label>
                    <input type="file" name="attachments[]" id="attachments" multiple>
                    <small class="text-muted fst-italic d-block">
                        Anda dapat mengunggah beberapa file sekaligus (misalnya: PDF, Gambar, Word, Excel, atau PowerPoint).
                        <br>Ukuran maksimal setiap file adalah <strong>5 MB</strong>.
                    </small>
                </div>

                @if ($post->files->isNotEmpty())
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lampiran yang sudah ada</label>
                        <ul id="existing_attachments" class="list-group small">
                            @foreach ($post->files as $file)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ asset('storage/' . $file->path) }}" target="_blank">
                                        {{ $file->original_name }}
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete-file"
                                        data-action="{{ route('posts.files.destroy', $file->id) }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>
                    {{ __('Simpan') }}
                </button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-default">
                    <i class="fas fa-times me-2"></i>
                    {{ __('Batal') }}
                </a>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <!-- Quill core -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <!-- Quill image uploader plugin -->
    <script src="https://cdn.jsdelivr.net/npm/quill-image-uploader@1.5.3/dist/quill.imageUploader.min.js"></script>

    <!-- FilePond core + plugins -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type@1/dist/filepond-plugin-file-validate-type.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond@4/dist/filepond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            new TomSelect("#post_category_id", {
                create: true, // true kalau mau bisa tambah value baru
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });

            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Tulis konten di sini...',
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, 3, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image', 'clean']
                    ],
                }
            });

            // const form = document.getElementById('postForm');
            // form.addEventListener('submit', () => {
            //     document.getElementById('content_html').value = quill.root.innerHTML;
            // });

            FilePond.registerPlugin(
                FilePondPluginFileValidateType,
                FilePondPluginImagePreview
            );

            // Thumbnail (hanya 1 file gambar)
            FilePond.create(document.getElementById('thumbnail'), {
                allowMultiple: false,
                credits: false,
                acceptedFileTypes: ['image/*'],
                storeAsFile: true, // supaya file ikut ke FormData Laravel
                instantUpload: false,
                labelIdle: 'Seret & lepaskan file di sini atau <span class="filepond--label-action">Telusuri</span>'
            });

            FilePond.create(document.getElementById('attachments'), {
                allowMultiple: true,
                credits: false,
                acceptedFileTypes: [
                    'application/pdf',
                    'image/*',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/vnd.ms-powerpoint',
                    'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                ],
                storeAsFile: true,
                instantUpload: false,
                labelIdle: 'Seret & lepaskan file di sini atau <span class="filepond--label-action">Telusuri</span>'
                // Tanpa server processing: biarkan form submission standard ke Laravel
            });

            $(document).on('submit', '#postForm', function(e) {
                e.preventDefault();

                $(document).find(`#postForm .form-control, #postForm .form-select`).removeClass(
                    "is-invalid border border-danger");
                $(document).find(`#postForm .invalid-feedback`).remove();

                $('#content_html').val(quill.root.innerHTML);

                let formData = new FormData($(this)[0]);

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#postForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);

                        setTimeout(() => {
                            window.location.href = '{{ route('admin.posts.index') }}';
                        }, 500);
                    },
                    error: function(err) {
                        if (err.status === 422) {
                            // Ambil errors dari response JSON
                            let errors = err.responseJSON.errors;

                            // Loop dan tampilkan error di masing-masing input
                            for (let field in errors) {
                                let message = errors[field][0]; // ambil pesan dari Laravel

                                if (field.startsWith('attachments')) {
                                    // tampilkan 1 pesan saja untuk attachments
                                    let input = $('#attachments');
                                    input.addClass('is-invalid');

                                    if (input.next('.invalid-feedback').length === 0) {
                                        input.after(
                                            `<div class="invalid-feedback">${message}</div>`
                                        );
                                    }
                                } else if (field === 'thumbnail') {
                                    let input = $('#thumbnail');
                                    input.addClass('is-invalid');

                                    if (input.next('.invalid-feedback').length === 0) {
                                        input.after(
                                            `<div class="invalid-feedback">${message}</div>`
                                        );
                                    }
                                } else {
                                    // Input lain
                                    let input = $(`[name="${field}"]`);
                                    if (input.length) {
                                        input.addClass('is-invalid');

                                        if (input.next('.invalid-feedback').length === 0) {
                                            input.after(
                                                `<div class="invalid-feedback">${message}</div>`
                                            );
                                        } else {
                                            input.next('.invalid-feedback').text(message);
                                        }
                                    }
                                }
                            }
                        } else {
                            handle_error_exception(err); // error lain
                        }
                    },
                    complete: function() {
                        handle_submit_completed('#postForm', `
                            <i class="fa fa-paper-plane me-1"></i>
                            {{ __('Kirim') }}
                        `);
                    }
                });
            });
        });
    </script>
@endpush
