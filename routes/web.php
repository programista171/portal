<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::user() === null) {
        return redirect()->route("login");
    }
    else {
        return redirect()->route("posts.index");
    }
});


Auth::routes();

Route::resource('/posts', 'PostsController');
Route::post('/posts/createpost', 'PostsController@createPost')->middleware("auth");
Route::post('/posts/createcomment', 'PostsController@createComment')->middleware("auth");
Route::get('/users/{id}', 'UsersController@index')->middleware("auth");
Route::post('/reactions/store', 'ReactionsController@store')->middleware("auth");
Route::post('/friends/invite', 'FriendsController@invite')->middleware("auth");
Route::get('/friends/{id}', 'FriendsController@listFriends')->middleware("auth");;
Route::get('/requests', 'FriendsController@listRequests')->middleware("auth");;
Route::post('/requests_decision', 'FriendsController@decide')->middleware("auth");;
Route::get("/messages", "Messages@index")->name("messages")->middleware("auth");

Route::get('messagePusher', function () {
    event(new \App\Events\MessagePushed());
    return "event fired";
});
Route::get('/search', 'SearchController@search')->name('search')->middleware("auth");

Route::get('/settings', function () {
    return view('users.settings.index');
})->middleware("auth");
Route::post('/settings/image', 'UsersController@imageAdd')->middleware("auth");

Route::get("/register/isFreeLogin", "Auth\RegisterController@isFreeLogin");
Route::get("/register/isFreeEmail", "Auth\RegisterController@isFreeEmail");