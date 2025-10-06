<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostCategory extends Model
{
    protected $table = 'post_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'created_by',
        'updated_by'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id');
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
