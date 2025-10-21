@extends('admin.app')

@section('title', __('Detail Artikel'))

@section('content')
    <div class="card">
        {{-- Thumbnail --}}
        @if ($post->thumbnail)
            <img src="{{ $post->thumbnail_url }}" class="card-img-top" alt="{{ $post->title }}"
                style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="card-body">
            {{-- Header: Judul & Status --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title fw-bold mb-0">{{ $post->title }}</h4>
                @if ($post->status === 'publish')
                    <span class="badge bg-success text-white">Published</span>
                @elseif ($post->status === 'unpublish')
                    <span class="badge bg-danger text-white">Unpublished</span>
                @else
                    <span class="badge bg-secondary text-white">Draft</span>
                @endif
            </div>

            {{-- Info Meta --}}
            <p class="text-muted small mb-4">
                <i class="bi bi-person-circle me-1"></i>{{ $post->user->name ?? 'Admin' }}
                &nbsp;|&nbsp;
                <i class="bi bi-folder2-open me-1"></i>{{ $post->category->name ?? 'Uncategorized' }}
                &nbsp;|&nbsp;
                <i class="bi bi-calendar-event me-1"></i>{{ $post->created_at->format('d M Y, H:i') }}
            </p>

            {{-- Konten Post --}}
            <div class="card-text mb-4">
                {!! $post->content !!}
            </div>

            {{-- Lampiran --}}
            @if ($post->files->count() > 0)
                <h6 class="fw-semibold mb-3"><i class="bi bi-paperclip me-2"></i>Lampiran</h6>
                <ul class="list-group list-group-flush mb-4">
                    @foreach ($post->files as $file)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ asset('storage/' . $file->path) }}" target="_blank">
                                <span>{{ basename($file->original_name) }}</span>
                            </a>
                            <a href="{{ asset('storage/' . $file->path) }}" target="_blank" download
                                class="btn btn-outline-primary">
                                <i class="fas fa-download me-2"></i> Unduh
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning me-2">
                    <i class="fas fa-pencil me-2"></i>
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    {{ __('Kembali') }}
                </a>
            </div>
        </div>
    </div>
@endsection
