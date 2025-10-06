@extends('admin.app')

@section('title', __('Edit Feedback #' . $feedback->id))

@section('content')
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Feedback #{{ $feedback->id }}</h4>
        </div>
        <div class="card-body">

            {{-- Form untuk Update --}}
            <form id="feedbackForm" action="{{ route('admin.feedbacks.update', $feedback->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Laravel menggunakan @method('PUT') untuk simulasi metode PUT --}}

                {{-- Handling Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    {{-- Kolom Kiri: Informasi Kontak --}}
                    <div class="col-md-6">
                        <h5 class="text-secondary">Informasi Kontak</h5>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $feedback->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $feedback->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ old('phone', $feedback->phone) }}">
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Perusahaan</label>
                            <input type="text" class="form-control" id="company" name="company"
                                value="{{ old('company', $feedback->company) }}">
                        </div>
                    </div>

                    {{-- Kolom Kanan: Pesan & Status --}}
                    <div class="col-md-6">
                        <h5 class="text-secondary">Pesan & Status</h5>

                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message', $feedback->message) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="publish"
                                    {{ old('status', $feedback->status) == 'publish' ? 'selected' : '' }}>Publish
                                </option>
                                <option value="unpublish"
                                    {{ old('status', $feedback->status) == 'unpublish' ? 'selected' : '' }}>Unpublish
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="mt-4">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.feedbacks.index') }}" class="btn btn-default">
                        <i class="fas fa-times me-2"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="fas fa-save me-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#feedbackForm', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#feedbackForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#feedbackForm', `
                            <i class="fa fa-save me-2"></i>
                            {{ __('Simpan Perubahan') }}
                        `);
                    }
                });
            });
        });
    </script>
@endpush
