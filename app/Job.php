<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id', 'name', 'summary', 'duty', 'requirements', 'sort', 'is_top'
    ];

    public function depart()
    {
        return $this->hasOne('App\Department', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'job_has_tags');
    }

    public function scopeTags($query, $tag)
    {
        return $query->whereHas('tags', function ($query) use ($tag) {
            return $query->where('tag_id', $tag);
        });
    }
}
