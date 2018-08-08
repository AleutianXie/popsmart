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
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'job_has_tags');
    }

    /**
     * Assign the given tags to the job.
     *
     * @param array ...$tags
     *
     * @return $this
     */
    public function assignTags(...$tags)
    {
        $tag_ids = $this->tags()->pluck('tag_id')->toArray();
        $del_ids = array_diff($tag_ids, array_flatten($tags));
        $tags = collect($tags)
            ->flatten()
            ->filter(function ($id) use ($tag_ids) {
                return !in_array($id, $tag_ids);
            })
            ->map(function ($id) {
                return Tag::findorFail($id);
            })
            ->all();

        if (!empty($del_ids)) {
            $delTags = $this->tags()->whereIn('tag_id', $del_ids)->get();
            $this->tags()->detach($delTags);
        }

        return $this->tags()->saveMany($tags);
    }
    public function scopeTags($query, $tag)
    {
        return $query->whereHas('tags', function ($query) use ($tag) {
            return $query->where('tag_id', $tag);
        });
    }
}
