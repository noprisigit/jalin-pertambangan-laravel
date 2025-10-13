<div class="modal fade" id="modal-delete-confirmation" tabindex="-1" role="dialog"
    aria-labelledby="modal-delete-confirmation" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-toggle-wrapper">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    </div>
                    <h2 class="text-center pb-2">{{ __('Apakah anda yakin?') }}</h2>
                    <p class="text-center">{{ __('Data yang akan anda hapus tidak dapat dikembalikan') }}</p>

                    <div class="text-center d-flex justify-content-center align-items-center gap-3 mx-auto mt-4">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">
                            <i class="fa fa-times me-2"></i>
                            {{ __('Batal') }}
                        </button>
                        <form id="form-delete" action="" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="process_type" id="process_type">
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash-alt me-2"></i>
                                {{ __('Hapus') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();

                $(document).find('#modal-delete-confirmation').modal('show');

                const url = $(this).data('action');

                const processType = $(this).attr('data-process-type');
                if (processType) {
                    $('#modal-delete-confirmation #form-delete input[name="process_type"]').val(
                        processType);
                }

                $('#modal-delete-confirmation #form-delete').attr('action', url);
            });

            $(document).on('submit', '#form-delete', function(e) {
                e.preventDefault();

                const processType = $('#form-delete [name="process_type"]').val();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $('#form-delete').attr('disabled', true);
                        $('#form-delete').addClass('disabled');
                        $('#form-delete').find('button[type="submit"]').html(`
                            <i class="fa fa-spinner fa-spin"></i>
                            {{ __('Loading...') }}
                        `)
                    },
                    success: function(res) {
                        $('#modal-delete-confirmation').modal('hide');
                        show_sweetalert_success(res.message);

                        if (processType && processType === 'livewire') {
                            Livewire.dispatch('refreshDatatable');
                        } else {
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function(err) {
                        $('#modal-delete-confirmation').modal('hide');

                        if (err.status === 422) {
                            show_toast_error();
                        } else {
                            const message = err?.responseJSON?.message;
                            show_sweetalert_error(message ?? '');
                        }
                    },
                    complete: function() {
                        $('#form-delete').attr('disabled', false);
                        $('#form-delete').removeClass('disabled');
                        $('#form-delete').find('button[type="submit"]').html(`
                            <i class="fa fa-trash"></i>
                            {{ __('Hapus') }}
                        `)
                    }
                });
            });
        });
    </script>
    <script>
        function handle_error_exception(err) {
            const responseJSON = err.responseJSON;

            if (err.status === 422) {
                const errors = responseJSON?.errors;
                handle_validation_errors(errors);
            } else if (err.status === 401) {

            } else {
                const message = responseJSON?.message;
                show_sweetalert_error(message);
            }
        }

        function handle_validation_errors(errors) {
            for (const [key, value] of Object.entries(errors)) {
                $(document).find(`[id="${key}"]`).addClass("is-invalid border border-danger");
                $(document)
                    .find(`[id='${key}']`)
                    .parent()
                    .append(`<div class="invalid-feedback">${value[0]}</div>`);
            }
        }

        function handle_before_submit_form(formId) {
            $(document).find(`${formId} .form-control, ${formId} .form-select`).removeClass(
                "is-invalid border border-danger");
            $(document).find(`${formId} .invalid-feedback`).remove();

            const buttonSubmit = $(document).find(`${formId} button[type="submit"]`);

            buttonSubmit.attr('disabled', true);
            buttonSubmit.addClass("disabled").html(`
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                {{ __('Loading...') }}
            `);
        }

        function handle_submit_completed(formId, buttonText = '{{ __('Kirim') }}') {
            $(document)
                .find(`${formId} button[type=submit]`)
                .attr('disabled', false)
                .removeClass("disabled");
            $(document).find(`${formId} button[type="submit"]`).html(buttonText);
        }
    </script>
@endpush
