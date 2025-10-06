@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let timer = 1500;

        function show_sweetalert_success(message, callback = null) {
            Swal.fire({
                title: "{{ __('Berhasil') }}",
                text: message,
                icon: "success",
                timer: timer,
                customClass: {
                    confirmButton: 'btn btn-primary' // Menyesuaikan dengan Bootstrap
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
                    if (callback) {
                        callback();
                    }
                }
            });
        }

        function show_sweetalert_error(message) {
            Swal.fire({
                title: "{{ __('Gagal') }}",
                text: message,
                icon: "error",
                timer: timer,
                customClass: {
                    confirmButton: 'btn btn-danger' // Menyesuaikan dengan Bootstrap
                },
                buttonsStyling: false
            })
        }

        function show_sweetalert_warning(message) {
            Swal.fire({
                title: "{{ __('Peringatan') }}",
                text: message,
                icon: "warning",
                customClass: {
                    confirmButton: 'btn btn-warning' // Menyesuaikan dengan Bootstrap
                },
                buttonsStyling: false
            })
        }

        function show_sweetalert_delete_confirmation(message = '', callback = null) {
            Swal.fire({
                title: '{{ __('Apakah kamu yakin?') }}',
                text: message ?? '{{ __('Data yang dihapus tidak dapat dikembalikan lagi') }}',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: '{{ __('Ya, Hapus!') }}',
                cancelButtonText: '{{ __('Batal') }}'
            }).then((willDelete) => {
                if (willDelete) {
                    if (callback) callback();
                }
            });
        }
    </script>
@endpush
