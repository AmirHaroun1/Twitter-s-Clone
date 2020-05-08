@extends('layouts.app')

@section('content')


    @include('_tweet_body')
    <div class="border rounded-lg border-blue px-8 my-4">
        {!! Form::open(['method' => 'POST' , 'action'=>['TweetController@reply',$tweet->id]]) !!}
        <textarea name="body" class="w-full " placeholder="GOOD DAY TO BUILD A GREAT PROJECT" required> </textarea>
        <hr class="my-1">
        <footer class="flex justify-between my-2">
            <img
                src={{\Illuminate\Support\Facades\Auth::user()->getMyAvatar()}}
                    alt=""
                class="mr-2 rounded-full"
                style="height: 50px;width: 50px"
            >
            <button type="submit "  class="bg-blue-500 rounded-lg shadow px-3 text-white">Add Reply</button>
        </footer>
        @error('body')
        <p class="text-red-600 text-sm mt-3">{{$message}}</p>
        @enderror
        {!! Form::close() !!}
    </div>
    @forelse($tweet->replies as $tweet)
        <div class="pl-8 justify-between pb-8">

                @include('_tweet_body')
        </div>
        @empty

    @endforelse





@endsection
