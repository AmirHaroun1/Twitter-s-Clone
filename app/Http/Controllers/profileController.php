<?php

namespace App\Http\Controllers;

use App\tweet;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class profileController extends Controller
{
    //

    public  function show($user_name)
    {

         $user = User::where('user_name',$user_name)->first();

         abort_if($user == null,404);

         $tweets = tweet::with('user:id,user_name,avatar,name','likers')
             ->where([['user_id',$user->id],['reply','!=',1]])
             ->withCount('likers')
             ->latest()
             ->paginate(10);

        $is_following = auth()->user()->follows()->where('follows_id',$user->id)->exists()  ;





        return view('profile.index',compact('user','tweets','is_following'));
    }
    public function edit(User $user)
    {
            if(Auth::user() != $user)
                abort(404);

            else
                return view('profile.edit', compact('user'));



    }
    public function update(User $user)
    {
        $request = request()->validate(
            [
                'user_name'=>[
                    'string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user),
                ],
                'email'=>[
                    Rule::unique('users')->ignore($user),'email',
                ],
                'name' => [
                    'string','required','max:255'
                ],
                'avatar'=>[

                ],
                'cover'=>[

                ],
                'bio'=>[

                ],
                'password' => [
                    'string','required','min:8','max:255','confirmed'
                ],

            ]
        );
        //if there's no uploaded photo keep the old one
        if(!request()->file('avatar')) $request['avatar'] = $user->avatar;
        //if there's delete the old one first then save the new one
        else {
            // checking if the last image was a real image or pravatar image , if it was real image and exists in file delete it
            // if its not real image , There's no need to delete any last image
            if(!file_exists(public_path().'/storage'.$user->avatar)) {
                unlink('storage/' . $user->avatar);

            }
            $request['avatar'] = request('avatar')->store('covers');

        }
        //if there's no uploaded cover keep the old one
        if(!request()->file('cover')) $request['cover'] = $user->cover;
        //if there's delete the old one first then save the new one
        else {
            // checking if the last image was a real image or pravatar image , if it was real image and exists in file delete it
            // if its not real image , There's no need to delete any last image
            if(!file_exists(public_path().'/storage'.$user->cover)) {
                unlink('storage/' . $user->cover);

            }
            $request['cover'] = request('cover')->store('covers');

        }
        $request['password'] = bcrypt($request['password']);
        $user->update($request);
        return redirect('/'.$user->user_name);
    }


}
