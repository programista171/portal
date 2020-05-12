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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostsController');
Route::post('/posts/createpost', 'PostsController@createPost');
Route::post('/posts/createcomment', 'PostsController@createComment');
Route::get('/users/{id}', 'UsersController@index');
Route::post('/reactions/store', 'ReactionsController@store');
Route::post('/invitations/invite', 'InvitationsController@invite');