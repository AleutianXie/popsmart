<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class News extends Model
{
    use SoftDeletes;

    protected $appends = ['is_today'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'cover', 'content', 'sort', 'is_top'
    ];

    public function getIsTodayAttribute()
    {
        return $this->created_at->toDateString() == Carbon::today()->toDateString();
    }
}
