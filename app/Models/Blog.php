<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public const TABLE_NAME = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];
}
