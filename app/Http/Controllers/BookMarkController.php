<?php

namespace App\Http\Controllers;

use App\tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookMarkController extends Controller
{
    public function index()
    {
        $tweets =  auth()->user()->bookmarks()->withCount('likers')->orderBy('created_at')->paginate(10);
        $tweets->load('user','likers');

        return view('bookmarks.index',compact('tweets'));
    }
    public function test()
    {
        $tweets = tweet::all();
        foreach ($tweets as $tweet)
        {
            auth()->user()->attach($tweet);
        }
    }
    public function store(tweet $tweet)
    {
        if(in_array($tweet->id,auth()->user()->Bookmarks()->pluck('tweet_id')->toArray()))
        {
           return  redirect(route('bookmark.delete',$tweet));
        }
        else {
            auth()->user()->Bookmarks()->attach($tweet);
            return redirect('/Bookmarks');
        }
    }
    public function delete(tweet $tweet)
    {
        auth()->user()->Bookmarks()->detach($tweet);
        return back()->with('bookmarkfailed',"deleted from btngana");
    }
}
