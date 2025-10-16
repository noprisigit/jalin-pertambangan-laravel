<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex gap-3">
        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">{{ __('Aksi') }}</button>
        <ul class="dropdown-menu dropdown-block" style="">
            <li>
                <a class="dropdown-item text-primary" href="{{ route('admin.products.show', $row->id) }}">
                    <i class="fa fa-info-circle me-2"></i>
                    {{ __('Detail') }}
                </a>
            </li>

            <li>
                <a class="dropdown-item btn-edit text-warning" href="{{ route('admin.products.edit', $row->id) }}">
                    <i class="fa fa-pencil-alt me-2"></i>
                    {{ __('Edit') }}
                </a>
            </li>

            <li>
                <a class="dropdown-item btn-delete text-danger" data-process-type="livewire"
                    data-action="{{ route('admin.products.destroy', $row->id) }}" href="javascript:void(0)">
                    <i class="fa fa-trash-alt me-2"></i>
                    {{ __('Hapus') }}
                </a>
            </li>
        </ul>
    </div>
</div>
