@extends('layouts.app')


@section('content')

    <div class="">
        @foreach ($followingList as $user)
            <a href="/{{ $user->user_name }}" class="flex items-center mb-10">
                <img src="{{ $user->getMyAvatar() }}"
                     alt="{{ $user->name }}'s avatar"
                     width="50px"
                     height="50px"

                     class="mr-4 rounded-full"
                >

                <div class="flex justify-between">
                    <h4 class="font-bold text-blue-500">{{ '@' . $user->user_name }}</h4>

                    <p class="font-bold text-sm ml-12 text-center">{{ $user->bio }}</p>

                </div>
            </a>
        @endforeach
        <div class="flex justify-between  w-full">
    {{$followingList->links()}}
        </div>
    </div>




@endsection
