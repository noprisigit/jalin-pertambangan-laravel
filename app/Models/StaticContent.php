<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticContent extends Model
{
    protected $table = 'static_contents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'key',
        'page',
        'section',
        'content',
        'locale'
    ];
}
