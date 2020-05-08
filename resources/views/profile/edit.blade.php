@extends('layouts.app')

@section('content')
    {!! Form::model( $user,['files'=>true,'method'=>'PATCH','action' => ['ProfileController@update', $user] ]) !!}
    @csrf
    <div class="mb-6 ">
        <label class="block mb-2 uppercase font-bold text-sm text-black-200" for="name">Name</label>
        <input value="{{$user->name}}"  class="border border-gray-400 p-2 w-full" name="name" type="text" placeholder="{{$user->name}}" required>

        @error('name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror

        <label class="block mb-2 uppercase font-bold text-sm text-black-200 pt-5" for="user_name">User Name</label>
        <input value="{{$user->user_name}}"  class="border border-gray-400 p-2 w-full" name="user_name" type="text" placeholder="{{$user->user_name}}" required>

        @error('user_name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
            <label class="block mb-2 uppercase font-bold text-sm text-black-200 pt-5" for="user_name">AVATAR</label>
            <input type="file" name="avatar" class="text-xs">

            <label class="block mb-2 uppercase font-bold text-sm text-black-200 pt-5" for="user_name">COVER</label>
            <input type="file" name="cover" class="text-xs">

        <label class="block mb-2 uppercase font-bold text-sm text-black-200 pt-5" for="bio">Bio</label>
        <input value="{{$user->bio}}"  class="border border-gray-400 p-2 w-full" name="bio" type="text" placeholder="{{$user->email}}" required>



        <label class="block mb-2 uppercase font-bold text-sm text-black-200 pt-5" for="Email">Email</label>
        <input value="{{$user->email}}"  class="border border-gray-400 p-2 w-full" name="email" type="email" placeholder="{{$user->email}}" required>

        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror

        <label class="block mb-2 uppercase font-bold text-sm text-black-200 pt-5" for="password">password</label>
        <input  value="" class="border border-gray-400 p-2 w-full" name="password" type="password" required>

        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <label class="block mb-2 uppercase font-bold text-sm text-black-200 pt-5" for="password_confirmation">Password Confirmation</label>
        <input value="" class="border border-gray-400 p-2 w-full" name="password_confirmation" type="password" required>


    </div>
    <button type="submit" class="bg-blue-400 rounded-lg px-6 py-2">SAVE</button>
    {!! Form::close() !!}
@endsection
