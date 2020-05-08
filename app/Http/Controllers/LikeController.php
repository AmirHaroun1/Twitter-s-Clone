<?php

namespace App\Http\Controllers;

use App\Notifications\likes;
use App\tweet;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class LikeController extends Controller
{
    //
    public function index()
    {
    return   view('notification.index');
    }
    public function store(tweet $tweet)
    {
        auth()->user()->likes()->attach($tweet->id);
        Notification::send($tweet->user,new likes($tweet));
        return back();
    }
    public function delete(tweet $tweet)
    {
         $tweet->likers()->detach(Auth::id());
        return back();
    }
}
