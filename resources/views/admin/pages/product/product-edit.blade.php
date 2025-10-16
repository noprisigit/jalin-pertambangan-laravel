@extends('admin.app')

@section('title', __('Edit Produk'))

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
            <h3 class="card-name">{{ __('Form Edit Produk') }}</h3>
        </div>
        <form method="POST" id="productForm" class="app-form" action="{{ route('admin.products.update', $product->id) }}"
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
                    <div class="col-12 col-md-8">
                        <div class="form-group mb-3">
                            <label class="form-label required" for="name">
                                {{ __('Nama Produk') }}
                            </label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $product->name) }}" placeholder="Judul...">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="product_category_id">
                                {{ __('Kategori') }}
                            </label>
                            <select name="product_category_id" id="product_category_id">
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" @selected($item->id == $product->product_category_id)>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted fst-italic d-block">
                                Pilih kategori yang sudah ada, atau ketik kategori baru lalu tekan <strong>Enter</strong>.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label required" for="description">
                        {{ __('Keterangan') }}
                    </label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="price">
                        {{ __('Harga') }}
                    </label>
                    <input type="text" name="price_display" id="price_display" class="form-control" placeholder="Rp 0"
                        value="{{ old('price', $product->price) ? 'Rp ' . number_format(old('price', $product->price), 0, ',', '.') : '' }}"
                        oninput="formatRupiah(this)">
                    <input type="hidden" name="price" id="price" value="{{ old('price', $product->price) }}">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control">
                    <small class="text-muted fst-italic">
                        Upload gambar thumbnail (.jpg, .png).
                        <br>Ukuran maksimalnya adalah <strong>2 MB</strong>.
                    </small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">
                        Gambar-Gambar Produk (opsional)
                    </label>
                    <input type="file" name="attachments[]" id="attachments" multiple>
                    <small class="text-muted fst-italic d-block">
                        Anda dapat mengunggah beberapa gambar produk sekaligus.
                        <br>Ukuran maksimal setiap file adalah <strong>5 MB</strong>.
                    </small>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>
                    {{ __('Simpan') }}
                </button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-light">
                    <i class="fas fa-times me-2"></i>
                    {{ __('Batal') }}
                </a>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <!-- FilePond core + plugins -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type@1/dist/filepond-plugin-file-validate-type.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond@4/dist/filepond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            new TomSelect("#product_category_id", {
                create: true, // true kalau mau bisa tambah value baru
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });

            // const form = document.getElementById('productForm');
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
                    'image/*',
                ],
                storeAsFile: true,
                instantUpload: false,
                labelIdle: 'Seret & lepaskan file di sini atau <span class="filepond--label-action">Telusuri</span>'
                // Tanpa server processing: biarkan form submission standard ke Laravel
            });

            $(document).on('submit', '#productForm', function(e) {
                e.preventDefault();

                $(document).find(`#productForm .form-control, #productForm .form-select`).removeClass(
                    "is-invalid border border-danger");
                $(document).find(`#productForm .invalid-feedback`).remove();

                let formData = new FormData($(this)[0]);

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#productForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);

                        setTimeout(() => {
                            window.location.href =
                                '{{ route('admin.products.index') }}';
                        }, 500);
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#productForm', `
                            <i class="fa fa-save me-2"></i>
                            {{ __('Simpan') }}
                        `);
                    }
                });
            });
        });

        function formatRupiah(input) {
            let value = input.value.replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
            if (value === '') {
                document.getElementById('price').value = '';
                input.value = '';
                return;
            }

            // Format angka ke format ribuan Indonesia
            let formatted = new Intl.NumberFormat('id-ID').format(value);

            // Tampilkan di input display
            input.value = 'Rp ' + formatted;

            // Simpan nilai asli (angka mentah) di input hidden
            document.getElementById('price').value = value;
        }
    </script>
@endpush
