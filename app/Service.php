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

    public function module()
    {
        return $this->hasOne('App\Module', 'id', 'module_id');
    }

    public function scopeIndustry($query, $module)
    {
        $query->where('module_id', $module);
    }
}
