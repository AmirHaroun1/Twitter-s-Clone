<?php

namespace App;
use App\likers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    //
protected $fillable =
    [
        'body',
        'user_id',
        'reply',
    ];
    public function scopeCheckLikes($query)
    {

    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function likers()
    {
        return $this->belongsToMany('App\User','likes','tweet_id','user_id');
    }
    public function replies()
    {
        return $this->belongsToMany('App\tweet','replies','tweet_id','reply_id');
    }

}
