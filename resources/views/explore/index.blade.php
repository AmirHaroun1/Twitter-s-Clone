@extends('layouts.app')


@section('content')
<div class="flex justify-between w-full pb-6">
    <!-- This is an search component -->
    <div class="p-2 relative mx-auto text-gray-600">
        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-64 rounded-lg text-sm focus:outline-none"
               type="search" id="search" placeholder="Search by user name">
        <button type="submit" class="absolute right-0 top-0 mt-5 mr-4" id="searchbutton">
            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                 viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                 width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>


        </button>

        <script type="text/javascript">
            document.getElementById("searchbutton").onclick = function () {
                window.location.href = "/search/" + (document.getElementById("search").value);
            };
        </script>
    </div>
</div>
    <div class="">
        @foreach ($users as $user)
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

    </div>
    {{ $users->links() }}

@endsection
