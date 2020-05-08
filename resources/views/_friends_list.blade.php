<div class="w-auto bg-blue-300 rounded-lg p-4">

<h3 class="font-bold mb-4 text-2xl">Friends</h3>

<ul>
    @forelse(\Illuminate\Support\Facades\Auth::user()->follows()->take(10)->get(['user_name','name','id','avatar']) as  $person)
    <li class="mb-4">
        <div class="flex items-center">
         <a href="{{route('profile',$person->user_name)}}">
            <img
                src="{{$person->getMyAvatar()}}"
                alt=""
                style="width: 40px"
                class="mr-2 rounded-full"
            >
         </a>
            <a href="{{route('profile',$person->user_name)}}">

            {{$person->name}}
            </a>
        </div>
    </li>

    @empty
        no friends yet.
        @endforelse
        <a href="{{route('friends')}}">See More</a>

</ul>
</div>
