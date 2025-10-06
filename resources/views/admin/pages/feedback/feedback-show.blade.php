@extends('admin.app')

@section('title', __('Detail Tanggapan & Masukan'))


@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Feedback #{{ $feedback->id }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-primary">Informasi Kontak</h5>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-4">Nama:</dt>
                            <dd class="col-sm-8">{{ $feedback->name }}</dd>

                            <dt class="col-sm-4">Email:</dt>
                            <dd class="col-sm-8">{{ $feedback->email }}</dd>

                            <dt class="col-sm-4">Telepon:</dt>
                            <dd class="col-sm-8">{{ $feedback->phone ?? '-' }}</dd>

                            <dt class="col-sm-4">Perusahaan:</dt>
                            <dd class="col-sm-8">{{ $feedback->company ?? '-' }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary">Status dan Tanggal</h5>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-4">Status:</dt>
                            <dd class="col-sm-8">
                                <span class="badge text-white {{ $feedback->status == 'publish' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($feedback->status) }}
                                </span>
                            </dd>

                            <dt class="col-sm-4">Diterima Pada:</dt>
                            <dd class="col-sm-8">{{ $feedback->created_at->format('d M Y, H:i') }}</dd>
                        </dl>
                    </div>
                </div>

                <h5 class="text-primary mt-4">Pesan</h5>
                <hr>
                <div class="alert alert-light border">
                    {{ $feedback->message }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.feedbacks.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                    {{-- Anda bisa menambahkan tombol lain seperti 'Edit' atau 'Tandai Selesai' di sini --}}
                </div>
            </div>
        </div>
    </div>
@endsection
