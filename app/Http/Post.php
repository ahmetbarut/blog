<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Post extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class,'id');
    }
}
