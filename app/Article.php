<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'content', 'attribute_id', 'enabled'
    ];

    public function attribute()
    {
        return $this->hasOne('App\Attribute', 'id', 'attribute_id');
    }

    public function scopeAttribute($query, $attribute)
    {
        return $query->whereHas('attribute', function ($query) use ($attribute) {
            return $query->where('name', $attribute);
        });
    }
}
