<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class PostFile extends Model
{
    protected $table = 'post_files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'post_id',
        'path',
        'original_name',
        'mime',
        'size',
        'created_by',
        'updated_by'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function getUrlAttribute(): string
    {
        return Storage::url($this->path);
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
