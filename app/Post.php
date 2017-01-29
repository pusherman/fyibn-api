<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
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
