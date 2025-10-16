<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Rappasoft\LaravelLivewireTables\Views\Columns\IncrementColumn;

class ProductsTable extends DataTableComponent
{
    protected $model = Product::class;

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
            Column::make(__('Kategori'), "category.name")
                ->sortable()
                ->searchable(),
            Column::make(__('Nama Produk'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('Harga'), "price")
                ->format(function ($value) {
                    return 'Rp ' . number_format($value, 0, ',', '.');
                })
                ->sortable()
                ->searchable(),
            Column::make(__('Aksi'), 'id')
                ->view('admin.pages.product.product-action'),
        ];
    }
}
