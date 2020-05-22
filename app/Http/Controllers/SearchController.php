<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class SearchController extends Controller{
	public function search(Request $request){
$users = User::search($request->input('q'))->get();
$posts = Post::search($request->input('q'))->get();
		return view('search')->with('users', $users)->with('posts', $posts);
	}//endFunction

}//endClass