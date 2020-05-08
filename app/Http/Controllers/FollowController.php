<?php

namespace App\Http\Controllers;

use App\Notifications\follow;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FollowController extends Controller
{
    //
    public function index()
    {
        $followingList = auth()->user()->follows()->paginate(20);
        return view('friends.index',compact('followingList'));
    }
    public function store(User $user)
    {
        auth()->user()->follows()->attach($user);
        Notification::send($user ,new follow());

        return back();
    }
    public function delete(User $user)
    {
        auth()->user()->follows()->detach($user);
        return back();
    }
}
