<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Post;
use Rappasoft\LaravelLivewireTables\Views\Columns\IncrementColumn;

class PostsTable extends DataTableComponent
{
    protected $model = Post::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setColumnSelectDisabled()
            ->setEmptyMessage(__('Tidak ada data yang ditemukan'));
    }

    public function columns(): array
    {
        $columns = [
            IncrementColumn::make(__('No')),
            Column::make("Kategori", "category.name")
                ->sortable()
                ->searchable(),
            Column::make("Judul", "title")
                ->sortable()
                ->searchable(),
            Column::make("Dilihat", "read_by")
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->format(function ($value) {
                    return match ($value) {
                        'draft' => '<span class="badge text-white bg-secondary">Draft</span>',
                        'publish' => '<span class="badge text-white bg-success">Publish</span>',
                        'unpublish' => '<span class="badge text-white bg-danger">Unpublish</span>',
                        default => '<span class="badge text-white bg-dark">Unknown</span>',
                    };
                })
                ->html(),
            Column::make(__('Aksi'), 'id')
                ->view('admin.pages.post.post-action'),
        ];

        return $columns;
    }
}
