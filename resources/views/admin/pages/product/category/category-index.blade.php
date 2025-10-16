@extends('admin.app')

@section('title', __('Kategori Produk'))

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                {{ __('Manajemen Kategori Produk') }}
            </h3>
            <button type="button" class="btn btn-primary btn-add" data-action="{{ route('admin.products.categories.store') }}">
                <i class="fas fa-plus me-2"></i>
                {{ __('Tambah Kategori') }}
            </button>
        </div>
        <div class="card-body">
            <livewire:tables.product-categories-table />
        </div>
    </div>

    <div class="modal modal-blur fade" id="productCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-3 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.products.categories.store') }}" id="productCategoryForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label required"> {{ __('Nama Kategori') }} </label>
                            <input type="text" name="name" id="name" placeholder="" class="form-control">
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
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();

                const action = $(this).attr('data-action')
                const modalEl = $('#productCategoryModal');
                const form = modalEl.find('form');
                form.attr('action', action);
                form.find('input[name="_method"]').remove();
                form.trigger('reset');
                form.find('button[type="submit"]').html(`
                    <i class="fas fa-paper-plane me-2"></i>
                    {{ __('Kirim') }}
                `);

                modalEl.find('h5').html(`{{ __('Form Tambah Kategori') }}`);
                modalEl.modal('show');
            });

            $(document).on('submit', '#productCategoryForm', function(e) {
                e.preventDefault();

                const $form = $(this);
                const $submitBtn = $form.find('[type="submit"]');
                const originalBtnHtml = $submitBtn.html(); // simpan isi tombol asli

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#productCategoryForm');
                    },
                    success: function(res) {
                        $('#productCategoryModal').modal('hide');

                        show_sweetalert_success(res.message);
                        Livewire.dispatch('refreshDatatable');
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#productCategoryForm', originalBtnHtml);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function(e) {
                e.preventDefault();

                const productCategory = JSON.parse($(this).attr('data-product-category'));
                const action = $(this).attr('data-action');

                const modalEl = $('#productCategoryModal');
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

                form.find('input[name="name"]').val(productCategory.name);

                modalEl.find('h5').html(`{{ __('Form Edit Kategori') }}`);
                modalEl.modal('show');
            });
        });
    </script>
@endpush
