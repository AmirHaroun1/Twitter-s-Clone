<?php

namespace App\Http\Controllers;

use App\Notifications\reply;

use App\tweet;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;

class TweetController extends Controller
{


    public function index()
    {
         //$ids = DB::Table('follows')->select('follows_id')->where('user_id',auth()->id())->pluck('follows_id');
          $ids = auth()->user()->follows()->pluck('follows_id');
          $ids->push(auth()->id());

         $tweets = tweet::with('user:id,user_name,avatar,name','likers')
            ->wherein('user_id',$ids)
            ->where('reply','!=','1')
           ->withCount('likers')
            ->latest()
            ->paginate(10);

        return view('home.timeline',compact('tweets'));
    }

    public function store(Request $request)
    {
        $request->validate(['body'=>'required|max:255']);
        tweet::create(
            [
                'user_id' => \auth()->id(),
                'body'=> $request->body,
            ]
        );
        return redirect('/home');
    }
    public function show( $tweet_id)
    {
        $tweet = tweet::with(['replies.user','replies.likers','replies'=>function($replies){

            $replies->withCount('likers');
    }])
        ->where('id',$tweet_id)->withCount('likers')->first();
        return view('home.single_tweet',compact('tweet'));
    }
    public function reply(Request $request,tweet $tweet)
    {
         $reply = tweet::create([
            'user_id'=>auth()->id(),
            'body' => $request->body,
            'reply'=>1,
        ]);
        $tweet->replies()->attach($reply->id);
        Notification::send($tweet->user,new reply($tweet,$reply));
        return back();
    }
    public function delete(tweet $tweet)
    {
        $tweet->delete();
        return back();
    }

}
