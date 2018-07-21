<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cases extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'cover', 'content', 'sort', 'is_top', 'category_id'
    ];

    public function scopeCategory($query, $cate)
    {
        $query->where('category_id', $cate);
    }
}
