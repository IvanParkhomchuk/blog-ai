<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'posts';

    protected $fillable = [
        'blog_id',
        'title',
        'slug',
        'description',
    ];

    public function blog(): BelongsTo {
        return $this->belongsTo(Blog::class);
    }
}
