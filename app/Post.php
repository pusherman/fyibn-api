<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toATOMString();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function history()
    {
        return $this->hasMany('App\History');
    }

    public function latestComment()
    {
        return $this->hasOne('App\Comment')->latest();
    }

    public function commentCount() {
        return $this->comments()
            ->selectRaw('post_id, count(*) as aggregate')
            ->groupBy('post_id');

    }
}
