<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'cover', 'content', 'sort', 'is_top', 'module_id'
    ];

    public function scopeModule($query, $module)
    {
        $query->where('module_id', $module);
    }
}
