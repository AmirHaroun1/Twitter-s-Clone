@extends('layouts.app')

@section('content')
    <div class="border rounded-lg border-blue-300 px-8 py-6">
        @include('_publish_tweet-panel')
    </div>

    <div class="border rounded-lg border-gray-300  my-8">
        @forelse($tweets as $tweet)
            @include('_tweet_body')

            @empty
            <div id="tweet_body" class="flex p-4 border-b border-gray-400">
                No Tweets yet.
            </div>
        @endforelse

    </div>
    <div class="flex">
        {{$tweets->links()}}
    </div>
@endsection
