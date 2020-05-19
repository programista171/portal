<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login/authenticate', 'Auth\LoginController@authenticate');

Route::resource('/posts', 'PostsController');
Route::post('/posts/createpost', 'PostsController@createPost');
Route::post('/posts/createcomment', 'PostsController@createComment');
Route::get('/users/{id}', 'UsersController@index');
Route::post('/reactions/store', 'ReactionsController@store');
Route::post('/friends/invite', 'FriendsController@invite');
Route::get('/friends/{id}', 'FriendsController@listFriends');
Route::get('/requests', 'FriendsController@listRequests');
Route::post('/requests_decision', 'FriendsController@decide');
Route::get("/messages", "Messages@index");

Route::get('messagePusher', function () {
    event(new \App\Events\MessagePushed());
    return "event fired";
});