<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toATOMString();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
