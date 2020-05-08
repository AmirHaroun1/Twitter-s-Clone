    <ul>
        <li>
           <i class="fa fas-bell"></i> <a href="{{route('home')}}" class="font-bold text-lg mb-4 block">
                Home
            </a>
        </li>
        <li>
            <a href="{{route('explore')}}" class="font-bold text-lg mb-4 block">
                Explore
            </a>
        </li>
        <li>
            <a href="{{route('likes')}}" class="font-bold text-lg mb-4 block">
                Notifications
                @if(auth()->user()->unreadnotifications()->count() > 0)
                     <span style="height: 10px;
                           color:red;
                          width: 10px;
                          background-color: red;
                          border-radius: 50%;
                          display: inline-block;
                        " class="badge mb-1 ">
                     </span>
                @endif

            </a>
        </li>

        <li>
            <a href="{{route('bookmarks')}}" class="font-bold text-lg mb-4 block">
                BooKmarks
            </a>
        </li>

        <li class="my-4">
            <div class="items-center">
               <a  href="{{route('profile',\Illuminate\Support\Facades\Auth::user())}}">
                    <img
                        src="{{\Illuminate\Support\Facades\Auth::user()->getMyAvatar()}}"
                        alt=""
                        style="width:50px;height: 50px "
                        class="mr-2 flex rounded-full "
                    >
               </a>
                <a href="{{route('profile',auth()->user()->user_name)}}" class="font-bold flex text-lg mb-4 block">
                    profile
                </a>
            </div>
        </li>

    </ul>
