{!! Form::open(['method' => 'POST' , 'action'=>'TweetController@store']) !!}
<textarea name="body" class="w-full rounded-lg shadow " placeholder="GOOD DAY TO BUILD A GREAT PROJECT" required> </textarea>
    <hr class="my-4">
    <footer class="flex justify-between">
        <img
            src={{\Illuminate\Support\Facades\Auth::user()->getMyAvatar(auth()->user()->avatar)}}
            alt=""

            class="mr-2 rounded-full"
            style="height: 50px;width: 50px"

        >
        <button type="submit " class="bg-blue-500 rounded-lg shadow p-2 text-white">Tweet It Yoo!</button>
    </footer>
@error('body')
<p class="text-red-600 text-sm mt-3">{{$message}}</p>
@enderror
{!! Form::close() !!}
