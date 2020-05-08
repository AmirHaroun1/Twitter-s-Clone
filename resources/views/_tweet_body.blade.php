<div id="tweet_body" class="flex p-4 border-b border-gray-400">

    <div class="mr-4  flex-shrink-0 justify-between ">

       <a href="{{route('profile',$tweet->user->user_name)}}">
           <img
               class="rounded-full"
           src="{{$tweet->user->getMyAvatar()}}"
           style="width: 50px;height: 50px"
            >
        </a>

    </div>
            <div>
                <h5 class="font-bold  mb-4 text-black">
                   <a href="{{route('profile',$tweet->user->user_name)}}"> {{$tweet->user->name}}</a>
                </h5>
                <a href="{{route('single.tweet',$tweet->id)}}">

                <p class="text-sm mb-3">
                    {{$tweet->body}}

                    <a href="{{route('bookmark.store',$tweet->id)}}"><i class="far text-blue-300 ml-3 text-sm fa-bookmark"></i></a>
                </p>
                </a>
                <div class="flex" id="buttons">

                    <i  class="far fa-heart text-red-400 mt-1"> {{$tweet->likers_count}}</i>

                @if($tweet->likers->contains(auth()->id()))


                <a href="{{route('dislike',$tweet->id)}}" class="ml-10">

                    <i  class="fa fa-thumbs-down text-red-400 text-xs">

                        Dislike </i></a>
                        @if (session('alert'))
                            <div class="alert alert-success">
                                <script type="javascript">
                                    function myFunction() {
                                        alert("I am an alert box!");
                                    }
                                </script>
                                {{ session('alert') }}

                            </div>
                        @endif

                    @else
                        {!! Form::open([ 'method'=>'POST','action'=>['LikeController@store',$tweet->id]]) !!}

                        <input type="hidden" value="{{$tweet->id}}">
                        <button type="submit" id="LikeButton" class="ml-10" >
                            <i  class="far fa-thumbs-up  text-blue-400  text-xs">Like</i>
                        </button>

                        {!! Form::close() !!}

                    @endif
                    @if($tweet->user->id == auth()->id())
                      <a href="{{route('deleteTweet',$tweet->id)}}" class="ml-10">
                          <i  class="fa fa-trash text-red-400  mt-1 text-xs">Delete</i>
                      </a>
                    @endif
                </div>
            </div>
</div>

