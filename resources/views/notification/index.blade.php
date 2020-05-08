@extends('layouts.app')


@section('content')

    @forelse(auth()->user()->notifications->take(12) as $notification)

            @if($notification->type == 'App\Notifications\reply')
                <div id="tweet_body" class="flex p-4 border-b border-gray-400">

                    <div>
                        <div class="flex">

                            <h5 class="font-bold  mb-4 text-black">
                                <a href="{{route('profile',$notification->data['replier_user_name'])}}"> {{$notification->data['replier_name']}}</a>
                            </h5>

                            <p class="font-bold" >
                                <i  class="fa fa-reply ml-2 text-blue-400"></i> Has Replied to Your
                                <a class="font-bold text-blue-400" href="{{route('single.tweet',$notification->data['tweet_id'])}}">
                                    Tweet</a>
                            </p>
                        </div>

                        <a href="{{route('single.tweet',$notification->data['tweet_id'])}}">

                            <p class="text-sm mb-3">
                                {{$notification->data['reply_body']}}

                                <a href="{{route('bookmark.store',$notification->data['tweet_id'])}}"><i class="far text-blue-300 ml-3 text-sm fa-bookmark"></i></a>
                            </p>
                        </a>
                    </div>

                </div>
            @elseif($notification->type == 'App\Notifications\follow')
                <div id="tweet_body" class="flex p-4 border-b border-gray-400">

                    <div class="flex">

                        <h5 class="font-bold  mb-4 text-black">
                            <a href="{{route('profile',$notification->data['username'])}}"> {{$notification->data['first Name']}}</a>
                        </h5>

                        <p class="font-bold" >
                            <i  class="fas fa-user-plus text-blue-300 ml-2"></i> Has Followed You

                        </p>
                    </div>
                </div>
            @else
            <div id="tweet_body" class="flex p-4 border-b border-gray-400">

                <div>
                <div class="flex">

                    <h5 class="font-bold  mb-4 text-black">
                        <a href="{{route('profile',$notification->data['username'])}}"> {{$notification->data['first Name']}}</a>
                    </h5>

                    <p class="font-bold" >
                           <i style="color:red" class="fa fa-heart ml-2"></i> Liked Your
                        <a class="font-bold text-blue-400" href="{{route('single.tweet',$notification->data['tweet_id'])}}">
                            Tweet</a>
                    </p>
                </div>

                <a href="{{route('single.tweet',$notification->data['tweet_id'])}}">

                    <p class="text-sm mb-3">
                        {{$notification->data['tweet_body']}}

                        <a href="{{route('bookmark.store',$notification->data['tweet_id'])}}"><i class="far text-blue-300 ml-3 text-sm fa-bookmark"></i></a>
                    </p>
                </a>
            </div>

        </div>
        @endif

        {{$notification->markAsRead()}}
        @empty
            <h1 class="text-center">No Notifications to show yet</h1>
    @endforelse

@endsection

