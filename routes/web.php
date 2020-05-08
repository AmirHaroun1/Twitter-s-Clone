<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {


    Route::get('home', 'TweetController@index')->name('home');
    Route::post('/createTweet', 'TweetController@store');
    Route::get('tweet/{tweet:id}', 'TweetController@show')->name('single.tweet');
    Route::post('reply/{tweet:id}', 'TweetController@reply')->name('reply.tweet');

    Route::get('/deleteTweet/{tweet:id}', 'TweetController@delete')->name('deleteTweet');

    Route::get('/explore', 'ExploreController@index')->name('explore');
    Route::get('/search/{user_name}', 'ExploreController@search')->name('search');


    Route::get('Bookmarks','BookMarkController@index')->name('bookmarks');
    Route::get('bookmark/{tweet:id}/delete','BookMarkController@delete')->name('bookmark.delete');

    Route::get('bookmark/{tweet:id}','BookMarkController@store')->name('bookmark.store');

    Route::get('/FollowingList', 'FollowController@index')->name('friends');
    Route::post('follow/{user}', 'FollowController@store');
    Route::get('unfollow/{user}', 'FollowController@delete');

    Route::post('like/{tweet:id}','LikeController@store')->name('like');
    Route::get('like/{tweet:id}','LikeController@delete')->name('dislike');
    Route::get('likes','LikeController@index')->name('likes');

    Route::get('/{user:user_name}','ProfileController@show')->name('profile');
    Route::get('/{user:user_name}/edit', 'ProfileController@edit')->name('edit.profile');
    Route::patch('/{user:user_name}/update', 'ProfileController@update')->name('update.profile');

});
