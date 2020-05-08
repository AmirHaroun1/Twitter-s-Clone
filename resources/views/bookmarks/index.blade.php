@extends('layouts.app')

@section('content')
    @if(Session::has('bookmarkfailed'))
        <script>
            window.confirm("Book Mark Has Been Removed");
        </script>
    @endif

    @forelse($tweets as $tweet)

         @include('_tweet_body')

        @empty

        <h1 class="text-center font-bold"> No BooKmarks Yet</h1>
    @endforelse
    {{$tweets->links()}}
@endsection
