<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'short',
        'content',
        'image',
        'is_public',
        'views',
        'author_id',
        'publication_date',
    ];
}
