<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
