<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'post_category_id',
        'user_id',
        'title',
        'content',
        'read_by',
        'created_by',
        'updated_by',
        'slug',
        'thumbnail',
        'status'
    ];

    protected static function booted(): void
    {
        static::deleting(function (Post $post) {
            // pastikan relasi ter-load
            $post->loadMissing('files:id,path,post_id');

            // hapus file satu per satu
            foreach ($post->files as $pf) {
                if ($pf->path) {
                    Storage::disk('public')->delete($pf->path);
                }
            }

            // opsional: hapus folder khusus post ini
            $dir = "uploads/posts/files/{$post->id}";
            if (Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->deleteDirectory($dir);
            }

            if ($post->thumbnail && $post->thumbnail !== 'assets/logo-sigap1.png') {
                if (Storage::disk('public')->exists($post->thumbnail)) {
                    Storage::disk('public')->delete($post->thumbnail);
                }
            }
        });
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->konten), 150, '...');
    }

    public function getThumbnailUrlAttribute()
    {
        if (Str::startsWith($this->thumbnail, 'uploads/posts/thumbnails')) {
            return asset('storage/' . $this->thumbnail);
        }

        return asset($this->thumbnail ?? 'assets/logo-sigap1.png');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(PostFile::class);
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
