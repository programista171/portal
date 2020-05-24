<?php

use http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::resource('/posts', 'PostsController');
Route::post('/posts/createpost', 'PostsController@createPost');
Route::post('/posts/createcomment', 'PostsController@createComment');
Route::get('/users/{id}', 'UsersController@index');
Route::post('/reactions/store', 'ReactionsController@store');
Route::post('/friends/invite', 'FriendsController@invite');
Route::get('/friends/{id}', 'FriendsController@listFriends');
Route::get('/requests', 'FriendsController@listRequests');
Route::post('/requests_decision', 'FriendsController@decide');
Route::get("/messages", "MessagesController@index")->name("messages");
Route::get("/conversation/{any}", "MessagesController@conversation")->name("conversation")->middleware("auth");
Route::post("/messages/sendMessage", "MessagesController@sendMessage")->name("messages.send")->middleware("auth");

Route::get('messagePusher', function () {
    event(new \App\Events\MessagePushed());
    return "event fired";
});


