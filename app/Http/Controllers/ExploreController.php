<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    //
    public function index()
    {
        $users = user::paginate(20);
        return view('explore.index',compact('users'));
    }

    public function search($user_name)
    {
        $users = user::where('user_name','LIKE',"%$user_name%")
            ->orWhere('name','LIKE',"%$user_name%")
            ->paginate(50);
        return view('explore.index',compact('users'));
    }
}
