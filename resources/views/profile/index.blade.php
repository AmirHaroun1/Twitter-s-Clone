@extends('layouts.app')

@section('content')

    <header class="mb-6 relative">
        <div class="relative">
            <img
                style="width: 700px;height: 394px"
                src="{{$user->getMyCover()}}" alt=""
                class="mb-2"
            >
            <img src="{{ $user->getMyAvatar()}} "
                 class=" mb-10 absolute rounded-full bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 style="left:50%;width: 200px;height:200px" >
        </div>


        <div class="flex items-center justify-between mb-3">

            <div>
                <h2 class="font-bold text-2xl mb-0 shadow-lg">{{$user->name}}</h2>
                <p class="text-sm font-bold">@ {{$user->user_name}}</p>
            </div>

            <div class="mt-2 flex">
                @if($user->id == \Illuminate\Support\Facades\Auth::id())
                <a href="{{route('edit.profile',$user)}}" class="text-s rounded-full  shadow py-2 px-4 mr-2 text-black">
                    Edit Profile
                </a>
                @elseif($is_following)
                    {!! Form::open(['method' => 'GET' , 'action'=>['FollowController@delete',$user]]) !!}

                    <button type="submit"class="text-s bg-blue-500 rounded-full shadow py-2 px-4  text-white">
                        UnFollow
                    </button>
                    {!! Form::close() !!}

                @elseif(!$is_following )
                    {!! Form::open(['method' => 'POST' , 'action'=>['FollowController@store',$user]]) !!}
                        @csrf
                        <button type="submit"class="text-s bg-blue-500 rounded-full shadow py-2 px-4  text-white">
                        Follow
                        </button>

                    {!! Form::close() !!}
                @endif
            </div>

        </div>

        <p id="bio" class="centered text-sm mt-4"> <text class="font-bold text-blue-500 text-lg">Bio : </text>  <br>{{$user->bio}}</p>
    </header>


    <hr>

<div class="border rounded-lg border-gray-300  my-8">

    @foreach($tweets as $tweet)

        @include('_tweet_body')


    @endforeach

</div>
    {{$tweets->links()}}
    @endsection
