@extends('admin.app')

@section('title', __('Detail Produk'))

@section('content')
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-box-seam me-2"></i> Detail Produk
            </h5>
            <a href="{{ route('admin.products.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <div class="row g-4">
                {{-- Thumbnail --}}
                <div class="col-md-4 text-center">
                    <img src="{{ $product->thumbnail_url }}" class="img-fluid rounded shadow-sm" alt="Thumbnail Produk">
                </div>

                {{-- Informasi Produk --}}
                <div class="col-md-8">
                    <table class="table table-bordered align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Nama Produk</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $product->category->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{!! $product->description !!}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            </tr>
                            {{-- <tr>
                                <th>Status</th>
                                <td>
                                    @if ($product->is_active)
                                        <span class="badge bg-success text">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                            </tr> --}}
                            <tr>
                                <th>Dibuat Oleh</th>
                                <td>{{ $product->creator->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui Oleh</th>
                                <td>{{ $product->updater->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $product->created_at->translatedFormat('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui Pada</th>
                                <td>{{ $product->updated_at->translatedFormat('d F Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- File Terkait --}}
            @if ($product->files->count())
                <div class="mt-4">
                    <h5><i class="bi bi-paperclip me-2"></i> File Terkait</h5>
                    <ul class="list-group">
                        @foreach ($product->files as $file)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ asset('storage/' . $file->path) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $file->path) }}" class="img-fluid img-thumbnail"
                                        width="120" height="120" alt="{{ $file->original_name }}">
                                </a>

                                <a href="{{ asset('storage/' . $file->path) }}" target="_blank" download=""
                                    class="btn btn-outline-primary">
                                    <i class="bi bi-download"></i> Unduh
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
