<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
        'description',
        'thumbnail',
        'is_active',
        'price',
        'created_by',
        'updated_by'
    ];

    protected static function booted(): void
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::deleting(function (Product $product) {
            // pastikan relasi ter-load
            $product->loadMissing('files:id,path,product_id');

            // hapus file satu per satu
            foreach ($product->files as $pf) {
                if ($pf->path) {
                    Storage::disk('public')->delete($pf->path);
                }
            }

            // opsional: hapus folder khusus product ini
            $dir = "uploads/products/files/{$product->id}";
            if (Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->deleteDirectory($dir);
            }

            if ($product->thumbnail && $product->thumbnail !== 'assets/logo-sigap1.png') {
                if (Storage::disk('public')->exists($product->thumbnail)) {
                    Storage::disk('public')->delete($product->thumbnail);
                }
            }
        });
    }

    public function getThumbnailUrlAttribute()
    {
        if (Str::startsWith($this->thumbnail, 'uploads/products/thumbnails')) {
            return asset('storage/' . $this->thumbnail);
        }

        return asset($this->thumbnail ?? 'assets/logo-sigap1.png');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(ProductFile::class, 'product_id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}