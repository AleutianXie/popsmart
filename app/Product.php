<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'cover', 'content', 'sort', 'is_top', 'series_id','is_url'
    ];

    public function scopeSeries($query, $series)
    {
        $query->where('series_id', $series);
    }
}
