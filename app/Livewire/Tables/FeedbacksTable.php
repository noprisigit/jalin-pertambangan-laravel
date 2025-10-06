<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Feedback;
use Rappasoft\LaravelLivewireTables\Views\Columns\IncrementColumn;

class FeedbacksTable extends DataTableComponent
{
    protected $model = Feedback::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setColumnSelectDisabled()
            ->setEmptyMessage(__('Tidak ada data yang ditemukan'));
    }

    public function columns(): array
    {
        return [
            IncrementColumn::make(__('No')),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone", "phone")
                ->sortable()
                ->searchable(),
            Column::make("Company", "company")
                ->sortable()
                ->searchable(),
            Column::make(__('Aksi'), 'id')
                ->view('admin.pages.feedback.feedback-action'),
        ];
    }
}
