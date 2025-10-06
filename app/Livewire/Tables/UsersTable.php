<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\IncrementColumn;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setColumnSelectDisabled()
            ->setEmptyMessage(__('Tidak ada data yang ditemukan'));
    }

    public function columns(): array
    {
        return [
            IncrementColumn::make(__('No.')),
            Column::make("Nama", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Dibuat Pada", "created_at")
                ->sortable()
                ->searchable(),
            Column::make("Diperbarui Pada", "updated_at")
                ->sortable()
                ->searchable(),
            Column::make(__('Aksi'), 'id')
                ->view('admin.pages.user.user-action'),
        ];
    }
}
