<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar','cover','bio',
       'user_name', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getMyAvatar()
    {
        if(!file_exists(public_path().'/storage'.$this->avatar))
        {
            return asset('storage/'.$this->avatar);
        }
        else return asset('images/unknown.png');
    }
    public function getMyCover()
    {
        if(!file_exists(public_path().'/storage'.$this->cover))
        {
            return asset('storage/'.$this->cover);
        }
        else return asset('images/banner2.jpg');
    }
    public function follows()
    {
        return $this->belongsToMany('App\User','follows','user_id','follows_id');
    }
    public function tweets()
    {
        return $this->hasMany('App\tweet','user_id');
    }
    public function likes()
    {
        return $this->belongsToMany('App\tweet','likes','user_id','tweet_id')->withTimestamps();
    }
    public function Bookmarks()
    {
        return $this->belongsToMany('App\tweet','bookmarks','user_id','tweet_id')->withTimestamps();
    }

   public function getRouteKeyName()
   {
       return 'user_name';
   }
}
