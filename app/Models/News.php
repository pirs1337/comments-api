<?php

namespace App\Models;

use App\Contracts\CommentableModelContract;
use Illuminate\Database\Eloquent\Model;

class News extends Model implements CommentableModelContract
{
    protected $fillable = [
        'title',
        'description',
    ];
}
