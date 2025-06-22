<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    public const TABLE_NAME = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function posts(): hasMany {
        return $this->hasMany(Post::class);
    }
}
