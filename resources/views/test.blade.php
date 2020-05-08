@extends('layouts.app')
<div class="border rounded-lg border-gray-300  my-8">
    @foreach($tweets as $tweet)
    <div id="tweet_body" class="flex p-4 border-b border-gray-400">

        <div class="mr-4  flex-shrink-0 justify-between ">


        </div>
        <div>
            <h5 class="font-bold  mb-4 text-black">
            </h5>
            <a href="{{route('single.tweet',$tweet->id)}}">

                <p class="text-sm mb-3">
                    {{$tweet->body}}

                    <a href="{{route('bookmark.store',$tweet->id)}}"><i class="far text-blue-300 ml-3 text-sm fa-bookmark"></i></a>
                </p>
            </a>

        </div>
    </div>

@endforeach
</div>
