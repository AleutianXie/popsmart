<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    public function scopeCategory($query, $cate)
    {
        $query->where('category_id', $cate);
    }
}
