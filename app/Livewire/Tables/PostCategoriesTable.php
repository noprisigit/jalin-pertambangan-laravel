<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PostCategory;
use Rappasoft\LaravelLivewireTables\Views\Columns\IncrementColumn;

class PostCategoriesTable extends DataTableComponent
{
    protected $model = PostCategory::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setColumnSelectDisabled()
            ->setEmptyMessage(__('Tidak ada data yang ditemukan'))
            ->setTableAttributes([
                'class' => 'table table-bordered table-hover align-middle'
            ])
            ->setTheadAttributes([
                'class' => 'bg-primary align-middle',
            ]);
    }

    public function columns(): array
    {
        return [
            IncrementColumn::make(__('No')),
            Column::make(__('Nama Kategori'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('Dibuat Pada'), "created_at")
                ->sortable()
                ->searchable(),
            Column::make(__('Diperbarui Pada'), "updated_at")
                ->sortable()
                ->searchable(),
            Column::make(__('Aksi'), 'id')
                ->view('admin.pages.post.category.category-action'),
        ];
    }
}
