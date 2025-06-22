<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

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
