<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Service;
use Rappasoft\LaravelLivewireTables\Views\Columns\IncrementColumn;

class ServicesTable extends DataTableComponent
{
    protected $model = Service::class;

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
            Column::make("Icon", "icon")
                ->format(function ($value) {
                    return '<img src="' . asset('storage/' . $value) . '" alt="Icon Layanan" class="img-fluid img-thumbnail" width="80" height="80" />';
                })
                ->html(),
            Column::make(__('Nama Layanan'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('Keterangan'), "description")
                ->sortable()
                ->searchable(),

            Column::make(__('Aksi'), 'id')
                ->view('admin.pages.service.service-action'),
        ];
    }
}
